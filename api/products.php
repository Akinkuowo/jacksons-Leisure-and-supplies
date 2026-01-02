<?php
// api/products.php - Enhanced version with category filtering

error_reporting(E_ALL);
ini_set('display_errors', 0);
ob_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$configPath = __DIR__ . '/../config.php';
if (!file_exists($configPath)) {
    ob_clean();
    echo json_encode([
        'success' => false,
        'error' => 'Configuration file not found'
    ]);
    exit;
}

require_once $configPath;

try {
    $conn = getDbConnection();
    
    if (!$conn) {
        throw new Exception('Database connection failed');
    }
    
    // Get filter parameters from URL
    $category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : '';
    $subcategory = isset($_GET['subcategory']) ? $conn->real_escape_string($_GET['subcategory']) : '';
    $type = isset($_GET['type']) ? $conn->real_escape_string($_GET['type']) : '';
    $brand = isset($_GET['brand']) ? $conn->real_escape_string($_GET['brand']) : '';
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 100;
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    
    // Build WHERE clause based on filters
    $whereConditions = [];
    
    if (!empty($category)) {
        $whereConditions[] = "category LIKE '%$category%'";
    }
    
    if (!empty($subcategory)) {
        $whereConditions[] = "category LIKE '%$subcategory%'";
    }
    
    if (!empty($type)) {
        $whereConditions[] = "category LIKE '%$type%'";
    }
    
    if (!empty($brand)) {
        $whereConditions[] = "brand_name = '$brand'";
    }
    
    if (!empty($search)) {
        $whereConditions[] = "(product_name LIKE '%$search%' OR product_description LIKE '%$search%' OR sku_number LIKE '%$search%')";
    }
    
    $whereClause = !empty($whereConditions) ? 'WHERE ' . implode(' AND ', $whereConditions) : '';
    
    // Get total count
    $countSql = "SELECT COUNT(*) as total FROM products $whereClause";
    $countResult = $conn->query($countSql);
    $totalProducts = $countResult ? $countResult->fetch_assoc()['total'] : 0;
    
    // Get products
    $sql = "SELECT 
                id,
                product_name as name,
                sku_number as sku,
                price,
                brand_name as brand,
                stock_status as stock,
                size_variant_model as size,
                colour_type as color,
                quantity,
                product_description as description,
                is_new_product as is_new,
                is_popular_product as is_popular,
                category,
                full_category_path
            FROM products 
            $whereClause
            ORDER BY is_popular_product DESC, is_new_product DESC, product_name ASC
            LIMIT $limit OFFSET $offset";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    // Fetch products
    $products = [];
    while ($row = $result->fetch_assoc()) {
        // Generate placeholder image based on category
        $imageMap = [
            'awning' => 'https://images.unsplash.com/photo-1571687949921-1306bfb24c72?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'camping' => 'https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'caravan' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'cooling' => 'https://images.unsplash.com/photo-1570727624867-35da6d63d3bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'tent' => 'https://images.unsplash.com/photo-1534188753412-9f0337d4d51d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'furniture' => 'https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'electrical' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'kitchen' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'fridge' => 'https://images.unsplash.com/photo-1571175443880-49e1d25b2bc5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'sleep' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'cook' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
        ];
        
        // Determine image based on category path
        $categoryLower = strtolower($row['category'] ?? '');
        $image = $imageMap['furniture']; // default
        
        foreach ($imageMap as $key => $url) {
            if (strpos($categoryLower, $key) !== false) {
                $image = $url;
                break;
            }
        }
        
        $row['image'] = $image;
        $products[] = $row;
    }
    
    // Get available brands for filters
    $brandsSql = "SELECT DISTINCT brand_name as brand, COUNT(*) as count 
                  FROM products 
                  $whereClause
                  GROUP BY brand_name 
                  ORDER BY brand_name ASC";
    $brandsResult = $conn->query($brandsSql);
    
    $brands = [];
    if ($brandsResult) {
        while ($brandRow = $brandsResult->fetch_assoc()) {
            if (!empty($brandRow['brand'])) {
                $brands[] = $brandRow;
            }
        }
    }
    
    ob_clean();
    echo json_encode([
        'success' => true,
        'products' => $products,
        'brands' => $brands,
        'total' => $totalProducts,
        'count' => count($products),
        'filters' => [
            'category' => $category,
            'subcategory' => $subcategory,
            'type' => $type,
            'brand' => $brand,
            'search' => $search
        ]
    ]);
    
    closeDbConnection($conn);
    
} catch (Exception $e) {
    ob_clean();
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>