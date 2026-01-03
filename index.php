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
                <a href="#campervan-conversions" class="category-card">
                    <img src="assets/img/campervan-conversions.jpg" alt="Campervan Conversions" onerror="this.src='https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Campervan Conversions</h3>
                    </div>
                </a>
                
                <!-- Category 2: Awnings -->
                <a href="#awnings" class="category-card">
                    <img src="assets/img/awnings.jpg" alt="Awnings" onerror="this.src='https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Awnings</h3>
                    </div>
                </a>
                
                <!-- Category 3: Heating -->
                <a href="#heating" class="category-card">
                    <img src="assets/img/heating.jpg" alt="Heating" onerror="this.src='https://images.unsplash.com/photo-1545259742-24c4ab201b9f?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Heating</h3>
                    </div>
                </a>
                
                <!-- Category 4: Electrical -->
                <a href="#electrical" class="category-card">
                    <img src="assets/img/electrical.jpg" alt="Electrical" onerror="this.src='https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Electrical</h3>
                    </div>
                </a>
                
                <!-- Category 5: Water Systems -->
                <a href="#water-systems" class="category-card">
                    <img src="assets/img/water-systems.jpg" alt="Water Systems" onerror="this.src='https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Water Systems</h3>
                    </div>
                </a>
                
                <!-- Category 6: Camping -->
                <a href="#camping" class="category-card">
                    <img src="assets/img/camping.jpg" alt="Camping" onerror="this.src='https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=500&h=600&fit=crop'">
                    <div class="category-title">
                        <h3 class="category-name">Camping</h3>
                    </div>
                </a>
                
                <!-- Category 7: Caravan Accessories -->
                <a href="#caravan-accessories" class="category-card">
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
                        <a href="#conversion-kits" class="btn-primary">
                            View Conversion Kits
                        </a>
                        <a href="#equipment" class="btn-secondary">
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
                <div class="products-track" id="productsTrack">
                    <!-- Product 1: Vango Sunlight Air ProShield -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/Products/product2.webp" alt="Vango Sunlight Air ProShield">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Sunlight Air ProShield 2-in-1 Awning & Sun Canopy</h3>
                            <div class="product-price">£555.00</div>
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 2: Leisurewize Air Fryer -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product3.jpg" alt="Leisurewize Air Fryer">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Leisurewize 1.7L Caravan Air Fryer with Digital Display</h3>
                            <div class="product-price">£47.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 3: Outdoor Revolution Heater -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product4.jpg" alt="Outdoor Revolution Heater">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Outdoor Revolution Electric Eco Heater</h3>
                            <div class="product-price">£39.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 4: Vango Groundbreaker Glow Peg Set -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product1.webp" alt="Vango Peg Set">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Groundbreaker Glow Peg Set</h3>
                            <div class="product-price">£14.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 5: Igloo Latitude 30 Cool Box -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product5.jpg" alt="Igloo Cool Box">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Igloo Latitude 30 Camping Ice Cooler Box</h3>
                            <div class="product-price">£49.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 6: Leisurewize Portawash -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product6.jpeg" alt="Leisurewize Portawash">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Leisurewize Portawash Twin Tub Portable Washing Machine</h3>
                            <div class="product-price">£109.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 7: Streetwize Inverter -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product7.jpeg" alt="Streetwize Inverter">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Streetwize 12V Modified Sine Wave Inverter</h3>
                            <div class="product-price">£29.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 8: Vango Beta 350XL Tent -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product8.jpg" alt="Vango Beta Tent">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Beta 350XL 3 Man Tunnel Tent</h3>
                            <div class="product-price">£164.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Duplicate products for seamless loop -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/Products/product2.webp" alt="Vango Sunlight Air ProShield">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Sunlight Air ProShield 2-in-1 Awning & Sun Canopy</h3>
                            <div class="product-price">£555.00</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product3.jpg" alt="Leisurewize Air Fryer">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Leisurewize 1.7L Caravan Air Fryer with Digital Display</h3>
                            <div class="product-price">£47.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product4.jpg" alt="Outdoor Revolution Heater">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Outdoor Revolution Electric Eco Heater</h3>
                            <div class="product-price">£39.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product1.webp" alt="Vango Peg Set">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Groundbreaker Glow Peg Set</h3>
                            <div class="product-price">£14.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product5.jpg" alt="Igloo Cool Box">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Igloo Latitude 30 Camping Ice Cooler Box</h3>
                            <div class="product-price">£49.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product6.jpeg" alt="Leisurewize Portawash">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Leisurewize Portawash Twin Tub Portable Washing Machine</h3>
                            <div class="product-price">£109.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product7.jpeg" alt="Streetwize Inverter">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Streetwize 12V Modified Sine Wave Inverter</h3>
                            <div class="product-price">£29.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <span class="new-badge">NEW</span>
                            <img src="assets/img/Products/product8.jpg" alt="Vango Beta Tent">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vango Beta 350XL 3 Man Tunnel Tent</h3>
                            <div class="product-price">£164.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
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
                    <!-- Brand 1: Truma -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/truma logo.png" alt="Truma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>TRUMA</div>'">
                    </div>
                    
                    <!-- Brand 2: Dometic -->
                    <!-- <div class="brand-logo">
                        <img src="assets/img/Brands/dometic logo.png" alt="Dometic" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>DOMETIC</div>'">
                    </div> -->
                    
                    <!-- Brand 3: Fiamma -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/M6_lg_Fiamma-1.jpg" alt="Fiamma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>FIAMMA</div>'">
                    </div>
                    
                    <!-- Brand 4: Vango -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Vitrifrigo logo.png" alt="Vango" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>VANGO</div>'">
                    </div>
                    
                    <!-- Brand 5: Certikin -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/certikin brand logo.png" alt="Certikin" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>CERTIKIN</div>'">
                    </div>
                    
                    <!-- Brand 6: MAX AIR -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/max logo.png" alt="MAX AIR" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>MAX<br>AIR</div>'">
                    </div>
                    
                    <!-- Brand 7: PROPEX -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/propex logo.png" alt="PROPEX" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>PROPEX</div>'">
                    </div>
                    
                    <!-- Brand 8: REIMO -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/reimo logo.jpg" alt="REIMO" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>REIMO</div>'">
                    </div>
                    
                    <!-- Brand 9: VICTRON -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Thule logo.png" alt="Thule" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>THULE</div>'">
                    </div>
                    
                    <!-- Brand 10: Thetford -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/thetford-vector-logo.png" alt="Thetford" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THETFORD</div>'">
                    </div>
                    
                    <!-- Brand 11: Avtex -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Sr Smith.jpg" alt="Avtex" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>SR<br>SMITH</div>'">
                    </div>
                    
                    <!-- Brand 12: Igloo -->
                    <!-- <div class="brand-logo">
                        <img src="assets/img/Brands/igloo logo.png" alt="Igloo" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>IGLOO</div>'">
                    </div> -->
                    
                    <!-- Duplicate brands for seamless loop -->
                    <!-- Brand 1: Truma -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/truma logo.png" alt="Truma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>TRUMA</div>'">
                    </div>
                    
                    <!-- Brand 2: Dometic -->
                    <!-- <div class="brand-logo">
                        <img src="assets/img/Brands/dometic logo.png" alt="Dometic" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>DOMETIC</div>'">
                    </div> -->
                    
                    <!-- Brand 3: Fiamma -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/M6_lg_Fiamma-1.jpg" alt="Fiamma" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>FIAMMA</div>'">
                    </div>
                    
                    <!-- Brand 4: Vango -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Vitrifrigo logo.png" alt="Vango" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>VANGO</div>'">
                    </div>
                    
                    <!-- Brand 5: Certikin -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/certikin brand logo.png" alt="Certikin" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>CERTIKIN</div>'">
                    </div>
                    
                    <!-- Brand 6: MAX AIR -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/max logo.png" alt="MAX AIR" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>MAX<br>AIR</div>'">
                    </div>
                    
                    <!-- Brand 7: PROPEX -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/propex logo.png" alt="PROPEX" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>PROPEX</div>'">
                    </div>
                    
                    <!-- Brand 8: REIMO -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/reimo logo.jpg" alt="REIMO" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>REIMO</div>'">
                    </div>
                    
                    <!-- Brand 9: Victron Energy -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Thule logo.png" alt="Thule" onerror="this.parentElement.innerHTML='<div class=\'brand-name\' style=\'font-size: 18px;\'>THULE</div>'">
                    </div>
                    
                    <!-- Brand 10: Thetford -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/thetford-vector-logo.png" alt="Thetford" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>THETFORD</div>'">
                    </div>
                    
                    <!-- Brand 11: Avtex -->
                    <div class="brand-logo">
                        <img src="assets/img/Brands/Sr Smith.jpg" alt="Avtex" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>SR<br>SMITH</div>'">
                    </div>
                    
                    <!-- Brand 12: Igloo -->
                    <!-- <div class="brand-logo">
                        <img src="https://logo.clearbit.com/igloocoolers.com" alt="Igloo" onerror="this.parentElement.innerHTML='<div class=\'brand-name\'>IGLOO</div>'">
                    </div> -->
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
                    Discover what Customers mainly buy to help you make the most of your outdoor adventures
                </p>
            </div>
            
            <!-- Products Carousel -->
            <div class="products-carousel">
                <div class="products-track" id="productsTrack">
                    <!-- Product 1: Vango Sunlight Air ProShield -->
                    <div class="product-card">
                        <div class="product-image">
                            <span class="popular-badge">Popular</span>
                            <img src="assets/Products/product2.webp" alt="Vango Sunlight Air ProShield">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Hobbs</h3>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 2: Leisurewize Air Fryer -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product3.jpg" alt="Leisurewize Air Fryer">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Fridges</h3>
                            <div class="product-price">£47.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 3: Outdoor Revolution Heater -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product4.jpg" alt="Outdoor Revolution Heater">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Rooflights</h3>
                            <div class="product-price">£39.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 4: Vango Groundbreaker Glow Peg Set -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product1.webp" alt="Vango Peg Set">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Sink</h3>
                            <div class="product-price">£14.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 5: Igloo Latitude 30 Cool Box -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product5.jpg" alt="Igloo Cool Box">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Mini Hekis</h3>
                            <div class="product-price">£49.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 6: Leisurewize Portawash -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product6.jpeg" alt="Leisurewize Portawash">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Microwave </h3>
                            <div class="product-price">£109.95</div>
                           
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 7: Streetwize Inverter -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product7.jpeg" alt="Streetwize Inverter">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Air Conditions</h3>
                            <div class="product-price">£29.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 8: Vango Beta 350XL Tent -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product8.jpg" alt="Vango Beta Tent">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Hobbs</h3>
                            <div class="product-price">£164.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Duplicate products for seamless loop -->
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/Products/product2.webp" alt="Vango Sunlight Air ProShield">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Hoobs/h3>
                            <div class="product-price">£555.00</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product3.jpg" alt="Leisurewize Air Fryer">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Fridges</h3>
                            <div class="product-price">£47.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product4.jpg" alt="Outdoor Revolution Heater">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Rooflights</h3>
                            <div class="product-price">£39.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product1.webp" alt="Vango Peg Set">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Sinks</h3>
                            <div class="product-price">£14.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product5.jpg" alt="Igloo Cool Box">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Mini Hekis</h3>
                            <div class="product-price">£49.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product6.jpeg" alt="Leisurewize Portawash">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Microwave</h3>
                            <div class="product-price">£109.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product7.jpeg" alt="Streetwize Inverter">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Air Conditions</h3>
                            <div class="product-price">£29.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                        <span class="popular-badge">Popular</span>
                            <img src="assets/img/Products/product8.jpg" alt="Vango Beta Tent">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Hobbs</h3>
                            <div class="product-price">£164.95</div>
                            
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>
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
            
            <!-- Trust badges -->
            <!-- <div class="flex flex-wrap justify-center items-center gap-8 mt-12 fade-in" style="animation-delay: 0.4s;">
                <div class="text-center">
                    <div class="text-white text-3xl font-bold">100K+</div>
                    <div class="text-orange-100">Happy Subscribers</div>
                </div>
                <div class="text-center">
                    <div class="text-white text-3xl font-bold">No Spam</div>
                    <div class="text-orange-100">Quality Content Only</div>
                </div>
                <div class="text-center">
                    <div class="text-white text-3xl font-bold">Unsubscribe</div>
                    <div class="text-orange-100">Any Time</div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Footer Section -->
    <?php include('include/footer.php') ?>

    <!-- <script src="assets/js/script.js" /> -->
    

    <?php include('include/script.php') ?>

       
</body>
</html>