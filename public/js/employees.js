
document.addEventListener('DOMContentLoaded', function() {
    // 1. البحث في الجدول
    const searchInput = document.querySelector('.search-input');
    const tableRows = document.querySelectorAll('.data-table tbody tr');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const shouldShow = rowText.includes(searchTerm);
                row.style.display = shouldShow ? '' : 'none';
            });
        });
    }
})

