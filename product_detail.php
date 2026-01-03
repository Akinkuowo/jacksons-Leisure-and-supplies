<?php
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_lifetime', 0);
    ini_set('session.gc_maxlifetime', 3600);
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'config.php';

    // Get product ID from URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($product_id <= 0) {
        header('Location: product.php');
        exit;
    }

    // Fetch product details
    $conn = getDbConnection();
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
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header('Location: product.php');
        exit;
    }
    
    $product = $result->fetch_assoc();
    
    // Generate product images
    $imageMap = [
        'awning' => 'https://images.unsplash.com/photo-1571687949921-1306bfb24c72?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'camping' => 'https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'caravan' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'tent' => 'https://images.unsplash.com/photo-1534188753412-9f0337d4d51d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'furniture' => 'https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    ];
    
    $categoryLower = strtolower($product['category'] ?? '');
    $mainImage = $imageMap['furniture'];
    
    foreach ($imageMap as $key => $url) {
        if (strpos($categoryLower, $key) !== false) {
            $mainImage = $url;
            break;
        }
    }
    
    // Parse category path for breadcrumb
    $categoryParts = explode('>', $product['category']);
    $categoryParts = array_map('trim', $categoryParts);
    
    // Fetch related products
    $relatedSql = "SELECT 
                    id,
                    product_name as name,
                    price,
                    brand_name as brand,
                    stock_status as stock,
                    is_new_product as is_new,
                    is_popular_product as is_popular,
                    category
                   FROM products 
                   WHERE category LIKE ? AND id != ?
                   LIMIT 5";
    
    $categorySearch = '%' . $categoryParts[0] . '%';
    $relatedStmt = $conn->prepare($relatedSql);
    $relatedStmt->bind_param("si", $categorySearch, $product_id);
    $relatedStmt->execute();
    $relatedResult = $relatedStmt->get_result();
    
    $relatedProducts = [];
    while ($row = $relatedResult->fetch_assoc()) {
        $catLower = strtolower($row['category'] ?? '');
        $img = $imageMap['furniture'];
        foreach ($imageMap as $key => $url) {
            if (strpos($catLower, $key) !== false) {
                $img = $url;
                break;
            }
        }
        $row['image'] = $img;
        $relatedProducts[] = $row;
    }
    
    closeDbConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Jacksons Leisure</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <?php include('include/style.php') ?>
    
    <style>
        .thumbnail-active {
            border: 2px solid #2563eb;
        }
        
        .badge-new {
            background: #10b981;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            font-style: italic;
        }
        
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .accordion-content.active {
            max-height: 1000px;
        }
        
        .quantity-input {
            -moz-appearance: textfield;
        }
        
        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <?php include('include/header.php'); ?>

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200 py-3">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex text-sm text-gray-500">
                <a href="/" class="hover:text-gray-700">HOME</a>
                <?php foreach ($categoryParts as $index => $part): ?>
                    <span class="mx-2">/</span>
                    <?php if ($index === count($categoryParts) - 1): ?>
                        <span class="text-gray-900 uppercase"><?php echo htmlspecialchars($part); ?></span>
                    <?php else: ?>
                        <a href="product.php?category=<?php echo urlencode(strtolower(str_replace(' ', '-', $part))); ?>" 
                           class="hover:text-gray-700 uppercase"><?php echo htmlspecialchars($part); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>

    <!-- Product Details -->
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            
            <!-- Product Images -->
            <div class="bg-white rounded-lg p-6">
                <?php if ($product['is_new'] == 1): ?>
                <div class="mb-4">
                    <span class="badge-new">NEW</span>
                </div>
                <?php endif; ?>
                
                <!-- Main Image -->
                <div class="relative mb-4">
                    <img id="mainImage" src="<?php echo $mainImage; ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="w-full h-96 object-cover rounded-lg">
                    
                    <!-- Navigation Arrows -->
                    <button id="prevImage" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition">
                        <i class="fas fa-chevron-left text-gray-700"></i>
                    </button>
                    <button id="nextImage" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition">
                        <i class="fas fa-chevron-right text-gray-700"></i>
                    </button>
                </div>
                
                <!-- Thumbnail Images -->
                <div class="flex gap-3 overflow-x-auto pb-2">
                    <img src="<?php echo $mainImage; ?>" 
                         class="thumbnail thumbnail-active w-24 h-24 object-cover rounded border-2 cursor-pointer transition hover:border-blue-500" 
                         data-index="0">
                    <img src="<?php echo $mainImage; ?>?variant=2" 
                         class="thumbnail w-24 h-24 object-cover rounded border-2 border-gray-200 cursor-pointer transition hover:border-blue-500" 
                         data-index="1">
                    <img src="<?php echo $mainImage; ?>?variant=3" 
                         class="thumbnail w-24 h-24 object-cover rounded border-2 border-gray-200 cursor-pointer transition hover:border-blue-500" 
                         data-index="2">
                    <div class="thumbnail w-24 h-24 bg-gray-200 rounded border-2 border-gray-200 cursor-pointer transition hover:border-blue-500 flex items-center justify-center" 
                         data-index="3">
                        <span class="text-sm font-medium text-gray-600">360°</span>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-500 uppercase">
                    <span>DELUXE AIR</span>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h1>
                
                <p class="text-gray-700 mb-6 leading-relaxed">
                    <?php echo htmlspecialchars($product['description'] ?: 'This spacious tent features durable, waterproof materials and excellent ventilation. Enjoy maximum headroom and comfort with Dark Premier Bedrooms.'); ?>
                </p>
                
                <!-- Features List -->
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                        <span class="text-gray-700">Pack small - live large</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                        <span class="text-gray-700">Pre-shaped air tubes provide great headroom and interior space</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                        <span class="text-gray-700">Durable, waterproof, sewn-in groundsheet</span>
                    </li>
                    <?php if (!empty($product['size'])): ?>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                        <span class="text-gray-700">Size: <?php echo htmlspecialchars($product['size']); ?></span>
                    </li>
                    <?php endif; ?>
                </ul>
                
                <!-- View Details Toggle -->
                <button id="viewDetailsBtn" class="text-blue-600 hover:text-blue-700 font-medium mb-6 flex items-center gap-2">
                    <span>View details</span>
                    <i class="fas fa-chevron-down transition-transform" id="detailsChevron"></i>
                </button>
                
                <!-- Additional Details (Hidden by default) -->
                <div id="additionalDetails" class="hidden mb-6 space-y-2 text-sm text-gray-700">
                    <p><strong>SKU:</strong> <?php echo htmlspecialchars($product['sku'] ?: 'N/A'); ?></p>
                    <p><strong>Brand:</strong> <?php echo htmlspecialchars($product['brand'] ?: 'Generic'); ?></p>
                    <?php if (!empty($product['color'])): ?>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($product['color']); ?></p>
                    <?php endif; ?>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                </div>
                
                <!-- Price Section -->
                <div class="border-t border-gray-200 pt-6 mb-6">
                    <div class="flex items-baseline gap-3 mb-2">
                        <span class="text-sm text-gray-500">RRP £<?php echo number_format($product['price'] * 1.17, 2); ?></span>
                    </div>
                    <div class="text-4xl font-bold text-gray-900 mb-4">
                        £<?php echo number_format($product['price'], 2); ?>
                    </div>
                </div>
                
                <!-- Quantity and Add to Cart -->
                <div class="border-t border-gray-200 pt-6 mb-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <button id="decreaseQty" class="px-4 py-3 hover:bg-gray-100 transition">
                                <i class="fas fa-minus text-gray-600"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" 
                                   class="quantity-input w-16 text-center border-x border-gray-300 py-3 focus:outline-none">
                            <button id="increaseQty" class="px-4 py-3 hover:bg-gray-100 transition">
                                <i class="fas fa-plus text-gray-600"></i>
                            </button>
                        </div>
                        
                        <?php if ($product['stock'] === 'In Stock' || $product['quantity'] > 0): ?>
                        <button id="addToCartBtn" class="flex-1 bg-lime-500 hover:bg-lime-600 text-white font-semibold py-3 px-6 rounded-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                        <?php else: ?>
                        <button disabled class="flex-1 bg-gray-300 text-gray-500 font-semibold py-3 px-6 rounded-lg cursor-not-allowed">
                            Out of Stock
                        </button>
                        <?php endif; ?>
                        
                        <button id="wishlistBtn" class="p-3 border border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">
                            <i class="far fa-heart text-xl"></i>
                        </button>
                    </div>
                    
                    <?php if ($product['stock'] === 'In Stock' || $product['quantity'] > 0): ?>
                    <div class="flex items-center gap-2 text-green-600 mb-4">
                        <i class="fas fa-check-circle"></i>
                        <span class="text-sm font-medium">Pre-order now, expected in stock: 02/03/2026</span>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Payment Methods -->
                    <div class="flex items-center gap-3 mb-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Pay" class="h-6">
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-bell text-gray-600"></i>
                        <a href="#" class="text-blue-600 hover:text-blue-700 underline">Notify me when available</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-truck text-gray-600"></i>
                        <span class="text-gray-700"><strong>Free delivery over £600</strong> - low shipping</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Information Tabs -->
        <div class="bg-white rounded-lg shadow-sm mb-12">
            <div class="border-b border-gray-200">
                <div class="divide-y divide-gray-200">
                    <!-- Description -->
                    <div class="accordion-item">
                        <button class="accordion-header w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <span class="font-semibold text-lg text-gray-900">DESCRIPTION</span>
                            <i class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        <div class="accordion-content px-6 pb-6">
                            <p class="text-gray-700 leading-relaxed">
                                <?php echo htmlspecialchars($product['description'] ?: 'The Outwell Sacramento 6 Air offers a spacious and comfortable camping experience for families up to six. Quickly pitched with an optimized design to keep weight and packed size down. Create your ideal space with flexible options. Roll the door and windows aside for better views, and open the inner door two-thirds to extend the living area. The three bedrooms with Dark Inners ensure a restful night\'s sleep. A perfect balance of comfort and functionality for your camping trip.'); ?>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Dimensions -->
                    <div class="accordion-item">
                        <button class="accordion-header w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <span class="font-semibold text-lg text-gray-900">DIMENSIONS</span>
                            <i class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        <div class="accordion-content px-6 pb-6">
                            <div class="grid grid-cols-2 gap-4">
                                <?php if (!empty($product['size'])): ?>
                                <div>
                                    <p class="text-sm text-gray-500">Size</p>
                                    <p class="font-medium text-gray-900"><?php echo htmlspecialchars($product['size']); ?></p>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <p class="text-sm text-gray-500">Weight</p>
                                    <p class="font-medium text-gray-900">22.3 kg (approx.)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Specifications -->
                    <div class="accordion-item">
                        <button class="accordion-header w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <span class="font-semibold text-lg text-gray-900">SPECIFICATIONS</span>
                            <i class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        <div class="accordion-content px-6 pb-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Brand</p>
                                    <p class="font-medium text-gray-900"><?php echo htmlspecialchars($product['brand'] ?: 'Generic'); ?></p>
                                </div>
                                <?php if (!empty($product['color'])): ?>
                                <div>
                                    <p class="text-sm text-gray-500">Color</p>
                                    <p class="font-medium text-gray-900"><?php echo htmlspecialchars($product['color']); ?></p>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <p class="text-sm text-gray-500">Material</p>
                                    <p class="font-medium text-gray-900">Waterproof Polyester</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">SKU</p>
                                    <p class="font-medium text-gray-900"><?php echo htmlspecialchars($product['sku'] ?: 'N/A'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Features -->
                    <div class="accordion-item">
                        <button class="accordion-header w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <span class="font-semibold text-lg text-gray-900">FEATURES</span>
                            <i class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        <div class="accordion-content px-6 pb-6">
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Pre-shaped air tubes for maximum headroom</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Dark Premier Bedrooms for better sleep</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Sewn-in waterproof groundsheet</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                    <span class="text-gray-700">Multiple ventilation options</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if (count($relatedProducts) > 0): ?>
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">OTHER CUSTOMERS ALSO VIEWED</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <?php foreach ($relatedProducts as $related): ?>
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
                    <div class="relative">
                        <img src="<?php echo $related['image']; ?>" alt="<?php echo htmlspecialchars($related['name']); ?>" 
                             class="w-full h-48 object-cover">
                        <?php if ($related['is_popular'] == 1): ?>
                        <div class="absolute top-2 right-2">
                            <span class="bg-gray-800 text-white text-xs px-2 py-1 rounded uppercase">BESTSELLER</span>
                        </div>
                        <?php endif; ?>
                        <button class="absolute top-2 left-2 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg text-gray-600 hover:text-red-500 transition">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2"><?php echo htmlspecialchars($related['name']); ?></h3>
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                            This spacious tent features durable waterproof design and great ventilation.
                        </p>
                        <a href="product_detail.php?id=<?php echo $related['id']; ?>" 
                           class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            View Details →
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php include('include/footer.php'); ?>
    <?php include('include/script.php') ?>

    <script>
        // Image gallery
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        let currentImageIndex = 0;
        
        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                thumbnails.forEach(t => t.classList.remove('thumbnail-active'));
                thumb.classList.add('thumbnail-active');
                mainImage.src = thumb.src;
                currentImageIndex = index;
            });
        });
        
        document.getElementById('prevImage').addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + thumbnails.length) % thumbnails.length;
            thumbnails[currentImageIndex].click();
        });
        
        document.getElementById('nextImage').addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % thumbnails.length;
            thumbnails[currentImageIndex].click();
        });
        
        // Quantity controls
        const qtyInput = document.getElementById('quantity');
        document.getElementById('decreaseQty').addEventListener('click', () => {
            if (qtyInput.value > 1) qtyInput.value = parseInt(qtyInput.value) - 1;
        });
        
        document.getElementById('increaseQty').addEventListener('click', () => {
            qtyInput.value = parseInt(qtyInput.value) + 1;
        });
        
        // View details toggle
        const viewDetailsBtn = document.getElementById('viewDetailsBtn');
        const additionalDetails = document.getElementById('additionalDetails');
        const detailsChevron = document.getElementById('detailsChevron');
        
        viewDetailsBtn.addEventListener('click', () => {
            additionalDetails.classList.toggle('hidden');
            detailsChevron.style.transform = additionalDetails.classList.contains('hidden') 
                ? 'rotate(0deg)' 
                : 'rotate(180deg)';
        });
        
        // Accordion functionality
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const icon = header.querySelector('i');
                
                content.classList.toggle('active');
                icon.style.transform = content.classList.contains('active') 
                    ? 'rotate(180deg)' 
                    : 'rotate(0deg)';
            });
        });
        
        // Add to cart
        document.getElementById('addToCartBtn')?.addEventListener('click', () => {
            const quantity = document.getElementById('quantity').value;
            showNotification(`Added ${quantity} item(s) to cart`, 'success');
        });
        
        // Wishlist
        let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
        const productId = <?php echo $product_id; ?>;
        const wishlistBtn = document.getElementById('wishlistBtn');
        
        function updateWishlistBtn() {
            if (wishlist.includes(productId)) {
                wishlistBtn.innerHTML = '<i class="fas fa-heart text-xl text-red-500"></i>';
            } else {
                wishlistBtn.innerHTML = '<i class="far fa-heart text-xl"></i>';
            }
        }
        
        wishlistBtn.addEventListener('click', () => {
            const index = wishlist.indexOf(productId);
            if (index > -1) {
                wishlist.splice(index, 1);
                showNotification('Removed from wishlist', 'info');
            } else { wishlist.push(productId);
                showNotification('Added to wishlist', 'success');
            }
            
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            updateWishlistBtn();
        });
        
        updateWishlistBtn();
        
        // Notification system
        function showNotification(message, type = 'info') {
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300`;
            notification.style.transform = 'translateX(400px)';
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    </script>

</body>
</html>