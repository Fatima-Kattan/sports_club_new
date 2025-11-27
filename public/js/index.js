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


/* ==================================================== */

document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const cards = document.querySelectorAll('.coach-card');
    const prevBtn = document.querySelector('.nav-btn.prev');
    const nextBtn = document.querySelector('.nav-btn.next');
    
    let currentPosition = 0;
    
    function updateCarousel() {
        track.style.transform = `translateX(${currentPosition}px)`;
    }
    
    nextBtn.addEventListener('click', function() {
        const cardWidth = cards[0].offsetWidth + 20; // 20 = gap
        const containerWidth = track.parentElement.offsetWidth;
        const maxPosition = -(cards.length * cardWidth - containerWidth);
        
        if (currentPosition > maxPosition) {
            currentPosition -= cardWidth;
            updateCarousel();
        } else {
            currentPosition = 0;
            updateCarousel();
        }
    });
    
    prevBtn.addEventListener('click', function() {
        const cardWidth = cards[0].offsetWidth + 20;
        const containerWidth = track.parentElement.offsetWidth;
        const maxPosition = -(cards.length * cardWidth - containerWidth);
        
        if (currentPosition < 0) {
            currentPosition += cardWidth;
            updateCarousel();
        } else {
            currentPosition = maxPosition;
            updateCarousel();
        }
    });
});