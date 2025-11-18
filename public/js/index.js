const searchIcon = document.getElementById('searchIcon');
const searchOverlay = document.getElementById('searchOverlay');
const searchClose = document.getElementById('searchClose');
const searchInput = document.getElementById('searchInput');

// Open the search window
searchIcon.addEventListener('click', function () {
    searchOverlay.classList.add('active');
    document.body.classList.add('search-active');
    searchInput.focus();
});

// Close search window
searchClose.addEventListener('click', function () {
    searchOverlay.classList.remove('active');
    document.body.classList.remove('search-active');
});

// Closes when ESC is pressed
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        searchOverlay.classList.remove('active');
        document.body.classList.remove('search-active');
    }
});

// Close when pressed outside the search box
searchOverlay.addEventListener('click', function (e) {
    if (e.target === searchOverlay) {
        searchOverlay.classList.remove('active');
        document.body.classList.remove('search-active');
    }
});

// Sports Filtering Functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const sportCards = document.querySelectorAll('.sport-card');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            
            // Filter sport cards
            sportCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});