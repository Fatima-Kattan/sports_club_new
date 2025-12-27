document.addEventListener('DOMContentLoaded', function() {
    // Get all filter buttons and coach cards
    const filterButtons = document.querySelectorAll('.filter-btn');
    const coachCards = document.querySelectorAll('.coach-card');
    
    // If there are no coaches, exit early
    if (coachCards.length === 0) return;
    
    // Add click event to each filter button
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const specialization = this.getAttribute('data-specialization');
            
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter coach cards
            filterCoachCards(specialization);
        });
    });
    
    // Function to filter coach cards
    function filterCoachCards(specialization) {
        coachCards.forEach(card => {
            // Get the specialization from the card's data attribute
            const cardSpecialization = card.getAttribute('data-specialization');
            
            // Show or hide card based on filter
            if (specialization === 'all' || cardSpecialization === specialization) {
                // Show card with animation
                card.style.display = 'block';
                
                // Add a slight delay for the animation
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 50);
            } else {
                // Hide card with animation
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                // Hide after animation completes
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }
    
    // Add hover effects to coach cards
    coachCards.forEach(card => {
        // Add mouseenter effect
        card.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) { // Only on desktop
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.15)';
            }
        });
        
        // Add mouseleave effect
        card.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) { // Only on desktop
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 8px 20px rgba(0, 0, 0, 0.1)';
            }
        });
    });
    
    // Add animation to stat cards on scroll
    const statCards = document.querySelectorAll('.stat-card');
    
    // Create an Intersection Observer for stat cards
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const statObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Initially set stat cards for animation
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        card.style.transitionDelay = `${index * 0.1}s`;
        
        // Observe each stat card
        statObserver.observe(card);
    });
    
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only handle anchor links within the same page
            if (href.startsWith('#') && href.length > 1) {
                e.preventDefault();
                
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});