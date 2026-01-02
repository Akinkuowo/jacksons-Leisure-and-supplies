<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('block');
        });
    }
    
    // Mobile menu dropdown functionality
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
    
    mobileMenuItems.forEach(item => {
        const toggle = item.querySelector('.mobile-menu-toggle');
        const submenu = item.querySelector('.mobile-submenu');
        
        if (toggle && submenu) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close other open menus
                mobileMenuItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherSubmenu = otherItem.querySelector('.mobile-submenu');
                        const otherToggle = otherItem.querySelector('.mobile-menu-toggle svg');
                        if (otherSubmenu && otherSubmenu.classList.contains('block')) {
                            otherSubmenu.classList.remove('block');
                            otherSubmenu.classList.add('hidden');
                            if (otherToggle) {
                                otherToggle.classList.remove('rotate-180');
                            }
                            otherItem.classList.remove('active');
                        }
                    }
                });
                
                // Toggle current menu
                const isHidden = submenu.classList.contains('hidden');
                const icon = toggle.querySelector('svg');
                
                if (isHidden) {
                    submenu.classList.remove('hidden');
                    submenu.classList.add('block');
                    if (icon) {
                        icon.classList.add('rotate-180');
                    }
                    item.classList.add('active');
                } else {
                    submenu.classList.remove('block');
                    submenu.classList.add('hidden');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                    item.classList.remove('active');
                }
            });
        }
        
        // Handle sub-submenu toggles
        const submenuItems = item.querySelectorAll('.mobile-submenu-item');
        submenuItems.forEach(subItem => {
            const subToggle = subItem.querySelector('.mobile-submenu-toggle');
            const subSubmenu = subItem.querySelector('.mobile-submenu-2');
            
            if (subToggle && subSubmenu) {
                subToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const isHidden = subSubmenu.classList.contains('hidden');
                    const icon = subToggle.querySelector('svg');
                    
                    if (isHidden) {
                        subSubmenu.classList.remove('hidden');
                        subSubmenu.classList.add('block');
                        if (icon) {
                            icon.classList.add('rotate-180');
                        }
                    } else {
                        subSubmenu.classList.remove('block');
                        subSubmenu.classList.add('hidden');
                        if (icon) {
                            icon.classList.remove('rotate-180');
                        }
                    }
                });
            }
        });
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!mobileMenu.classList.contains('hidden')) {
            const isClickInside = mobileMenu.contains(e.target) || 
                                 (mobileMenuToggle && mobileMenuToggle.contains(e.target));
            
            if (!isClickInside && mobileMenuToggle && mobileMenu) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('block');
                
                // Also close all submenus
                mobileMenuItems.forEach(item => {
                    const submenu = item.querySelector('.mobile-submenu');
                    const icon = item.querySelector('.mobile-menu-toggle svg');
                    if (submenu && submenu.classList.contains('block')) {
                        submenu.classList.remove('block');
                        submenu.classList.add('hidden');
                        if (icon) {
                            icon.classList.remove('rotate-180');
                        }
                        item.classList.remove('active');
                    }
                    
                    // Close sub-submenus
                    const subSubmenus = item.querySelectorAll('.mobile-submenu-2');
                    subSubmenus.forEach(subSubmenu => {
                        if (subSubmenu.classList.contains('block')) {
                            subSubmenu.classList.remove('block');
                            subSubmenu.classList.add('hidden');
                        }
                    });
                });
            }
        }
    });
});
</script>


<script>
        const track = document.getElementById('categoryTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const cards = document.querySelectorAll('.category-card');
        
        let currentPosition = 0;
        let itemsToShow = 4;
        
        function updateItemsToShow() {
            const width = window.innerWidth;
            if (width < 640) {
                itemsToShow = 1;
            } else if (width < 1024) {
                itemsToShow = 2;
            } else if (width < 1280) {
                itemsToShow = 3;
            } else {
                itemsToShow = 4;
            }
            updateSlider();
        }
        
        function updateSlider() {
            const cardWidth = cards[0].offsetWidth;
            const gap = 16;
            const moveAmount = (cardWidth + gap) * itemsToShow;
            
            track.style.transform = `translateX(-${currentPosition * moveAmount}px)`;
            
            prevBtn.classList.toggle('disabled', currentPosition === 0);
            
            const maxPosition = Math.ceil((cards.length - itemsToShow) / itemsToShow);
            nextBtn.classList.toggle('disabled', currentPosition >= maxPosition);
        }
        
        prevBtn.addEventListener('click', () => {
            if (currentPosition > 0) {
                currentPosition--;
                updateSlider();
            }
        });
        
        nextBtn.addEventListener('click', () => {
            const maxPosition = Math.ceil((cards.length - itemsToShow) / itemsToShow);
            if (currentPosition < maxPosition) {
                currentPosition++;
                updateSlider();
            }
        });
        
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevBtn.click();
            } else if (e.key === 'ArrowRight') {
                nextBtn.click();
            }
        });
        
        window.addEventListener('resize', () => {
            currentPosition = 0;
            updateItemsToShow();
        });
        
        updateItemsToShow();
        
        let touchStartX = 0;
        let touchEndX = 0;
        
        track.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        track.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextBtn.click();
            }
            if (touchEndX > touchStartX + 50) {
                prevBtn.click();
            }
        }
    </script>

<script>
    // Add click handlers to Add to Cart buttons
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Add your cart logic here
            this.textContent = 'Added!';
            this.style.background = '#16a34a';
            
            setTimeout(() => {
                this.textContent = 'Add to Cart';
                this.style.background = '#CC4514';
            }, 2000);
        });
    });
</script>

<script>
    // Optional: Add click handlers to brand logos
    document.querySelectorAll('.brand-logo').forEach(logo => {
        logo.addEventListener('click', function() {
            const brandName = this.querySelector('.brand-name').textContent.trim().replace(/\n/g, ' ');
            console.log('Brand clicked:', brandName);
            // Add your brand page navigation logic here
            // window.location.href = '/brands/' + brandName.toLowerCase().replace(/\s+/g, '-');
        });
    });
</script>

<script>
        // Form submission handling
        document.getElementById('newsletterForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const submitBtn = document.getElementById('subscribeBtn');
            const successMessage = document.getElementById('successMessage');
            const originalBtnText = submitBtn.innerHTML;
            
            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                consent: document.getElementById('consent').checked
            };
            
            // Simple validation
            if (!formData.consent) {
                alert('Please agree to our privacy policy to continue.');
                return;
            }
            
            // Show loading state
            submitBtn.innerHTML = `
                <span class="flex items-center justify-center space-x-3">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Subscribing...</span>
                </span>
            `;
            submitBtn.disabled = true;
            
            try {
                // Simulate API call with delay
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Here you would typically send the data to your backend
                // For example:
                // const response = await fetch('/api/newsletter/subscribe', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify(formData)
                // });
                
                // Simulate successful subscription
                console.log('Subscribing:', formData);
                
                // Show success message
                successMessage.classList.remove('hidden');
                successMessage.classList.add('fade-in');
                
                // Send welcome email (in a real app, this would be handled by your backend)
                simulateWelcomeEmail(formData.email, formData.name);
                
                // Reset form
                form.reset();
                
                // Scroll to success message
                successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Hide success message after 8 seconds
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 8000);
                
            } catch (error) {
                console.error('Subscription error:', error);
                alert('There was an error subscribing. Please try again.');
            } finally {
                // Reset button
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            }
        });
        
        // Simulate sending welcome email
        function simulateWelcomeEmail(email, name) {
            console.log(`Sending welcome email to: ${email}`);
            console.log(`Dear ${name}, welcome to Outwell! Check your inbox for your 10% discount code.`);
            
            // In a real implementation, this would be an API call to your email service
            // Example using a hypothetical email service:
            // fetch('/api/send-welcome-email', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ email, name })
            // });
        }
        
        // Form field animations on focus
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-orange-200', 'rounded-xl');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-orange-200', 'rounded-xl');
            });
        });
    </script>

<script>
        // Simple hover effects enhancement
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling to footer links
            const footerLinks = document.querySelectorAll('.footer-link');
            footerLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
            
            // Social media icon animations
            const socialIcons = document.querySelectorAll('.social-icon');
            socialIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.1)';
                });
                
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Newsletter form submission
            const newsletterForm = document.querySelector('form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const emailInput = this.querySelector('input[type="email"]');
                    if (emailInput.value) {
                        alert('Thank you for subscribing to our newsletter!');
                        emailInput.value = '';
                    }
                });
            }
            
            // Current year for copyright
            const yearSpan = document.querySelector('footer p:first-of-type');
            if (yearSpan) {
                yearSpan.innerHTML = yearSpan.innerHTML.replace('2024', new Date().getFullYear());
            }
        });
</script>


