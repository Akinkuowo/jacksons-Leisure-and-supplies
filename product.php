<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Jacksons Leisure and Supplies</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
<body class="bg-gray-50">

    <?php include('include/header.php') ?>
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6 max-w-7xl">
        <!-- Breadcrumbs -->
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center text-sm text-gray-600">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-green-700">Home</a>
                    <span class="mx-2">›</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="/en-gb/camping-equipment" class="hover:text-green-700">Camping & Leisure Equipment</a>
                    <span class="mx-2">›</span>
                </li>
                <li class="inline-flex items-center text-gray-900 font-medium" aria-current="page">
                    All Products
                </li>
            </ol>
        </nav>

        <!-- Page Title and Controls -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Camping & Leisure Equipment</h1>
                <p class="text-gray-600">Showing <span class="font-semibold" id="productCount">0</span> products</p>
            </div>
            
            <div class="flex items-center space-x-4">
                <!-- Grid/List View Toggle -->
                <div class="flex items-center space-x-2 border border-gray-300 rounded-lg p-1">
                    <button id="gridView" class="grid-icon active p-2 rounded hover:bg-gray-100" title="Grid View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                    <button id="listView" class="list-icon p-2 rounded hover:bg-gray-100" title="List View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
                <!-- Sort Dropdown -->
                <div class="relative">
                    <select id="sortSelect" class="appearance-none bg-white border border-gray-300 rounded-lg py-2 pl-4 pr-10 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="relevance">Sort by: Relevance</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                        <option value="newest">Newest Arrivals</option>
                        <option value="name">Name: A to Z</option>
                        <option value="stock">In Stock First</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 mb-6">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-900">Filters</h2>
                        <a href="#" id="clearFilters" class="text-sm text-green-700 hover:underline">Clear All</a>
                    </div>
                    
                    <!-- Price Range Filter -->
                    <div class="filter-section mb-6 pb-6 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4">Price Range</h3>
                        <div class="mb-4">
                            <input type="range" min="0" max="2000" value="2000" class="price-slider" id="priceRange">
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>£0</span>
                            <span id="maxPriceDisplay">£2,000</span>
                        </div>
                        <div class="mt-3 text-center">
                            <span id="priceDisplay" class="text-green-700 font-semibold">£0 - £2,000</span>
                        </div>
                    </div>
                    
                    <!-- Brand Filter -->
                    <div class="filter-section mb-6 pb-6 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4">Brand</h3>
                        <div class="space-y-2" id="brandFilters">
                            <div class="text-gray-500 text-sm">Loading brands...</div>
                        </div>
                    </div>
                    
                    <!-- Availability Filter -->
                    <div class="filter-section mb-6 pb-6 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4">Availability</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="availability-filter rounded text-green-700 focus:ring-green-500" value="in_stock" checked>
                                <span class="ml-2 text-gray-700">In Stock</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="availability-filter rounded text-green-700 focus:ring-green-500" value="low_stock" checked>
                                <span class="ml-2 text-gray-700">Low Stock</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="availability-filter rounded text-green-700 focus:ring-green-500" value="out_of_stock">
                                <span class="ml-2 text-gray-700">Out of Stock</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="filter-section mb-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Category</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="awning" checked>
                                <span class="ml-2 text-gray-700">Awnings</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="cooling" checked>
                                <span class="ml-2 text-gray-700">Cooling</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="tent" checked>
                                <span class="ml-2 text-gray-700">Tents</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="furniture" checked>
                                <span class="ml-2 text-gray-700">Furniture</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="electrical" checked>
                                <span class="ml-2 text-gray-700">Electrical</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="kitchen" checked>
                                <span class="ml-2 text-gray-700">Kitchen</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="category-filter rounded text-green-700 focus:ring-green-500" value="pool" checked>
                                <span class="ml-2 text-gray-700">Pool Equipment</span>
                            </label>
                        </div>
                    </div>
                    
                    <button id="applyFilters" class="w-full bg-green-700 hover:bg-green-800 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                        Apply Filters
                    </button>
                </div>
                
                <!-- Promo Banner -->
                <div class="bg-gradient-to-r from-green-800 to-green-600 rounded-lg p-5 text-white">
                    <h3 class="font-bold text-lg mb-2">Trade Customer Discount</h3>
                    <p class="text-sm mb-4">Registered trade customers save up to 30% on all products.</p>
                    <a href="/en-gb/trade-login" class="inline-block bg-white text-green-700 font-medium py-2 px-4 rounded hover:bg-gray-100 transition duration-200">
                        Login to View Trade Prices
                    </a>
                </div>
            </div>
            
            <!-- Product Grid -->
            <div class="lg:w-3/4">
                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="flex justify-center items-center py-20">
                    <div class="loading-spinner"></div>
                </div>

                <div id="productGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                    <!-- Products will be dynamically generated here -->
                </div>
                
                <!-- No Products Message -->
                <div id="noProductsMessage" class="hidden text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-search fa-3x"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No products found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your filters or search criteria</p>
                    <button id="resetFilters" class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                        Reset All Filters
                    </button>
                </div>

                <!-- Error Message -->
                <div id="errorMessage" class="hidden text-center py-12">
                    <div class="text-red-400 mb-4">
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Error Loading Products</h3>
                    <p class="text-gray-600 mb-6" id="errorText"></p>
                    <button id="retryLoad" class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                        Retry
                    </button>
                </div>
            </div>
        </div>
    </div>

   <?php include('include/footer.php'); ?>

   <?php include('include/scripts.php'); ?>
   <script>
        // Configuration
        const API_URL = 'api/products_debug.php'; // Using debug version first
        // Change to 'api/products.php' once working
        
        // Global variables
        let allProducts = [];
        let filteredProducts = [];
        let currentFilters = {
            maxPrice: 2000,
            brands: [],
            availability: ['in_stock', 'low_stock'],
            categories: ['awning', 'cooling', 'tent', 'furniture', 'electrical', 'kitchen', 'pool'],
            sortBy: 'relevance'
        };
        
        // DOM Elements
        const productGrid = document.getElementById('productGrid');
        const productCount = document.getElementById('productCount');
        const brandFilters = document.getElementById('brandFilters');
        const priceSlider = document.getElementById('priceRange');
        const priceDisplay = document.getElementById('priceDisplay');
        const maxPriceDisplay = document.getElementById('maxPriceDisplay');
        const sortSelect = document.getElementById('sortSelect');
        const clearFilters = document.getElementById('clearFilters');
        const applyFilters = document.getElementById('applyFilters');
        const noProductsMessage = document.getElementById('noProductsMessage');
        const resetFilters = document.getElementById('resetFilters');
        const gridViewBtn = document.getElementById('gridView');
        const listViewBtn = document.getElementById('listView');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const errorMessage = document.getElementById('errorMessage');
        const errorText = document.getElementById('errorText');
        const retryLoad = document.getElementById('retryLoad');
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
            setupEventListeners();
        });
        
        // Fetch products from API
        async function loadProducts() {
            try {
                showLoading();
                
                // Build query parameters
                const params = new URLSearchParams();
                params.append('maxPrice', currentFilters.maxPrice);
                if (currentFilters.brands.length > 0) {
                    params.append('brands', currentFilters.brands.join(','));
                }
                if (currentFilters.availability.length > 0) {
                    params.append('availability', currentFilters.availability.join(','));
                }
                if (currentFilters.categories.length > 0) {
                    params.append('categories', currentFilters.categories.join(','));
                }
                params.append('sortBy', currentFilters.sortBy);
                
                const response = await fetch(`${API_URL}?${params.toString()}`);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.success) {
                    allProducts = data.products;
                    filteredProducts = data.products;
                    
                    // Update max price if needed
                    if (allProducts.length > 0) {
                        const maxPrice = Math.max(...allProducts.map(p => parseFloat(p.price)));
                        priceSlider.max = Math.ceil(maxPrice);
                        maxPriceDisplay.textContent = `£${Math.ceil(maxPrice).toLocaleString()}`;
                        if (priceSlider.value > maxPrice) {
                            priceSlider.value = Math.ceil(maxPrice);
                            priceDisplay.textContent = `£0 - £${Math.ceil(maxPrice).toLocaleString()}`;
                        }
                    }
                    
                    // Populate brand filters
                    populateBrandFilters(data.brands);
                    
                    // Render products
                    renderProducts(filteredProducts);
                    hideLoading();
                } else {
                    throw new Error(data.error || 'Failed to load products');
                }
            } catch (error) {
                console.error('Error loading products:', error);
                showError(error.message);
            }
        }
        
        function showLoading() {
            loadingSpinner.classList.remove('hidden');
            productGrid.classList.add('hidden');
            noProductsMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
        }
        
        function hideLoading() {
            loadingSpinner.classList.add('hidden');
            productGrid.classList.remove('hidden');
        }
        
        function showError(message) {
            loadingSpinner.classList.add('hidden');
            productGrid.classList.add('hidden');
            noProductsMessage.classList.add('hidden');
            errorMessage.classList.remove('hidden');
            errorText.textContent = message;
        }
        
        function populateBrandFilters(brands) {
            brandFilters.innerHTML = '';
            brands.forEach(brandData => {
                const checkbox = document.createElement('label');
                checkbox.className = 'flex items-center';
                checkbox.innerHTML = `
                    <input type="checkbox" class="brand-filter rounded text-green-700 focus:ring-green-500" value="${brandData.brand}" checked>
                    <span class="ml-2 text-gray-700">${brandData.brand} (${brandData.count})</span>
                `;
                brandFilters.appendChild(checkbox);
            });
            
            // Add event listeners to new brand filters
            document.querySelectorAll('.brand-filter').forEach(filter => {
                filter.addEventListener('change', updateFiltersFromUI);
            });
        }
        
        function renderProducts(productsToRender) {
            productGrid.innerHTML = '';
            
            if (productsToRender.length === 0) {
                noProductsMessage.classList.remove('hidden');
                productGrid.classList.add('hidden');
                productCount.textContent = '0';
                return;
            }
            
            noProductsMessage.classList.add('hidden');
            productGrid.classList.remove('hidden');
            productCount.textContent = productsToRender.length;
            
            productsToRender.forEach(product => {
                const stock = parseInt(product.stock) || 0;
                const stockStatus = getStockStatus(stock);
                const stockClass = getStockClass(stock);
                const stockText = getStockText(stock);
                
                const productCard = document.createElement('div');
                productCard.className = 'product-card bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition duration-200';
                productCard.innerHTML = `
                    <div class="relative overflow-hidden">
                        <div class="absolute top-3 left-3 z-10">
                            ${stock === 0 ? '<span class="bg-gray-600 text-white text-xs font-bold px-2 py-1 rounded">OUT OF STOCK</span>' : ''}
                            ${stock > 0 && stock <= 5 ? '<span class="bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded">LOW STOCK</span>' : ''}
                            ${product.is_new_product ? '<span class="bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded ml-1">NEW</span>' : ''}
                            ${product.is_popular_product ? '<span class="bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded ml-1">POPULAR</span>' : ''}
                        </div>
                        
                        <button class="wishlist-btn absolute top-3 right-3 z-10 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                        
                        <div class="product-image aspect-square bg-gray-100">
                            <img src="${product.image}" 
                                 alt="${product.name}" 
                                 class="w-full h-full object-cover transition duration-300"
                                 onerror="this.src='https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
                        </div>
                        
                        <div class="quick-view absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white py-2 text-center opacity-0 transition duration-300">
                            <button class="font-medium quick-view-btn" data-product-id="${product.id}">Quick View</button>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <div class="text-xs font-semibold text-green-700 mb-1">
                            ${product.brand}
                        </div>
                        
                        <h3 class="font-bold text-gray-900 mb-2 hover:text-green-700 line-clamp-2" title="${product.name}">
                            <a href="#">${product.name}</a>
                        </h3>
                        
                        <div class="text-xs text-gray-500 mb-3">
                            SKU: ${product.sku}
                        </div>
                        
                        <div class="mb-3">
                            <div class="flex items-center">
                                <span class="text-lg font-bold text-gray-900">£${parseFloat(product.price).toFixed(2)}</span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <span class="stock-dot ${stockClass}"></span>
                            <span class="text-sm ${stockStatus === 'In Stock' ? 'text-green-600' : stockStatus === 'Low Stock' ? 'text-amber-600' : 'text-red-600'} font-medium">
                                ${stockText}
                            </span>
                        </div>
                        
                        <div class="flex space-x-2">
                            <button class="flex-1 ${stock > 0 ? 'bg-green-700 hover:bg-green-800' : 'bg-gray-400 cursor-not-allowed'} text-white font-medium py-2 px-4 rounded transition duration-200 add-to-cart-btn" ${stock === 0 ? 'disabled' : ''} data-product-id="${product.id}">
                                ${stock > 0 ? 'Add to Cart' : 'Out of Stock'}
                            </button>
                            <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-3 rounded transition duration-200 compare-btn" title="Compare" data-product-id="${product.id}">
                                <i class="fas fa-exchange-alt"></i>
                            </button>
                        </div>
                    </div>
                `;
                productGrid.appendChild(productCard);
            });
            
            attachEventListenersToProducts();
        }
        
        function getStockStatus(stock) {
            if (stock === 0) return 'Out of Stock';
            if (stock <= 5) return 'Low Stock';
            return 'In Stock';
        }
        
        function getStockClass(stock) {
            if (stock === 0) return 'stock-out';
            if (stock <= 5) return 'stock-low';
            return 'stock-in';
        }
        
        function getStockText(stock) {
            if (stock === 0) return 'Out of Stock';
            if (stock <= 5) return `Only ${stock} left in stock`;
            return 'In Stock';
        }
        
        function updateFiltersFromUI() {
            currentFilters.maxPrice = parseFloat(priceSlider.value);
            currentFilters.brands = Array.from(document.querySelectorAll('.brand-filter:checked')).map(cb => cb.value);
            currentFilters.availability = Array.from(document.querySelectorAll('.availability-filter:checked')).map(cb => cb.value);
            currentFilters.categories = Array.from(document.querySelectorAll('.category-filter:checked')).map(cb => cb.value);
            currentFilters.sortBy = sortSelect.value;
        }
        
        function setupEventListeners() {
            priceSlider.addEventListener('input', function() {
                priceDisplay.textContent = `£0 - £${parseInt(this.value).toLocaleString()}`;
            });
            
            priceSlider.addEventListener('change', function() {
                updateFiltersFromUI();
                loadProducts();
            });
            
            document.querySelectorAll('.availability-filter').forEach(filter => {
                filter.addEventListener('change', function() {
                    updateFiltersFromUI();
                    loadProducts();
                });
            });
            
            document.querySelectorAll('.category-filter').forEach(filter => {
                filter.addEventListener('change', function() {
                    updateFiltersFromUI();
                    loadProducts();
                });
            });
            
            sortSelect.addEventListener('change', function() {
                updateFiltersFromUI();
                loadProducts();
            });
            
            clearFilters.addEventListener('click', function(e) {
                e.preventDefault();
                resetAllFilters();
            });
            
            applyFilters.addEventListener('click', function() {
                updateFiltersFromUI();
                loadProducts();
            });
            
            resetFilters.addEventListener('click', resetAllFilters);
            
            retryLoad.addEventListener('click', loadProducts);
            
            gridViewBtn.addEventListener('click', function() {
                productGrid.classList.remove('grid-cols-1');
                productGrid.classList.add('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
                gridViewBtn.querySelector('svg').classList.add('text-green-700');
                gridViewBtn.querySelector('svg').classList.remove('text-gray-600');
                listViewBtn.querySelector('svg').classList.remove('text-green-700');
                listViewBtn.querySelector('svg').classList.add('text-gray-600');
            });
            
            listViewBtn.addEventListener('click', function() {
                productGrid.classList.remove('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
                productGrid.classList.add('grid-cols-1');
                listViewBtn.querySelector('svg').classList.add('text-green-700');
                listViewBtn.querySelector('svg').classList.remove('text-gray-600');
                gridViewBtn.querySelector('svg').classList.remove('text-green-700');
                gridViewBtn.querySelector('svg').classList.add('text-gray-600');
            });
        }
        
        function attachEventListenersToProducts() {
            document.querySelectorAll('.wishlist-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const heartIcon = this.querySelector('i');
                    if (heartIcon.classList.contains('far')) {
                        heartIcon.classList.remove('far');
                        heartIcon.classList.add('fas', 'text-red-500');
                    } else {
                        heartIcon.classList.remove('fas', 'text-red-500');
                        heartIcon.classList.add('far');
                    }
                });
            });
            
            document.querySelectorAll('.quick-view-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const productId = this.dataset.productId;
                    const product = allProducts.find(p => p.id == productId);
                    if (product) {
                        alert(`Quick view for: ${product.name}\nPrice: £${parseFloat(product.price).toFixed(2)}\nSKU: ${product.sku}`);
                    }
                });
            });
            
            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    if (this.disabled) return;
                    e.preventDefault();
                    const productId = this.dataset.productId;
                    const product = allProducts.find(p => p.id == productId);
                    if (product) {
                        alert(`Added "${product.name}" to cart.`);
                    }
                });
            });
            
            document.querySelectorAll('.compare-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.dataset.productId;
                    const product = allProducts.find(p => p.id == productId);
                    if (product) {
                        alert(`Added "${product.name}" to compare list.`);
                    }
                });
            });
        }
        
        function resetAllFilters() {
            const maxPrice = Math.max(...allProducts.map(p => parseFloat(p.price))) || 2000;
            priceSlider.value = Math.ceil(maxPrice);
            priceDisplay.textContent = `£0 - £${Math.ceil(maxPrice).toLocaleString()}`;
            
            document.querySelectorAll('.brand-filter').forEach(cb => {
                cb.checked = true;
            });
            
            document.querySelectorAll('.availability-filter').forEach(cb => {
                cb.checked = cb.value !== 'out_of_stock';
            });
            
            document.querySelectorAll('.category-filter').forEach(cb => {
                cb.checked = true;
            });
            
            sortSelect.value = 'relevance';
            
            updateFiltersFromUI();
            loadProducts();
        }
</script>
</body>
</html>