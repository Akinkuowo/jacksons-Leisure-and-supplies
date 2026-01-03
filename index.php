<?php
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_lifetime', 0);
    ini_set('session.gc_maxlifetime', 3600);
    
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Fetch new products from database
    require_once 'config.php';
    
    $newProducts = [];
    $popularProducts = [];
    
    try {
        $conn = getDbConnection();
        
        // Fetch new products (limit 6)
        $newSql = "SELECT 
                    id,
                    product_name as name,
                    sku_number as sku,
                    price,
                    brand_name as brand,
                    stock_status as stock,
                    quantity,
                    product_description as description,
                    image,
                    category
                FROM products 
                WHERE is_new_product = 1
                ORDER BY id DESC
                LIMIT 6";
        
        $newResult = $conn->query($newSql);
        if ($newResult) {
            while ($row = $newResult->fetch_assoc()) {
                // Generate placeholder image based on category
                $categoryLower = strtolower($row['category'] ?? '');
                $imageMap = [
                    'awning' => 'assets/img/Products/product2.webp',
                    'camping' => 'assets/img/Products/product1.webp',
                    'caravan' => 'assets/img/Products/product8.jpg',
                    'electrical' => 'assets/img/Products/product7.jpeg',
                    'heating' => 'assets/img/Products/product4.jpg',
                    'kitchen' => 'assets/img/Products/product3.jpg',
                    'fridge' => 'assets/img/Products/product5.jpg',
                    'water' => 'assets/img/Products/product6.jpeg'
                ];
                
                $image = 'assets/img/Products/product1.webp'; // default
                foreach ($imageMap as $key => $url) {
                    if (strpos($categoryLower, $key) !== false) {
                        $image = $url;
                        break;
                    }
                }
                
                $row['image'] = $image;
                $newProducts[] = $row;
            }
        }
        
        // Fetch popular products (limit 6)
        $popularSql = "SELECT 
                        id,
                        product_name as name,
                        sku_number as sku,
                        price,
                        brand_name as brand,
                        stock_status as stock,
                        quantity,
                        product_description as description,
                        image,
                        category
                    FROM products 
                    WHERE is_popular_product = 1
                    ORDER BY id DESC
                    LIMIT 6";
        
        $popularResult = $conn->query($popularSql);
        if ($popularResult) {
            while ($row = $popularResult->fetch_assoc()) {
                $categoryLower = strtolower($row['category'] ?? '');
                $imageMap = [
                    'awning' => 'assets/img/Products/product2.webp',
                    'camping' => 'assets/img/Products/product1.webp',
                    'caravan' => 'assets/img/Products/product8.jpg',
                    'electrical' => 'assets/img/Products/product7.jpeg',
                    'heating' => 'assets/img/Products/product4.jpg',
                    'kitchen' => 'assets/img/Products/product3.jpg',
                    'fridge' => 'assets/img/Products/product5.jpg',
                    'water' => 'assets/img/Products/product6.jpeg'
                ];
                
                $image = 'assets/img/Products/product1.webp';
                foreach ($imageMap as $key => $url) {
                    if (strpos($categoryLower, $key) !== false) {
                        $image = $url;
                        break;
                    }
                }
                
                $row['image'] = $image;
                $popularProducts[] = $row;
            }
        }
        
        closeDbConnection($conn);
    } catch (Exception $e) {
        error_log("Error fetching products: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacksons Leisure and Supplies Limited</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for hamburger icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets/css/styles.css" rel="stylesheet" />

    <?php include('include/style.php') ?>
</head>
<body class="font-sans">
    <?php include('include/header.php') ?>

    <!-- Hero Banner  -->
    <section class="carousel-container">
        <!-- Single Hero Slide -->
        <div class="carousel-slide active">
            <img src="assets/img/image1.jpg" alt="Outdoor Leisure Equipment" onerror="this.src='https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=1920&h=600&fit=crop'">
            <div class="carousel-overlay">
                <div class="text-center px-4">
                    <h1 class="hero-title text-white text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight drop-shadow-lg">
                        Supplying Outdoor Leisure<br>Equipment Speedily<br>To Your Door
                    </h1>
                    <a href="product.php" class="shop-now-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4 max-w-[1400px]">
            <!-- Section Header -->
            <div class="mb-8 px-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 uppercase tracking-wide">
                    Shop by Category
                </h2>
            </div>
            
            <!-- Category Slider -->
            <div class="category-slider">
                <!-- Left Arrow -->
                <button class="slider-nav left disabled" id="prevBtn" aria-label="Previous categories">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
              <!-- Category Track -->
            <div class="category-track" id="categoryTrack">
                <!-- Category 1: Campervan Conversions -->
                <a href="product.php?category=campervan-conversions" class="category-card">
                    <img src="assets/img/campervan-conversions.jpg" alt="Campervan Conversions" onerror="this.src='https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Campervan Conversions</h3>
                    </div>
                </a>
                
                <!-- Category 2: Awnings -->
                <a href="product.php?category=awnings" class="category-card">
                    <img src="assets/img/awnings.jpg" alt="Awnings" onerror="this.src='https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Awnings</h3>
                    </div>
                </a>
                
                <!-- Category 3: Heating -->
                <a href="product.php?category=heating" class="category-card">
                    <img src="assets/img/heating.jpg" alt="Heating" onerror="this.src='https://images.unsplash.com/photo-1545259742-24c4ab201b9f?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Heating</h3>
                    </div>
                </a>
                
                <!-- Category 4: Electrical -->
                <a href="product.php?category=electrical" class="category-card">
                    <img src="assets/img/electrical.jpg" alt="Electrical" onerror="this.src='https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Electrical</h3>
                    </div>
                </a>
                
                <!-- Category 5: Water Systems -->
                <a href="product.php?category=water-systems" class="category-card">
                    <img src="assets/img/water-systems.jpg" alt="Water Systems" onerror="this.src='https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Water Systems</h3>
                    </div>
                </a>
                
                <!-- Category 6: Camping -->
                <a href="product.php?category=camping" class="category-card">
                    <img src="assets/img/camping.jpg" alt="Camping" onerror="this.src='https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Camping</h3>
                    </div>
                </a>
                
                <!-- Category 7: Caravan Accessories -->
                <a href="product.php?category=caravan-accessories" class="category-card">
                    <img src="assets/img/caravan-accessories.jpg" alt="Caravan Accessories" onerror="this.src='https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Caravan Accessories</h3>
                    </div>
                </a>
            </div>
            
                <!-- Right Arrow -->
                <button class="slider-nav right" id="nextBtn" aria-label="Next categories">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>

            <div class="mx-auto max-w-xs text-center mt-10 ">
                <a href="product.php" class="shop-now-btn">View More</a>
            </div>
        </div>
    </section>

     <!-- Campervan Conversion Section -->
     <section class="campervan-section py-16 md:py-24">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="campervan-content grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left Column: Image -->
                <div class="order-2 lg:order-1">
                    <div class="conversion-image" style="height: 500px;">
                        <img src="assets/img/campervan-conversion.jpg" alt="Campervan Conversion" onerror="this.src='https://images.unsplash.com/photo-1527786356703-4b100091cd2c?w=800&h=1000&fit=crop'">
                    </div>
                </div>
                
                <!-- Right Column: Content -->
                <div class="order-1 lg:order-2">
                    <div class="mb-6">
                        <span class="text-[#CC4514] font-bold text-sm uppercase tracking-wider">Campervan Conversions</span>
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mt-3 mb-6 leading-tight">
                            Transform Your Van Into Your Dream Home on Wheels
                        </h2>
                    </div>
                    
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">
                        Whether you're planning a full conversion or upgrading your existing campervan, we have everything you need. From kitchen units and heating systems to electrical components and water solutions, our comprehensive range of conversion equipment makes your dream build a reality.
                    </p>
                    
                    <p class="text-gray-700 text-lg mb-10 leading-relaxed">
                        Our expert team has carefully curated products from leading brands to ensure quality, reliability, and ease of installation. Transform any van into a comfortable, functional living space with our conversion kits and individual components.
                    </p>
                    
                    <!-- Feature Badges -->
                    <div class="mb-10 space-y-3">
                        <div class="feature-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#CC4514" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-gray-800 font-semibold">Complete Conversion Kits Available</span>
                        </div>
                        <div class="feature-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#CC4514" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-gray-800 font-semibold">Premium Quality Components</span>
                        </div>
                        <div class="feature-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#CC4514" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-gray-800 font-semibold">Expert Installation Guidance</span>
                        </div>
                        <div class="feature-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#CC4514" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-gray-800 font-semibold">Fast & Reliable Delivery</span>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="product.php?category=conversion-kits" class="btn-primary">
                            View Conversion Kits
                        </a>
                        <a href="product.php?category=equipment" class="btn-secondary">
                            Browse Equipment
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- New Products Section -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="text-[#CC4514] font-bold text-sm uppercase tracking-wider">Just Arrived</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mt-2 mb-4">
                    New Products
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Discover our latest additions to help you make the most of your outdoor adventures
                </p>
            </div>
            
            <!-- Products Carousel -->
            <div class="products-carousel">
                <div class="products-track" id="newProductsTrack">
                    <?php if (!empty($newProducts)): ?>
                        <?php foreach ($newProducts as $product): ?>
                            <?php 
                                $inStock = $product['stock'] === 'In Stock' || $product['quantity'] > 0;
                            ?>
                            <div class="product-card">
                                <div class="product-image">
                                    <span class="new-badge">NEW</span>
                                    <a href="product_detail.php?id=<?php echo $product['id']; ?>">
                                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    </a>
                                    <div class="absolute top-2 left-2 flex flex-col gap-2">
                                        <button class="wishlist-btn bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg text-gray-600 hover:text-red-500" 
                                                data-product-id="<?php echo $product['id']; ?>" 
                                                title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="compare-btn bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg text-gray-600 hover:text-blue-500" 
                                                data-product-id="<?php echo $product['id']; ?>" 
                                                title="Add to Compare">
                                            <i class="fas fa-balance-scale"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="product_detail.php?id=<?php echo $product['id']; ?>">
                                        <p class="text-xs text-gray-500 mb-1"><?php echo htmlspecialchars($product['brand'] ?: 'Generic'); ?></p>
                                        <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                                        <p class="text-sm text-gray-600 mb-3 line-clamp-2"><?php echo htmlspecialchars(substr($product['description'] ?: '', 0, 100)); ?></p>
                                    </a>
                                    <div class="flex justify-between items-center">
                                        <div class="product-price">£<?php echo number_format($product['price'], 2); ?></div>
                                        <?php if ($inStock): ?>
                                            <button class="add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">
                                                Add to Cart
                                            </button>
                                        <?php else: ?>
                                            <button disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded text-sm cursor-not-allowed">
                                                Out of Stock
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">No new products available at the moment.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="product.php" class="inline-block bg-transparent text-[#CC4514] px-10 py-4 rounded-full font-semibold text-lg border-2 border-[#CC4514] hover:bg-[#CC4514] hover:text-white transition-all duration-300 uppercase tracking-wide">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Brand Logos Section -->
    <section class="brands-section py-12 md:py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Trusted Brands</h2>
                <p class="text-gray-600">We stock premium products from leading outdoor leisure brands</p>
            </div>
            
            <!-- Brands Carousel -->
            <div class="relative">
                <div class="brands-track">
                    <!-- Brand logos remain the same -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/truma logo.png" alt="Truma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>TRUMA</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/M6_lg_Fiamma-1.jpg" alt="Fiamma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>FIAMMA</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Vitrifrigo logo.png" alt="Vitrifrigo" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>VITRIFRIGO</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/certikin brand logo.png" alt="Certikin" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>CERTIKIN</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/max logo.png" alt="MAX AIR" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>MAX AIR</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/propex logo.png" alt="PROPEX" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>PROPEX</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/reimo logo.jpg" alt="REIMO" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>REIMO</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Thule logo.png" alt="Thule" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THULE</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/thetford-vector-logo.png" alt="Thetford" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THETFORD</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Sr Smith.jpg" alt="SR Smith" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>SR SMITH</div>'">
                    </div>
                    <!-- Duplicate for seamless loop -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/truma logo.png" alt="Truma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>TRUMA</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/M6_lg_Fiamma-1.jpg" alt="Fiamma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>FIAMMA</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Vitrifrigo logo.png" alt="Vitrifrigo" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>VITRIFRIGO</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/certikin brand logo.png" alt="Certikin" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>CERTIKIN</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/max logo.png" alt="MAX AIR" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>MAX AIR</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/propex logo.png" alt="PROPEX" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>PROPEX</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/reimo logo.jpg" alt="REIMO" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>REIMO</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Thule logo.png" alt="Thule" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THULE</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/thetford-vector-logo.png" alt="Thetford" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THETFORD</div>'">
                    </div>
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Sr Smith.jpg" alt="SR Smith" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>SR SMITH</div>'">
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="#all-products" class="inline-block bg-transparent text-[#CC4514] px-10 py-4 rounded-full font-semibold text-lg border-2 border-[#CC4514] hover:bg-[#CC4514] hover:text-white transition-all duration-300 uppercase tracking-wide">
                    SEE MORE
                </a>
            </div>
        </div>
    </section>

    <!-- Popular Products Section -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="text-[#CC4514] font-bold text-sm uppercase tracking-wider">Most Views</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mt-2 mb-4">
                    Popular Products
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Discover what customers mainly buy to help you make the most of your outdoor adventures
                </p>
            </div>
            
            <!-- Products Carousel -->
            <div class="products-carousel">
                <div class="products-track" id="popularProductsTrack">
                    <?php if (!empty($popularProducts)): ?>
                        <?php foreach ($popularProducts as $product): ?>
                            <?php 
                                $inStock = $product['stock'] === 'In Stock' || $product['quantity'] > 0;
                            ?>
                            <div class="product-card">
                                <div class="product-image">
                                    <span class="popular-badge">Popular</span>
                                    <a href="product_detail.php?id=<?php echo $product['id']; ?>">
                                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    </a>
                                    <div class="absolute top-2 left-2 flex flex-col gap-2">
                                        <button class="wishlist-btn bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg text-gray-600 hover:text-red-500" 
                                                data-product-id="<?php echo $product['id']; ?>" 
                                                title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="compare-btn bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:shadow-lg text-gray-600 hover:text-blue-500" 
                                                data-product-id="<?php echo $product['id']; ?>" 
                                                title="Add to Compare">
                                            <i class="fas fa-balance-scale"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="product_detail.php?id=<?php echo $product['id']; ?>">
                                        <p class="text-xs text-gray-500 mb-1"><?php echo htmlspecialchars($product['brand'] ?: 'Generic'); ?></p>
                                        <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                                        <p class="text-sm text-gray-600 mb-3 line-clamp-2"><?php echo htmlspecialchars(substr($product['description'] ?: '', 0, 100)); ?></p>
                                    </a>
                                    <div class="flex justify-between items-center">
                                        <div class="product-price">£<?php echo number_format($product['price'], 2); ?></div>
                                        <?php if ($inStock): ?>
                                            <button class="add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">
                                                Add to Cart
                                            </button>
                                        <?php else: ?>
                                            <button disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded text-sm cursor-not-allowed">
                                                Out of Stock
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">No popular products available at the moment.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="product.php" class="inline-block bg-transparent text-[#CC4514] px-10 py-4 rounded-full font-semibold text-lg border-2 border-[#CC4514] hover:bg-[#CC4514] hover:text-white transition-all duration-300 uppercase tracking-wide">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 px-4 bg-[#228b22] relative overflow-hidden">
        <!-- Background pattern (optional) -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-64 h-64 bg-orange-600 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-600 rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="max-w-4xl mx-auto relative z-10">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Stay Connected with Jacksons
                </h2>
                <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                    Subscribe to our newsletter and be the first to know about new products, exclusive offers, and camping tips.
                </p>
            </div>
            
            <form id="newsletterForm" class="bg-white rounded-2xl shadow-2xl p-8 md:p-10 max-w-2xl mx-auto fade-in" style="animation-delay: 0.2s;">
                <div class="space-y-6">
                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label for="name" class="block text-gray-800 font-medium">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                id="name" 
                                name="name"
                                required
                                placeholder="Enter your full name"
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all duration-200"
                            >
                        </div>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-gray-800 font-medium">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                required
                                placeholder="your.email@example.com"
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all duration-200"
                            >
                        </div>
                    </div>
                    
                    <!-- Consent Checkbox -->
                    <div class="space-y-3">
                        <label class="flex items-start space-x-3 cursor-pointer">
                            <input type="checkbox" id="consent" name="consent" class="custom-checkbox" required>
                            <span class="checkmark mt-1 flex-shrink-0"></span>
                            <span class="text-gray-700 text-sm leading-relaxed">
                                I consent to receiving marketing emails from Welcome to Jacksons Leisure and Supplies Limited. I understand that I can unsubscribe at any time by clicking the link in the footer of our emails. For information about our privacy practices, please visit our 
                                <a href="/privacy-policy" class="text-orange-600 font-medium hover:text-orange-700 underline">Privacy Policy</a>.
                                <span class="text-red-500"> *</span>
                            </span>
                        </label>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit"
                            id="subscribeBtn"
                            class="w-full bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-700 hover:to-orange-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-orange-300 focus:ring-opacity-50"
                        >
                            <span class="flex items-center justify-center space-x-3">
                                <span class="text-lg">Subscribe Now</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </span>
                        </button>
                        <p class="text-center text-gray-600 text-sm mt-3">
                            Get 10% off your first order as a welcome gift!
                        </p>
                    </div>
                </div>
                
                <!-- Success Message (Hidden by default) -->
                <div id="successMessage" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-green-800">Welcome to Jacksons Leisure and Supplies Limited!</h3>
                            <p class="text-green-700 text-sm">
                                Thank you for subscribing! Check your email for a special welcome message and your 10% discount code.
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include('include/footer.php') ?>

    <?php include('include/script.php') ?>

    <script>
        // Wishlist and Compare functionality
        let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
        let compareList = JSON.parse(localStorage.getItem('compareList') || '[]');
        
        // Load wishlist and cart counts on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadWishlistFromServer();
            loadCartCount();
            attachEventListeners();
        });
        
        function attachEventListeners() {
            // Wishlist buttons
            document.querySelectorAll('.wishlist-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleWishlist(parseInt(btn.dataset.productId), e);
                });
            });
            
            // Compare buttons
            document.querySelectorAll('.compare-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleCompare(parseInt(btn.dataset.productId), e);
                });
            });
            
            // Add to cart buttons
            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    addToCart(parseInt(btn.dataset.productId), btn);
                });
            });
        }
        
        async function loadWishlistFromServer() {
            try {
                const response = await fetch('api/wishlist.php');
                const data = await response.json();
                
                if (data.success && data.wishlist) {
                    wishlist = data.wishlist.map(item => item.product_id);
                    localStorage.setItem('wishlist', JSON.stringify(wishlist));
                    updateWishlistButtons();
                }
            } catch (error) {
                console.error('Error loading wishlist:', error);
            }
        }
        
        async function loadCartCount() {
            try {
                const response = await fetch('api/cart.php');
                const data = await response.json();
                
                if (data.success) {
                    updateCartCount(data.total_items || 0);
                }
            } catch (error) {
                console.error('Error loading cart count:', error);
            }
        }
        
        async function toggleWishlist(productId, event) {
            const index = wishlist.indexOf(productId);
            const action = index > -1 ? 'remove' : 'add';
            
            try {
                const response = await fetch('api/wishlist.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: action,
                        product_id: productId
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    if (action === 'remove') {
                        wishlist.splice(index, 1);
                        showNotification('Removed from wishlist', 'info');
                    } else {
                        wishlist.push(productId);
                        showNotification('Added to wishlist', 'success');
                    }
                    
                    localStorage.setItem('wishlist', JSON.stringify(wishlist));
                    updateWishlistButtons();
                } else {
                    showNotification(data.message || 'Failed to update wishlist', 'error');
                }
            } catch (error) {
                console.error('Error updating wishlist:', error);
                showNotification('An error occurred. Please try again.', 'error');
            }
        }
        
        function updateWishlistButtons() {
            document.querySelectorAll('.wishlist-btn').forEach(btn => {
                const productId = parseInt(btn.dataset.productId);
                if (wishlist.includes(productId)) {
                    btn.classList.add('active');
                    btn.innerHTML = '<i class="fas fa-heart"></i>';
                } else {
                    btn.classList.remove('active');
                    btn.innerHTML = '<i class="far fa-heart"></i>';
                }
            });
        }
        
        function toggleCompare(productId, event) {
            const index = compareList.indexOf(productId);
            if (index > -1) {
                compareList.splice(index, 1);
                showNotification('Removed from compare', 'info');
            } else {
                if (compareList.length >= 4) {
                    showNotification('Maximum 4 products can be compared', 'warning');
                    return;
                }
                compareList.push(productId);
                showNotification('Added to compare', 'success');
            }
            
            localStorage.setItem('compareList', JSON.stringify(compareList));
            updateCompareButtons();
        }
        
        function updateCompareButtons() {
            document.querySelectorAll('.compare-btn').forEach(btn => {
                const productId = parseInt(btn.dataset.productId);
                if (compareList.includes(productId)) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }
        
        async function addToCart(productId, buttonElement) {
            if (buttonElement) {
                buttonElement.disabled = true;
                const originalText = buttonElement.textContent;
                buttonElement.textContent = 'Adding...';
            }
            
            try {
                const response = await fetch('api/cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'add',
                        product_id: productId,
                        quantity: 1
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message || 'Added to cart successfully', 'success');
                    updateCartCount(data.cart_count || data.total_items);
                } else {
                    showNotification(data.message || 'Failed to add to cart', 'error');
                }
            } catch (error) {
                console.error('Error adding to cart:', error);
                showNotification('An error occurred. Please try again.', 'error');
            } finally {
                if (buttonElement) {
                    buttonElement.disabled = false;
                    buttonElement.textContent = 'Add to Cart';
                }
            }
        }
        
        function updateCartCount(count) {
            const cartBadge = document.querySelector('.cart-count, #cartCount');
            if (cartBadge) {
                cartBadge.textContent = count;
                if (count > 0) {
                    cartBadge.classList.remove('hidden');
                } else {
                    cartBadge.classList.add('hidden');
                }
            }
        }
        
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