<?php
// header.php - Session should already be started by the parent page
// Just read session data here

// TEMPORARY DEBUG - Remove after testing
echo "<!-- HEADER DEBUG: ";
echo "Session Status: " . session_status();
echo " | Session ID: " . (session_id() ?: 'NONE');
echo " | Logged In: " . (isset($_SESSION['logged_in']) ? ($_SESSION['logged_in'] ? 'TRUE' : 'FALSE') : 'NOT SET');
echo " | User ID: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NOT SET');
echo " | User Name: " . (isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'NOT SET');
echo " -->";

// Check if user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$userName = $isLoggedIn ? ($_SESSION['user_name'] ?? 'User') : '';
$userEmail = $isLoggedIn ? ($_SESSION['user_email'] ?? '') : '';
?>


<header>
        <!-- announcement bar -->
        <?php include ('include/announcement-bar.php'); ?>

         <!-- Main navigation bar with logo, search, and cart -->
        <div class="py-3 bg-white">
            <div class="container mx-auto px-4 max-w-7xl">
                <div class="flex flex-col md:flex-row gap-4 md:gap-3 items-center">
                    <!-- Mobile menu toggle and logo -->
                    <div class="flex items-center justify-between w-full md:w-auto md:flex-grow md:basis-0">
                        <!-- Mobile menu toggle (visible on small screens) -->
                        <button id="mobileMenuToggle" class="md:hidden touch-target px-3 py-2">
                            <i class="fas fa-bars text-gray-800 text-xl"></i>
                        </button>
                        
                        <!-- Logo -->
                        <div class="md:flex-grow md:basis-0">
                            <figure class="m-0 flex p-2 justify-center md:justify-start">
                                <a href="/jacksons" class="no-underline" aria-label="Jacksons Leisure and Supplies Limited">
                                    <picture class="mx-auto block">
                                        <img src="assets/img/logo.png" alt="Jacksons Leisure and Supplies Limited" class="w-[100px] md:w-[180px]" onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'text-xl md:text-2xl font-bold text-gray-800\'>Jacksons Leisure</div>'">
                                    </picture>
                                </a>
                            </figure>
                        </div>
                        
                        <!-- Mobile cart and icons -->
                        <div class="flex items-center md:hidden">
                            <a href="/en-gb/cart" class="p-2 no-underline text-sm font-normal text-gray-800 inline-flex items-center relative gap-1 touch-target">
                                <span class="sr-only">Cart</span>
                                <span class="pointer-events-none text-sm">0</span>
                                <span class="pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    
                     <!-- Search Bar -->
                    <div class="w-full md:flex-grow md:basis-0 order-3 md:order-none">
                        <div class="flex items-center h-full my-auto justify-center md:justify-end">
                            <div class="w-full max-w-lg relative">
                                <div class="relative">
                                    <span class="absolute top-0 left-0 px-3 flex items-center h-full pointer-events-none z-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    <button type="button" id="clearSearchBtn" class="absolute top-0 right-0 h-full px-3 hidden z-10 hover:text-gray-700" aria-label="Clear search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <input type="text" id="headerSearchInput" class="w-full rounded-full py-3 md:py-2 pl-11 pr-10 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-gray-600" placeholder="Search tents, sleeping bags & much more" autocomplete="off">
                                    
                                    <!-- Search Suggestions Dropdown -->
                                    <div id="searchSuggestions" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-lg shadow-lg border border-gray-200 max-h-96 overflow-y-auto z-50">
                                        <!-- Loading state -->
                                        <div id="searchLoading" class="hidden p-4 text-center">
                                            <div class="inline-block animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                                            <p class="text-sm text-gray-600 mt-2">Searching...</p>
                                        </div>
                                        
                                        <!-- Auto-correct suggestion -->
                                        <div id="autoCorrectSuggestion" class="hidden px-4 py-3 bg-blue-50 border-b border-blue-100">
                                            <p class="text-sm text-gray-700">
                                                Did you mean: <button type="button" id="correctedTerm" class="font-semibold text-blue-600 hover:text-blue-700 underline"></button>?
                                            </p>
                                        </div>
                                        
                                        <!-- Suggestions list -->
                                        <div id="suggestionsList" class="py-2">
                                            <!-- Populated by JavaScript -->
                                        </div>
                                        
                                        <!-- No results -->
                                        <div id="noResults" class="hidden p-4 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                            <p class="text-sm text-gray-600 mt-2">No results found</p>
                                        </div>
                                        
                                        <!-- View all results -->
                                        <div id="viewAllResults" class="hidden border-t border-gray-200 p-3">
                                            <a href="#" id="viewAllLink" class="block text-center text-sm text-blue-600 hover:text-blue-700 font-medium">
                                                View all results →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Icons (Desktop) -->
                    <div class="hidden md:flex md:flex-grow md:basis-0 justify-end">
                        <nav class="flex py-0 flex-row justify-end text-right">
                            <ul class="flex flex-nowrap flex-row gap-1 items-center">
                                <!-- User Account / Profile -->
                                <li class="nav-item relative">
                                    <?php if ($isLoggedIn): ?>
                                        <!-- Logged In User - Profile Dropdown with FILLED icon -->
                                        <div class="relative group">
                                            <button class="p-2 no-underline bg-gray-300 rounded-full text-sm font-normal text-gray-800 inline-flex items-center touch-target" title="My Account">
                                                <span class="sr-only">My Account</span>
                                                <span class="pointer-events-none">
                                                    <!-- FILLED ICON for logged in users -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </span>
                                            </button>
                                            
                                            <!-- Dropdown Menu -->
                                            <div class="hidden group-hover:block absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 z-50">
                                                <!-- User Info -->
                                                <div class="px-4 py-3 border-b border-gray-200">
                                                    <p class="text-sm font-semibold text-gray-900"><?php echo htmlspecialchars($userName); ?></p>
                                                    <p class="text-xs text-gray-600 mt-1"><?php echo htmlspecialchars($userEmail); ?></p>
                                                </div>
                                                
                                                <!-- Menu Items -->
                                                <div class="py-2">
                                                    <a href="dashboard.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                                            <rect x="3" y="3" width="7" height="7"></rect>
                                                            <rect x="14" y="3" width="7" height="7"></rect>
                                                            <rect x="14" y="14" width="7" height="7"></rect>
                                                            <rect x="3" y="14" width="7" height="7"></rect>
                                                        </svg>
                                                        Dashboard
                                                    </a>
                                                    <a href="orders.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                        </svg>
                                                        My Orders
                                                    </a>
                                                    <a href="profile.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        My Profile
                                                    </a>
                                                </div>
                                                
                                                <!-- Logout -->
                                                <div class="border-t border-gray-200 py-2">
                                                    <a href="logout.php" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                            <polyline points="16 17 21 12 16 7"></polyline>
                                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                                        </svg>
                                                        Logout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <!-- Not Logged In - Login Link with OUTLINED icon -->
                                        <a href="login.php" class="p-2 no-underline hover:bg-gray-100 rounded-full text-sm font-normal text-gray-800 inline-flex items-center touch-target" title="Trade Login">
                                            <span class="sr-only">Trade Login</span>
                                            <span class="pointer-events-none">
                                                <!-- OUTLINED ICON for non-logged in users -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                
                                <li class="nav-item relative">
                                    <a href="/en-gb/favorites" class="p-2 no-underline hover:bg-gray-100 rounded-full text-sm font-normal text-gray-800 inline-flex items-center touch-target" title="Favorites">
                                        <span class="sr-only">Favorites</span>
                                        <span class="pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                            </svg>
                                        </span>
                                        <span class="absolute -top-1 -right-1 text-xs font-bold leading-none hidden bg-gray-800 text-white rounded-full w-4 h-4 flex items-center justify-center text-[10px]">0</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="/en-gb/cart" class="p-2 no-underline hover:bg-gray-100 rounded-full text-sm font-normal text-gray-800 inline-flex items-center relative gap-1 touch-target" title="Shopping Cart">
                                        <span class="sr-only">Cart</span>
                                        <span class="pointer-events-none text-sm">0</span>
                                        <span class="pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobileMenu" class="mobile-menu md:hidden bg-white border-t border-gray-200 overflow-y-auto max-h-[calc(100vh-140px)]">
            <div class="container mx-auto px-4 max-w-7xl">
                <nav class="py-4">
                    <!-- Mobile user section -->
                    <?php if ($isLoggedIn): ?>
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <div class="px-4 py-3 bg-gray-50 rounded-lg">
                                <p class="text-sm font-semibold text-gray-900"><?php echo htmlspecialchars($userName); ?></p>
                                <p class="text-xs text-gray-600 mt-1"><?php echo htmlspecialchars($userEmail); ?></p>
                            </div>
                            <div class="mt-3 space-y-1">
                                <a href="dashboard.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="orders.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                    My Orders
                                </a>
                                <a href="profile.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    My Profile
                                </a>
                                <a href="logout.php" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    Logout
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                
                    <ul class="space-y-1 mobile-menu-nav">
                        <!-- Kitchen -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Kitchen</span>
                                <svg class="w-4 h-4 transition-transform duration-200 group-[.active]:rotate-180" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=kitchen" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Kitchen
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=kitchen" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Kitchen</a></li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>Fridges</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=kitchen&subcategory=fridges" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Fridges</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=fridges&type=compressor" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Compressor</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=fridges&type=absorption" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Absorption</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.php?category=kitchen&subcategory=hobs" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Hobs</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=sink" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sink</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=taps" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Taps</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=air-fryers" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Air Fryers</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=microwaves" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">MicroWaves</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=extractor-fans" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Extractor Fans</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=complete-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Complete Kits</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=hobs-sink" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Hobs and Sink combination</a></li>
                                        <li><a href="product.php?category=kitchen&subcategory=oven-grills" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Oven Grills & Cookers</a></li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>CoolBoxes</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=kitchen&subcategory=coolboxes" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All CoolBoxes</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=coolboxes&type=passive" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Passive</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=coolboxes&type=thermo-electric" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Thermo Electric</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=coolboxes&type=compressor" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Compressor</a></li>
                                                <li><a href="product.php?category=kitchen&subcategory=coolboxes&type=absorption" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Absorption</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Bathroom -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Bathroom</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=bathroom" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Bathroom
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=bathroom" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Bathroom</a></li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>Portable & Cassette Toilets</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=bathroom&subcategory=toilets" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Portable & Cassette Toilets</a></li>
                                                <li><a href="product.php?category=bathroom&subcategory=toilets&type=portable" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Portable Toilets</a></li>
                                                <li><a href="product.php?category=bathroom&subcategory=toilets&type=cassette" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Cassette Toilets</a></li>
                                                <li><a href="product.php?category=bathroom&subcategory=cleaning-chemical" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Cleaning & Chemical</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.php?category=bathroom&subcategory=shower-trays" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Shower Trays</a></li>
                                        <li><a href="product.php?category=bathroom&subcategory=sinks-vanity" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sinks & Vanity Cabinets</a></li>
                                        <li><a href="product.php?category=bathroom&subcategory=taps-showers" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Taps & Showers</a></li>
                                        <li><a href="product.php?category=bathroom&subcategory=conversion-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Bathroom Conversion Kits</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Electrical -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Electrical</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=electrical" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Electrical
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=electrical" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Electrical</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=cables-fuses" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cables & Fuses</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=complete-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Complete Kits</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=control-panel" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Control panel</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=dc-dc-chargers" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">DC-DC Chargers</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=inverter" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Inverter</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=mains-chargers" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Mains Chargers</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=battery-monitoring" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Battery Monitoring</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=leisure-batteries" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Leisure Batteries</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=main-hook-up" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Main Hook Up</a></li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>Solar</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=electrical&subcategory=solar" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Solar</a></li>
                                                <li><a href="product.php?category=electrical&subcategory=solar&type=fixing-kits" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Fixing Kits & Cable Entry Glands</a></li>
                                                <li><a href="product.php?category=electrical&subcategory=solar&type=controllers" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Solar Controllers</a></li>
                                                <li><a href="product.php?category=electrical&subcategory=solar&type=rigid-panels" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Rigids Solar Panels & Kits</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.php?category=electrical&subcategory=power-management" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Power Management System</a></li>
                                        <li><a href="product.php?category=electrical&subcategory=sockets-switches" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sockets & Switches</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Gas & Water -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Gas & Water</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=gas-water" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Gas & Water
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=gas-water" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Gas & Water</a></li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>Gas Equipments</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=gas-water&subcategory=gas" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Gas Equipment</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=gas&type=locker" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Locker</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=gas&type=outlets" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Outlets</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=gas&type=regulators" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Regulators</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=gas&type=pipe-fittings" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Pipe & Fittings</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=gas&type=vents" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Vents</a></li>
                                            </ul>
                                        </li>
                                        <li class="mobile-submenu-item">
                                            <button class="mobile-submenu-toggle flex items-center justify-between w-full px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <span>Water Equipments</span>
                                                <svg class="w-3 h-3 transition-transform duration-200" 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    viewBox="0 0 24 24" 
                                                    fill="none" 
                                                    stroke="currentColor" 
                                                    stroke-width="2" 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </button>
                                            <ul class="mobile-submenu-2 hidden">
                                                <li><a href="product.php?category=gas-water&subcategory=water" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Water Equipment</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=water&type=pipe-fittings" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Pipe & Fittings</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=water&type=taps" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Taps</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=water&type=inlets" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Inlets</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=water&type=pumps" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Pumps</a></li>
                                                <li><a href="product.php?category=gas-water&subcategory=water&type=tanks" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Tanks</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Heater & Air Cons -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Heater & Air Cons</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=heater-air-cons" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Heater & Air Cons
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=heater-air-cons" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Heater & Air Cons</a></li>
                                        <li><a href="product.php?category=heater-air-cons&subcategory=air-conditioners" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Air Conditioners</a></li>
                                        <li><a href="product.php?category=heater-air-cons&subcategory=blown-air-heaters" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Blown Air Heaters</a></li>
                                        <li><a href="product.php?category=heater-air-cons&subcategory=water-heaters" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Water Heaters</a></li>
                                        <li><a href="product.php?category=heater-air-cons&subcategory=accessories" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Awnings -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Awnings</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=awnings" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Awnings
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=awnings" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Awnings</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=wind-out" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Wind Out Awnings</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=camping" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Camping</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=motorhome" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Motorhome Awnings</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=campervan" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Campervan Awnings</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=caravan" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Caravan Awnings</a></li>
                                        <li><a href="product.php?category=awnings&subcategory=accessories" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Windows & Rooflight -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Windows & Rooflight</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=windows-rooflight" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Windows & Rooflight
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=windows-rooflight" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Windows & Rooflight</a></li>
                                        <li><a href="product.php?category=windows-rooflight&subcategory=windows" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Windows</a></li>
                                        <li><a href="product.php?category=windows-rooflight&subcategory=curtains-blinds" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Curtains & Blinds</a></li>
                                        <li><a href="product.php?category=windows-rooflight&subcategory=rooflights" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Rooflights</a></li>
                                        <li><a href="product.php?category=windows-rooflight&subcategory=bonding-adhesive" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Bonding & Adhesive</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Spares -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Spares</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=spares" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Spares
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=spares" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Spares</a></li>
                                        <li><a href="product.php?category=spares&subcategory=dometic" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Dometic Spares</a></li>
                                        <li><a href="product.php?category=spares&subcategory=thetford" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Thetford Spares</a></li>
                                        <li><a href="product.php?category=spares&subcategory=truma" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Truma Spares</a></li>
                                        <li><a href="product.php?category=spares&subcategory=fiamma" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Fiamma Spares</a></li>
                                        <li><a href="product.php?category=spares&subcategory=maxxair" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Maxxair</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Bundles -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Bundles</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=bundles" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Bundles
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=bundles" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Bundles</a></li>
                                        <li><a href="product.php?category=bundles&subcategory=electrical-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Electrical Kits</a></li>
                                        <li><a href="product.php?category=bundles&subcategory=heater-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Heater Kits</a></li>
                                        <li><a href="product.php?category=bundles&subcategory=kitchen-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Kitchen Kits</a></li>
                                        <li><a href="product.php?category=bundles&subcategory=water-gas-kits" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Water & Gas Kits</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Conversion Equipments -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Conversion Equipments</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=conversion" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Conversion Equipment
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=conversion" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Conversion</a></li>
                                        <li><a href="product.php?category=conversion&subcategory=adhesive" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Adhesive</a></li>
                                        <li><a href="product.php?category=conversion&subcategory=lining-insulation" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Lining & Insulation</a></li>
                                        <li><a href="product.php?category=conversion&subcategory=swivel-plates" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Swivel Plates</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Camping Equipment -->
                        <li class="mobile-menu-item group">
                            <button class="mobile-menu-toggle flex items-center justify-between w-full px-4 py-3 no-underline font-normal uppercase text-sm text-gray-900 tracking-wide border-b border-gray-100">
                                <span>Camping Equipment</span>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="mobile-submenu hidden">
                                <div class="bg-gray-50">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <a href="product.php?category=camping" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Camping Equipment
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="product.php?category=camping" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Camping Equipment</a></li>
                                        <li><a href="product.php?category=camping&subcategory=tents" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Tents</a></li>
                                        <li><a href="product.php?category=camping&subcategory=furniture" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Furniture</a></li>
                                        <li><a href="product.php?category=camping&subcategory=cooling" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cooling</a></li>
                                        <li><a href="product.php?category=camping&subcategory=cooking" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cooking</a></li>
                                        <li><a href="product.php?category=camping&subcategory=sleeping" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sleeping</a></li>
                                        <li><a href="product.php?category=camping&subcategory=accessories" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <!-- Mobile user actions (for non-logged-in users) -->
                    <?php if (!$isLoggedIn): ?>
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <ul class="space-y-2">
                                <li>
                                    <a href="login.php" class="flex items-center px-4 py-3 no-underline text-sm font-normal text-gray-800">
                                        <span class="mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                        Trade Login
                                    </a>
                                </li>
                                <li>
                                    <a href="/en-gb/favorites" class="flex items-center px-4 py-3 no-underline text-sm font-normal text-gray-800">
                                        <span class="mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                            </svg>
                                        </span>
                                        Favorites
                                    </a>
                                </li>
                                <li>
                                    <a href="/en-gb/cart" class="flex items-center px-4 py-3 no-underline text-sm font-normal text-gray-800">
                                        <span class="mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                            </svg>
                                        </span>
                                        Cart (0)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <!-- Desktop Mega Menu -->
        <div class="py-0 bg-white hidden md:block">
            <div class="container mx-auto px-4 max-w-7xl">
                <div class="flex flex-row">
                    <div class="w-full">
                        <div class="flex justify-center text-center">
                            <!-- Main categories menu -->
                            <nav class="flex py-0 justify-center text-center">
                                <ul class="flex flex-nowrap">
                                    <!-- Kitchen -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=kitchen">
                                            <span class="whitespace-nowrap">Kitchen</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Kitchen</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=kitchen" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Kitchen</a></li>
                                                            <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=kitchen&subcategory=fridges" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Fridges</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=fridges" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Fridges
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=fridges&type=compressor" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=fridges&type=absorption" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Absorption
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li><a href="product.php?category=kitchen&subcategory=hobs" class="text-sm hover:underline">Hobs</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=sink" class="text-sm hover:underline">Sink</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=taps" class="text-sm hover:underline">Taps</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=air-fryers" class="text-sm hover:underline">Air Fryers</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=microwaves" class="text-sm hover:underline">MicroWaves</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=extractor-fans" class="text-sm hover:underline">Extractor Fans</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=complete-kits" class="text-sm hover:underline">Complete Kits</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=hobs-sink" class="text-sm hover:underline">Hobs and Sink combination</a></li>
                                                            <li><a href="product.php?category=kitchen&subcategory=oven-grills" class="text-sm hover:underline">Oven Grills & Cookers</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=kitchen&subcategory=coolboxes" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>CoolBoxes</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=coolboxes" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All CoolBoxes
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=coolboxes&type=passive" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Passive
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=coolboxes&type=thermo-electric" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Thermo Electric
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=coolboxes&type=compressor" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=kitchen&subcategory=coolboxes&type=absorption" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Absorption
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Bathroom -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=bathroom">
                                            <span class="whitespace-nowrap">Bathroom</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Bathroom</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=bathroom" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Bathroom</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=bathroom&subcategory=toilets" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Portable & Cassette Toilets</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=bathroom&subcategory=toilets" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Portable & Cassette Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=bathroom&subcategory=toilets&type=portable" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Portable Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=bathroom&subcategory=toilets&type=cassette" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cassette Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=bathroom&subcategory=cleaning-chemical" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cleaning & Chemical 
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li><a href="product.php?category=bathroom&subcategory=shower-trays" class="text-sm hover:underline">Shower Trays </a></li>
                                                            <li><a href="product.php?category=bathroom&subcategory=sinks-vanity" class="text-sm hover:underline">Sinks & Vanity Cabinets</a></li>
                                                            <li><a href="product.php?category=bathroom&subcategory=taps-showers" class="text-sm hover:underline">Taps & Showers</a></li>
                                                            <li><a href="product.php?category=bathroom&subcategory=conversion-kits" class="text-sm hover:underline">Bathroom Conversion Kits</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Electrical -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=electrical">
                                            <span class="whitespace-nowrap">Electrical</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Electrical</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=electrical" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Electrical</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=cables-fuses" class="text-sm hover:underline">Cables & Fuses</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=complete-kits" class="text-sm hover:underline">Complete Kits</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=control-panel" class="text-sm hover:underline">Control panel</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=dc-dc-chargers" class="text-sm hover:underline">DC-DC Chargers</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=inverter" class="text-sm hover:underline">Inverter</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=mains-chargers" class="text-sm hover:underline">Mains Chargers</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=battery-monitoring" class="text-sm hover:underline">Battery Monitoring</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=leisure-batteries" class="text-sm hover:underline">Leisure Batteries</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=main-hook-up" class="text-sm hover:underline">Main Hook Up</a></li>
                                                            <!-- Solar with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=electrical&subcategory=solar" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Solar</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Solar Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=electrical&subcategory=solar" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Solar
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=electrical&subcategory=solar&type=fixing-kits" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fixing Kits & Cable Entry Glands
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=electrical&subcategory=solar&type=controllers" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Solar Controllers
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=electrical&subcategory=solar&type=rigid-panels" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Rigids Solar Panels & Kits
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li><a href="product.php?category=electrical&subcategory=power-management" class="text-sm hover:underline">Power Management System</a></li>
                                                            <li><a href="product.php?category=electrical&subcategory=sockets-switches" class="text-sm hover:underline">Sockets & Switches</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Gas & Water -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=gas-water">
                                            <span class="whitespace-nowrap">Gas & Water</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Gas & Water</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=gas-water" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Gas & Water</a></li>
                                                            <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=gas-water&subcategory=gas" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Gas Equipments</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Gas Equipment
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas&type=locker" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Locker
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas&type=outlets" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Outlets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas&type=regulators" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Regulators
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas&type=pipe-fittings" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Pipe & Fittings
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=gas&type=vents" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Vents
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=gas-water&subcategory=water" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Water Equipments</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Water Equipment
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water&type=pipe-fittings" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Pipe & Fittings
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water&type=taps" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Taps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water&type=inlets" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Inlets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water&type=pumps" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Pumps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=gas-water&subcategory=water&type=tanks" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Tanks
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Heater & Air Cons -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=heater-air-cons">
                                            <span class="whitespace-nowrap">Heater & Air Cons</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Heater & Air Cons</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=heater-air-cons" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Heater & Air Cons</a></li>
                                                            <li><a href="product.php?category=heater-air-cons&subcategory=air-conditioners" class="text-sm hover:underline">Air Conditioners </a></li>
                                                            <li><a href="product.php?category=heater-air-cons&subcategory=blown-air-heaters" class="text-sm hover:underline">Blown Air Heaters</a></li>
                                                            <li><a href="product.php?category=heater-air-cons&subcategory=water-heaters" class="text-sm hover:underline">Water Heaters</a></li>
                                                            <li><a href="product.php?category=heater-air-cons&subcategory=accessories" class="text-sm hover:underline">Accessories</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Awnings -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=awnings">
                                            <span class="whitespace-nowrap">Awnings</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Awnings</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=awnings" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Awnings</a></li>
                                                            <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=awnings&subcategory=wind-out" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Wind Out Awnings</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=awnings&subcategory=wind-out" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Wind Out Awnings
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="product.php?category=awnings&subcategory=awning-mounting-rails" class="py-2 px-4 text-sm hover:underline">Awning Mounting Rails</a></li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Fiamma</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Fiamma Awning
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fiamma Awning Brackets</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Fiamma Awning Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets&model=f35" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F35 Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets&model=f40" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F40 Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets&model=f45s" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F45s Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=brackets&model=f65-f80s" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F65/F80s Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=accessories" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Fiamma Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=privacy-rooms" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Fiamma Privacy Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=fiamma&type=awnings" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Fiamma Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=wind-out&brand=thule" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thule</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=thule" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Thule Awning
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=brackets" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Thule Awning Brackets</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=brackets" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Thule Awning Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=brackets&model=omnister-4200" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Omnister 4200 Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=brackets&model=omnister-6300" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Omnister 6300 Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=residence-rooms" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Thule Residence Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=awnings" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Thule Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=wind-out&brand=thule&type=accessories" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            Thule Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=privacy-rooms" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Privacy Rooms & Panels</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=privacy-rooms" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Privacy Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=fiamma" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fiamma</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=fiamma" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Fiamma Privacy Rooms & Panels
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=fiamma&type=rooms" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Fiamma Privacy Rooms
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=fiamma&type=panels" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Fiamma Panels & Blockers
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=thule" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Thule</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=thule" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Thule Privacy Rooms & Panels
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=thule&type=rooms" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Thule Residence Rooms
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="product.php?category=awnings&subcategory=privacy-rooms&brand=thule&type=panels" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Thule Side Panels & Blockers
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=motorhome" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Motorhome Awnings</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=motorhome" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Motorhome Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=motorhome&type=drive-away" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Drive Away Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=motorhome&type=sun-canopies" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=campervan" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Campervan Awnings</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=campervan" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Campervan Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=inflatable" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Inflatable Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=drive-away" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Drive Away Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=poled" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Poled Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=tailgate-tents" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Tailgate Tents</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=sun-canopies" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=campervan&type=package-deals" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Package Deals</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=caravan" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Caravan Awnings</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=caravan" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Caravan Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=caravan&type=inflatable" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Inflatable Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=caravan&type=poled" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Poled Awnings</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=caravan&type=sun-canopies" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="product.php?category=awnings&subcategory=accessories" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Accessories</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="product.php?category=awnings&subcategory=accessories" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=accessories&type=annexes" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Annexes & inners</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=accessories&type=carpets" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Carpets</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=accessories&type=extensions" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Extensions & Canopies</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=accessories&type=fixing-kits" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fixing Kits</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="">
                                                                                        <a href="product.php?category=awnings&subcategory=accessories&type=footprints" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Footprints</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="">
                                                                <a href="product.php?category=awnings&subcategory=camping" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Camping</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Windows & Rooflight -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=windows-rooflight">
                                            <span class="whitespace-nowrap">Windows & Rooflight</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Windows & Rooflight</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=windows-rooflight" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Windows & Rooflight</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=windows-rooflight&subcategory=windows" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Windows</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Windows Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=windows" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Windows
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="product.php?category=windows-rooflight&subcategory=windows&type=caravan-motorhome" class="text-sm hover:underline px-4 py-2">Caravan, Campervan & Motorhome Windows</a></li>
                                                                        <li><a href="product.php?category=windows-rooflight&subcategory=windows&type=bonded-glass" class="text-sm hover:underline px-4 py-2">Bonded Glass Windows</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=windows-rooflight&subcategory=curtains-blinds" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Curtains & Blinds</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=curtains-blinds" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Curtains & Blinds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=curtains-blinds&type=cab-blinds" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cab Blinds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=curtains-blinds&type=windows-blinds" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Windows Blinds
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=windows-rooflight&subcategory=rooflights" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Rooflights</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=rooflights" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Rooflights
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=rooflights&type=fan-assisted" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fan Assisted Rooflights
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=windows-rooflight&subcategory=rooflights&type=standard" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Standard Rooflights
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=windows-rooflight&subcategory=bonding-adhesive" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Bonding & Adhesive</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Spares -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=spares">
                                            <span class="whitespace-nowrap">Spares</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Spares</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=spares" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Spares</a></li>
                                                            <!-- Dometic Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=spares&subcategory=dometic" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Dometic Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Dometic Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic&type=rooflight" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Rooflight Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic&type=toilet" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Toilet Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic&type=window" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic window Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic&type=cooker" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Cooker Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=dometic&type=fridge" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Fridge Spares
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Thetford Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=spares&subcategory=thetford" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Thetford Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=thetford" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Thetford Spares
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=spares&subcategory=thetford&type=cassette-toilet" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Cassette Toilet Spares</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=spares&subcategory=thetford&type=porta-potti" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Porta Potti Spares</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=spares&subcategory=thetford&type=fridge" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Fridge Spares</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=spares&subcategory=thetford&type=cooker" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Cooker, Hob, Oven & Grill Spares</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Truma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=spares&subcategory=truma" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Truma Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=truma" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Truma Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=truma&type=gas-heaters" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Heaters
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=truma&type=space-water-heater" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Space & Water Heater
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=truma&type=water-filtration" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water & Filtration
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Fiamma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=spares&subcategory=fiamma" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Fiamma Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=fiamma" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Fiamma Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=fiamma&type=awning" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Awning Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=fiamma&type=bike-rakes" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Bike Rakes Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=spares&subcategory=fiamma&type=rooflight" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Rooflight Spares
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Maxxair Spares -->
                                                            <li class="">
                                                                <a href="product.php?category=spares&subcategory=maxxair" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Maxxair</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Bundles -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=bundles">
                                            <span class="whitespace-nowrap">Bundles</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Bundles</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=bundles" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Bundles</a></li>
                                                            <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=bundles&subcategory=electrical-kits" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Electrical Kits</span>
                                                                </a>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=bundles&subcategory=heater-kits" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Heater Kits</span>
                                                                </a>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=bundles&subcategory=kitchen-kits" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Kitchen Kits</span>
                                                                </a>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=bundles&subcategory=water-gas-kits" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Water & Gas Kits</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Conversion Equipments -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=conversion">
                                            <span class="whitespace-nowrap">Conversion Equipments</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Conversion Equipment</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=conversion" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Conversion</a></li>
                                                            <li class="">
                                                                <a href="product.php?category=conversion&subcategory=adhesive" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Adhesive</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="product.php?category=conversion&subcategory=lining-insulation" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Lining & Insulation</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="product.php?category=conversion&subcategory=swivel-plates" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Swivel Plates</span>
                                                                </a>
                                                            </li>    
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Camping Equipment -->
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="product.php?category=camping">
                                            <span class="whitespace-nowrap">Camping Equipment</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Camping Equipment</h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="product.php?category=camping" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Camping Equipment</a></li>
                                                            <!-- Dometic Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=tents" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Tents</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents&type=family" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Family Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents&type=technical" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Technical Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents&type=packages" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Tent Packages 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents&type=rooftop" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Rooftop Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=tents&type=shelters" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camping Shelters
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Thetford Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=furniture" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Furniture</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=furniture" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Furniture
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=camping&subcategory=furniture&type=beds" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Beds</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=camping&subcategory=furniture&type=chairs" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Chairs</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=camping&subcategory=furniture&type=kitchen-storage" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Kitchen Storage</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="product.php?category=camping&subcategory=furniture&type=tables" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Tables</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Truma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=cooling" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Cooling</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooling" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Cooling
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooling&type=cool-boxes" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camping Cool Boxes
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooling&type=thermo-electric" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Thermo Electric
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooling&type=compressor" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor Fridge Freezers
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Fiamma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=cooking" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Cooking</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Cooking
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=bbq" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                BBQ
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=boiling-rings" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Boiling Rings
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=cookers-stoves" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cookers & Stoves
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=kettles" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Kettles 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=pots-pans" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Pots & Pans
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=cooking&type=tableware" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Tableware
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Maxxair Spares -->
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=sleeping" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Sleeping</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=sleeping" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Sleeping
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=sleeping&type=camp-beds" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camp Beds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=sleeping&type=self-inflating" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Self-inflating Matresses
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=sleeping&type=sleeping-bags" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Sleeping Bags
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="product.php?category=camping&subcategory=accessories" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Accessories</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Accessories Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Accessories
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=gas" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=pumps" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Pumps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=tent-accessories" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Tent Accessories
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=electric-hook-up" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Electric Hook Up Cables
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=lighting" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Lighting
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=storage" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Storage
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=water-carries" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Carries 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="product.php?category=camping&subcategory=accessories&type=windbreakers" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Windbreakers
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>