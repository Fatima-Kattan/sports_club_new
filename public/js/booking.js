/* index js */
  // Real-time search functionality
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.booking-table tbody tr');

        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            let hasVisibleRows = false;

            tableRows.forEach(row => {
                if (row.querySelector('.empty-state')) return;

                const text = row.textContent.toLowerCase();
                if (searchTerm === '' || text.includes(searchTerm)) {
                    row.style.display = '';
                    hasVisibleRows = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show no results message if needed
            showNoResultsMessage(!hasVisibleRows && searchTerm !== '');
        }

        function showNoResultsMessage(show) {
            // Remove existing no results message
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) {
                existingMessage.remove();
            }

            if (show) {
                const firstRow = tableRows[0];
                if (firstRow && !firstRow.querySelector('.empty-state')) {
                    const noResultsRow = document.createElement('tr');
                    noResultsRow.className = 'no-results-message';
                    noResultsRow.innerHTML = `
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h3 class="empty-title">No Results Found</h3>
                                <p class="empty-description">No bookings match your search criteria</p>
                            </div>
                        </td>
                    `;

                    // Find the table body
                    const tbody = document.querySelector('.booking-table tbody');
                    // Clear existing rows except the no results message
                    tableRows.forEach(row => {
                        if (!row.classList.contains('no-results-message')) {
                            tbody.appendChild(row);
                        }
                    });
                    tbody.appendChild(noResultsRow);
                }
            }
        }

        // Add debounce for better performance
        let searchTimeout;
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 300);
            });

            // Clear search on Escape key
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    this.value = '';
                    performSearch();
                }
            });
        }

        // Auto-hide success toast
        const successToast = document.getElementById('successToast');
        if (successToast) {
            setTimeout(() => {
                successToast.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => successToast.remove(), 300);
            }, 5000);
        }

        // Add row click functionality (for view)
        tableRows.forEach(row => {
            if (!row.querySelector('.empty-state') && !row.classList.contains('no-results-message')) {
                row.addEventListener('click', function(e) {
                    // Don't trigger if clicking on buttons, links, or form elements
                    if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest(
                            'form') && e.target.tagName !== 'INPUT') {
                        const viewBtn = this.querySelector('.btn-view');
                        if (viewBtn) {
                            viewBtn.click();
                        }
                    }
                });

                // Add cursor pointer
                row.style.cursor = 'pointer';
            }
        });

        // Add loading animation for buttons
        document.querySelectorAll('.btn-primary, .btn-icon[type="submit"]').forEach(button => {
            button.addEventListener('click', function(e) {
                // Don't interfere with links
                if (this.tagName === 'A' || this.type === 'submit') {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    this.style.pointerEvents = 'none';

                    // Reset after 2 seconds (in case of error)
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                        this.style.pointerEvents = '';
                    }, 2000);
                }
            });
        });

        // Add focus effect to search input
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        }

        // Initialize search on page load
        document.addEventListener('DOMContentLoaded', function() {
            performSearch();
        });

        /////
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to all buttons
            const buttons = document.querySelectorAll('.btn-icon');

            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Form submission handling
            const deleteForms = document.querySelectorAll('form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Are you sure you want to delete this booking?')) {
                        e.preventDefault();
                    }
                });
            });
        });


        /* show js */
        // Delete confirmation
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this booking?\nThis action cannot be undone.')) {
                document.getElementById('deleteForm').submit();
            }
        }

        // Real-time clock update
        function updateCurrentTime() {
            const now = new Date();
            const bookingTime = new Date('{{ $booking->created_at }}');
            const timeDiff = now - bookingTime;
            const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));

            // Update time since booking
            const timeSinceElement = document.getElementById('timeSince');
            if (timeSinceElement) {
                if (daysDiff === 0) {
                    timeSinceElement.textContent = 'Today';
                } else if (daysDiff === 1) {
                    timeSinceElement.textContent = 'Yesterday';
                } else {
                    timeSinceElement.textContent = `${daysDiff} days ago`;
                }
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentTime();

            // Add hover effects to cards
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                    this.style.boxShadow = 'var(--shadow-lg)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });

            // Add click animation to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.classList.contains('btn-danger')) return;

                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });

