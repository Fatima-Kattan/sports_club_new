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