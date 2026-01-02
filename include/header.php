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
                            <div class="w-full max-w-lg">
                                <div class="relative">
                                    <span class="absolute top-0 left-0 px-3 flex items-center h-full pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    <button type="button" class="absolute top-0 right-0 h-full px-3 hidden" aria-label="Clear search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <input type="text" class="w-full rounded-full py-3 md:py-2 pl-11 pr-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 text-sm text-gray-600" placeholder="Search tents, sleeping bags & much more" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Icons (Desktop) -->
                    <div class="hidden md:flex md:flex-grow md:basis-0 justify-end">
                        <nav class="flex py-0 flex-row justify-end text-right">
                            <ul class="flex flex-nowrap flex-row gap-1 items-center">
                                <li class="nav-item">
                                    <a href="/en-gb/trade-login" class="p-2 no-underline hover:underline text-sm font-normal text-gray-800 inline-flex items-center touch-target" title="Trade Login">
                                        <span class="sr-only">Trade Login</span>
                                        <span class="pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item relative">
                                    <a href="/en-gb/favorites" class="p-2 no-underline hover:underline text-sm font-normal text-gray-800 inline-flex items-center touch-target" title="Favorites">
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
                                    <a href="/en-gb/cart" class="p-2 no-underline hover:underline text-sm font-normal text-gray-800 inline-flex items-center relative gap-1 touch-target" title="Shopping Cart">
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Kitchen
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Kitchen</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Fridges</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Compressor</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Absorption</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Hobs</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sink</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Taps</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Air Fryers</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">MicroWaves</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Extractor Fans</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Complete Kits</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Hobs and Sink combination</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Oven Grills & Cookers</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All CoolBoxes</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Passive</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Thermo Electric</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Compressor</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Absorption</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Bathroom
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Bathroom</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Portable & Cassette Toilets</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Portable Toilets</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Cassette Toilets</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Cleaning & Chemical</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Shower Trays</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sinks & Vanity Cabinets</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Taps & Showers</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Bathroom Conversion Kits</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Electrical
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Electrical</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cables & Fuses</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Complete Kits</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Control panel</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">DC-DC Chargers</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Inverter</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Mains Chargers</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Battery Monitoring</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Leisure Batteries</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Main Hook Up</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Solar</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Fixing Kits & Cable Entry Glands</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Solar Controllers</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Rigids Solar Panels & Kits</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Power Management System</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sockets & Switches</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Gas & Water
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Gas & Water</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Gas Equipment</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Locker</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Outlets</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Regulators</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Gas Pipe & Fittings</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Vents</a></li>
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
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">All Water Equipment</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Pipe & Fittings</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Taps</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Inlets</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Pumps</a></li>
                                                <li><a href="#" class="block px-12 py-2 text-sm text-gray-600 hover:bg-gray-100">Water Tanks</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Heater & Air Cons
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Heater & Air Cons</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Air Conditioners</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Blown Air Heaters</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Water Heaters</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Awnings
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Awnings</a></li>
                                        <!-- Note: Awnings has complex nested structure - simplified for mobile -->
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Wind Out Awnings</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Camping</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Motorhome Awnings</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Campervan Awnings</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Caravan Awnings</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Windows & Rooflight
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Windows & Rooflight</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Windows</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Curtains & Blinds</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Rooflights</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Bonding & Adhesive</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Spares
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Spares</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Dometic Spares</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Thetford Spares</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Truma Spares</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Fiamma Spares</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Maxxair</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Bundles
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Bundles</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Electrical Kits</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Heater Kits</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Kitchen Kits</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Water & Gas Kits</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Conversion Equipment
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Conversion</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Adhesive</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Lining & Insulation</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Swivel Plates</a></li>
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
                                        <a href="#" class="text-sm font-medium text-gray-900 hover:text-green-700">
                                            All Camping Equipment
                                        </a>
                                    </div>
                                    <ul class="space-y-1">
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">See all Camping Equipment</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Tents</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Furniture</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cooling</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Cooking</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Sleeping</a></li>
                                        <li><a href="#" class="block px-8 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <!-- Mobile user actions -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <ul class="space-y-2">
                            <li>
                                <a href="/en-gb/trade-login" class="flex items-center px-4 py-3 no-underline text-sm font-normal text-gray-800">
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
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Kitchen</a></li>
                                                              <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Fridges</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Fridges
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Absorption
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li><a href="#" class="text-sm hover:underline">Hobs</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Sink</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Taps</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Air Fryers</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">MicroWaves</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Extractor Fans</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Complete Kits</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Hobs and Sink combination</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Oven Grills & Cookers</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>CoolBoxes</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All CoolBoxes
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Passive
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Thermo Electric
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
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
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Bathroom</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Portable & Cassette Toilets</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Portable & Cassette Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Portable Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cassette Toilets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cleaning & Chemical 
                                                                            </a>
                                                                        </li>
                                                                       
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li><a href="#" class="text-sm hover:underline">Shower Trays </a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Sinks & Vanity Cabinets</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Taps & Showers</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Bathroom Conversion Kits</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Electrical</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Cables & Fuses</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Complete Kits</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Control panel</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">DC-DC Chargers</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Inverter</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Mains Chargers</a></li>
                                                            <!-- <li><a href="#" class="text-sm hover:underline">LED Lightings</a></li> -->
                                                            <li><a href="#" class="text-sm hover:underline">Battery Monitoring</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Leisure Batteries</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Main Hook Up</a></li>
                                                              <!-- Solar with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Solar</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Solar Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Solar
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fixing Kits & Cable Entry Glands
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Solar Controllers
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Rigids Solar Panels & Kits
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                           
                                                            <li><a href="#" class="text-sm hover:underline">Power Management System</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Sockets & Switches</a></li>
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Gas & Water</a></li>
                                                              <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Gas Equipments</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Gas Equipment
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Locker
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Outlets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Regulators
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Pipe & Fittings
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Vents
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Water Equipments</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Water Equipment
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Pipe $ Fittings 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Taps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Inlets
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water Pumps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
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
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Heater & Air COns</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Air Conditioners </a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Blown Air Heaters</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Water Heaters</a></li>
                                                            <li><a href="#" class="text-sm hover:underline">Accessories</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Awnings</a></li>
                                                            
                                                              <!-- Fridges with submenu -->
                                                              <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Wind Out Awnings</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Wind Out Awnings
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#" class="py-2 px-4 text-sm hover:underline">Awning Mounting Rails</a></li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Fiamma</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Fiamma Awning
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fiamma Awning Brackets</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Fiamma Awning Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F35 Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F40 Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F45s Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        F65/F80s Fixing Kits & Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Fiamma Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Fiamma Privacy Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Fiamma Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thule</span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Thule Awning
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Thule Awning Brackets</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Thule Awning Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Omnister 4200 Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Omnister 6300 Brackets
                                                                                                    </a>
                                                                                                </li>
                                                                                                
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Thule Residence Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Thule Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                           Thule Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Privacy Rooms & Panels </span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Privacy Rooms & Panels
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fiamma</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Fiamma Privacy Rooms & Panels
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Fiamma Privacy Rooms
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Fiamma Panels & Blockers
                                                                                                    </a>
                                                                                                </li>
                                                                                                
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>

                                                                                   <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Thule</span>
                                                                                            <span class="submenu-indicator text-gray-400">›</span>
                                                                                        </a>
                                                                                        <!-- Fridges Submenu -->
                                                                                        <div class="submenu">
                                                                                            <ul class="py-2">
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        All Thule Privacy Rooms & Panels
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                                        Thule Residence Rooms
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
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
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Motorhome Awnings </span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Motorhome Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Drive Away Awnings</span>
                                                                                            
                                                                                        </a>
                                                                                    </li>

                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Campervan Awnings </span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Campervan Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Inflatable Awnings</span>
                                                                                            
                                                                                        </a>
                                                                                    </li>

                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Drive Away Awnings</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Poled Awnings</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Tailgate Tents</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Package Deals</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Caravan Awnings </span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Caravan Awnings
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Inflatable Awnings</span>
                                                                                            
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Poled Awnings</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Sun Canopies</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="submenu-parent">
                                                                            <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Accessories </span>
                                                                                <span class="submenu-indicator text-gray-400">›</span>
                                                                            </a>
                                                                            <!-- Fridges Submenu -->
                                                                            <div class="submenu">
                                                                                <ul class="py-2">
                                                                                    <li>
                                                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                            All Accessories
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Annexes & inners</span>
                                                                                            
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Carpets</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Extensions &Canopies</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>

                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                            <span>Fixing Kits</span>
                                                                                           
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="submenu-parent">
                                                                                        <a href="#" class="py-2 px-4 text-sm hover:underline flex items-center justify-between group/submenu">
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
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Camping</span>
                                                                    
                                                                </a>
                                                              
                                                            </li>
                                                            
                                                           
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Windows & Rooflight</a></li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Windows</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Windows Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Windows
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#" class="text-sm hover:underline px-4 py-2">Caravan, Campervan & Motorhome Windows</a></li>
                                                                        <li><a href="#" class="text-sm hover:underline px-4 py-2">Bonded Glass Windows</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Curtains & Blinds</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Curtains & Blinds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cab Blinds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Windows Blinds
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Rooflights</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Rooflights
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fan Assisted Rooflights
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Standard Rooflights
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Bonding & Adhesive</span>
                                                                    
                                                                </a>
                                                                
                                                            </li>
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Spares</a></li>
                                                            <!-- Dometic Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Dometic Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Dometic Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Rooflight Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Toilet Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic window Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Cooker Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Dometic Fridge Spares
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Thetford Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Thetford Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Thetford Spares
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Cassette Toilet Spares</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Porta Potti Spares</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Fridge Spares</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Thetford Cooker, Hob, Oven & Grill Spares</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                             <!-- Truma Spares with submenu -->
                                                             <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Truma Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Truma Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas Heaters
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Space & Water Heater
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Water & Filtration
                                                                            </a>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Fiamma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Fiamma Spares</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Fiamma Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Awning Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Bike Rakes Spares
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Fiamma Rooflight Spares
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                             <!-- Maxxair Spares -->
                                                             <li class="">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Maxxair</span>
                                                                   
                                                                </a>
                                                               
                                                            </li>
                                                        
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Bundles</a></li>
                                                              <!-- Fridges with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Electrical Kits</span>
                                                                    <!-- <span class="submenu-indicator text-gray-400">›</span> -->
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <!-- <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Electrical Kits
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                <span>Victron Energy</span>
                                                                            </a>             
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div> -->
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Heater Kits</span>
                                                                </a>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Kitchen Kits</span>
                                                                </a>
                                                            </li>
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Water & Gas Kits</span>
                                                                </a>
                                                            </li>
                                                        
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
                                            <span class="whitespace-nowrap">Conversion Equipments</span>
                                        </a>
                                        <!-- Mega Dropdown -->
                                        <div class="hidden group-hover:block fixed left-0 top-[var(--nav-height)] bg-white shadow-lg border-t border-gray-200 z-50 w-full">
                                            <div class="container mx-auto px-4 py-6 lg:py-8 max-w-7xl">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                                    <!-- Air tents -->
                                                    <div>
                                                        <h3 class="font-bold text-sm mb-4 text-left">All Conversion Equipment </h3>
                                                        <ul class="space-y-2 text-left">
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Conversion</a></li>
                                                            <li class="">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Adhesive</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Lining & Insulation</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Swivel Plates</span>
                                                                </a>
                                                            </li>    
                                                        </ul>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="group relative">
                                        <a class="px-3 lg:px-4 py-3 no-underline hover:underline font-normal uppercase text-xs inline-flex items-center text-gray-900 tracking-wide touch-target" href="/en-gb/ecommerce/tents">
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
                                                            <li><a href="#" class="text-sm hover:underline flex items-center gap-1"><span>›</span> See all Camping Equipment</a></li>
                                                            <!-- Dometic Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Tents</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Family Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Technical Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Tent Packages 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Rooftop Tents
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camping Shelters
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Thetford Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Furniture</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Furniture
                                                                            </a>
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Beds</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Chairs</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Kitchen Storage/span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                        <li class="">
                                                                            <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                                <span>Tables</span>
                                                                                
                                                                            </a>
                                                                          
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                             <!-- Truma Spares with submenu -->
                                                             <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Cooling</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Cooling
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camping Cool Boxes
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Thermo Electric
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Compressor Fridge Freezers
                                                                            </a>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- Fiamma Spares with submenu -->
                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Cooking</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Cooking
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                BBQ
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Boiling Rings
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Cookers & Stoves
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Kettles 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Pots & Pans
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Tableware
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                             <!-- Maxxair Spares -->
                                                             <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Sleeping</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Fridges Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Sleeping
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Camp Beds
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Self-inflating Matresses
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Sleeping Bags
                                                                            </a>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </li>

                                                            <li class="submenu-parent">
                                                                <a href="#" class="text-sm hover:underline flex items-center justify-between group/submenu">
                                                                    <span>Accessories</span>
                                                                    <span class="submenu-indicator text-gray-400">›</span>
                                                                </a>
                                                                <!-- Accessories Submenu -->
                                                                <div class="submenu">
                                                                    <ul class="py-2">
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                All Accessories
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Gas
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Pumps
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Tent Accessories
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Electric Hook Up Cables
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                                Lighting
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Storage
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
                                                                               Water Carries 
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50 text-gray-700">
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