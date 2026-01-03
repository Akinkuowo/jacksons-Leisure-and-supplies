<?php
session_start();
header('Content-Type: application/json');

// Database connection
require_once('../config.php');

// Get request method
$method = $_SERVER['REQUEST_METHOD'];

try {
    $conn = getDbConnection();
    
    if ($method === 'POST') {
        // Handle POST requests (add, remove)
        $input = json_decode(file_get_contents('php://input'), true);
        $action = $input['action'] ?? '';
        
        switch ($action) {
            case 'add':
                addToWishlist($conn, $input);
                break;
            case 'remove':
                removeFromWishlist($conn, $input);
                break;
            case 'clear':
                clearWishlist($conn);
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } elseif ($method === 'GET') {
        // Handle GET requests (fetch wishlist)
        getWishlist($conn);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    }
    
    closeDbConnection($conn);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}

function addToWishlist($conn, $input) {
    $product_id = intval($input['product_id'] ?? 0);
    
    if ($product_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid product']);
        return;
    }
    
    // Check if product exists
    $stmt = $conn->prepare("SELECT id, name, price, image FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    
    if (!$product) {
        echo json_encode(['success' => false, 'message' => 'Product not found']);
        return;
    }
    
    // Initialize wishlist in session if not exists
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }
    
    // Check if product already in wishlist
    if (in_array($product_id, $_SESSION['wishlist'])) {
        echo json_encode([
            'success' => false, 
            'message' => 'Product already in wishlist'
        ]);
        return;
    }
    
    $_SESSION['wishlist'][] = $product_id;
    
    echo json_encode([
        'success' => true,
        'message' => 'Product added to wishlist successfully',
        'wishlist_count' => count($_SESSION['wishlist'])
    ]);
}

function removeFromWishlist($conn, $input) {
    $product_id = intval($input['product_id'] ?? 0);
    
    if ($product_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid product']);
        return;
    }
    
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }
    
    $key = array_search($product_id, $_SESSION['wishlist']);
    if ($key !== false) {
        unset($_SESSION['wishlist'][$key]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Reindex array
        
        echo json_encode([
            'success' => true,
            'message' => 'Product removed from wishlist successfully',
            'wishlist_count' => count($_SESSION['wishlist'])
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Product not found in wishlist'
        ]);
    }
}

function clearWishlist($conn) {
    $_SESSION['wishlist'] = [];
    
    echo json_encode([
        'success' => true,
        'message' => 'Wishlist cleared successfully',
        'wishlist_count' => 0
    ]);
}

function getWishlist($conn) {
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }
    
    $wishlist_ids = $_SESSION['wishlist'];
    $wishlist_items = [];
    
    if (!empty($wishlist_ids)) {
        $placeholders = implode(',', array_fill(0, count($wishlist_ids), '?'));
        
        $stmt = $conn->prepare("
            SELECT 
                p.id,
                p.name,
                p.price,
                p.image,
                p.quantity,
                p.sku,
                p.description,
                c.name as category_name,
                s.name as subcategory_name,
                b.name as brand_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN subcategories s ON p.subcategory_id = s.id
            LEFT JOIN brands b ON p.brand_id = b.id
            WHERE p.id IN ($placeholders)
        ");
        
        $types = str_repeat('i', count($wishlist_ids));
        $stmt->bind_param($types, ...$wishlist_ids);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $wishlist_items[] = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'sku' => $row['sku'],
                'description' => $row['description'],
                'quantity' => $row['quantity'],
                'in_stock' => $row['quantity'] > 0,
                'stock_status' => $row['quantity'] > 0 ? 'In Stock' : 'Out of Stock',
                'category' => $row['category_name'],
                'subcategory' => $row['subcategory_name'],
                'brand' => $row['brand_name']
            ];
        }
        $stmt->close();
    }
    
    echo json_encode([
        'success' => true,
        'wishlist' => $wishlist_items,
        'wishlist_count' => count($wishlist_ids)
    ]);
}
?>