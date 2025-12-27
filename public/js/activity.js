document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded - Activity Management');
    
    const deleteBtns = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteMessage = document.getElementById('deleteMessage');
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    const cancelDeleteBtn = document.getElementById('cancelDelete');
    
    if (deleteBtns.length > 0 && deleteModal) {
        console.log('Delete modal functionality initialized');
        let currentActivityId = null;
        let currentActivityName = null;
        
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                currentActivityId = this.dataset.id;
                currentActivityName = this.dataset.name;
                
                deleteMessage.innerHTML = `
                    Are you sure you want to permanently delete <strong>"${currentActivityName}"</strong>? 
                    This action cannot be undone and all associated data will be lost.
                `;
                
                deleteModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });
        
        confirmDeleteBtn.addEventListener('click', function() {
            if (currentActivityId) {
                deleteForm.action = `/activities/${currentActivityId}`;
                deleteForm.submit();
            }
        });
        
        cancelDeleteBtn.addEventListener('click', function() {
            deleteModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            currentActivityId = null;
            currentActivityName = null;
        });
        
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                deleteModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                currentActivityId = null;
                currentActivityName = null;
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && deleteModal.classList.contains('active')) {
                deleteModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                currentActivityId = null;
                currentActivityName = null;
            }
        });
        
        const cards = document.querySelectorAll('.activity-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    }
    
    const activityForm = document.getElementById('activityForm');
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const fileUpload = document.querySelector('.file-upload');
    
    if (activityForm) {
        console.log('Activity form functionality initialized');
        
        if (descriptionTextarea && charCount) {
            descriptionTextarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                
                if (this.value.length > 500) {
                    this.value = this.value.substring(0, 500);
                    charCount.textContent = 500;
                }
            });
            
            charCount.textContent = descriptionTextarea.value.length;
        }
        
        const resetBtn = activityForm.querySelector('button[type="reset"]');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                localStorage.removeItem('activityFormDraft');
                if (imagePreview) {
                    imagePreview.style.display = 'none';
                }
                if (descriptionTextarea && charCount) {
                    charCount.textContent = 0;
                }
            });
        }
        
        if (imageInput && previewImage && imagePreview) {
            console.log('Image preview functionality initialized');
            
            imageInput.addEventListener('change', function(e) {
                console.log('Image input changed');
                const file = e.target.files[0];
                
                if (file) {
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid image file (JPG, PNG, or WebP).');
                        this.value = '';
                        return;
                    }
                    
                    const maxSize = 2 * 1024 * 1024;
                    if (file.size > maxSize) {
                        alert('Image size should not exceed 2MB.');
                        this.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        console.log('FileReader loaded');
                        previewImage.src = e.target.result;
                        imagePreview.style.display = 'block';
                        
                        imagePreview.style.opacity = '0';
                        setTimeout(() => {
                            imagePreview.style.opacity = '1';
                            imagePreview.style.transition = 'opacity 0.3s ease';
                        }, 10);
                    };
                    
                    reader.onerror = function(e) {
                        console.error('Error reading file:', e);
                        alert('Error reading image file. Please try another image.');
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
            
            const removeImageBtn = document.querySelector('.remove-image');
            if (removeImageBtn) {
                removeImageBtn.addEventListener('click', function() {
                    console.log('Remove image clicked');
                    imageInput.value = '';
                    imagePreview.style.display = 'none';
                    previewImage.src = '';
                });
            }
        }
        
        if (fileUpload) {
            console.log('Drag and drop functionality initialized');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUpload.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                fileUpload.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                fileUpload.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight(e) {
                fileUpload.classList.add('drag-over');
            }
            
            function unhighlight(e) {
                fileUpload.classList.remove('drag-over');
            }
            
            fileUpload.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                console.log('Files dropped:', files.length);
                
                if (files.length > 0 && imageInput) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(files[0]);
                    imageInput.files = dataTransfer.files;
                    
                    const event = new Event('change');
                    imageInput.dispatchEvent(event);
                }
            }
            
            fileUpload.addEventListener('click', function(e) {
                if (imageInput && e.target !== imageInput) {
                    imageInput.click();
                }
            });
        }
        
        activityForm.addEventListener('submit', function(e) {
            console.log('Form submit validation');
            
            if (imageInput && imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                const maxSize = 2 * 1024 * 1024;
                
                console.log('Validating file:', file.type, file.size);
                
                if (!validTypes.includes(file.type)) {
                    e.preventDefault();
                    alert('Please upload a valid image file (JPG, PNG, or WebP).');
                    imageInput.focus();
                    return false;
                }
                
                if (file.size > maxSize) {
                    e.preventDefault();
                    alert('Image size should not exceed 2MB.');
                    imageInput.focus();
                    return false;
                }
            }
            
            return true;
        });
        
        const progressSteps = document.querySelectorAll('.progress-step');
        const formGroups = document.querySelectorAll('.form-group');
        
        if (progressSteps.length > 0 && formGroups.length > 0) {
            formGroups.forEach((group, index) => {
                const inputs = group.querySelectorAll('input, textarea, select');
                
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        const stepIndex = Math.floor(index / (formGroups.length / 3));
                        progressSteps.forEach((step, i) => {
                            if (i <= stepIndex) {
                                step.classList.add('active');
                                step.classList.add('completed');
                            } else {
                                step.classList.remove('active');
                                step.classList.remove('completed');
                            }
                        });
                    });
                });
            });
        }
    }
    
    console.log('All activity functions initialized successfully');
});

const searchInput = document.querySelector('.search-input');

if (searchInput) {
    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();
        if (query) {
            console.log("جاري البحث عن:", query);
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('🔍 بدء البحث الفوري...');

    const searchInput = document.getElementById('searchInput');
    const activitiesContainer = document.getElementById('activitiesContainer');
    const liveSearchMessage = document.getElementById('liveSearchMessage');

    if (searchInput && activitiesContainer) {
        console.log('✅ تم العثور على جميع العناصر');

        const activityCards = activitiesContainer.querySelectorAll('.activity-card');
        console.log(`📊 عدد الأنشطة: ${activityCards.length}`);

        let searchTimer;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);

            searchTimer = setTimeout(() => {
                const searchTerm = this.value.trim().toLowerCase();
                console.log(`🔍 جاري البحث عن: "${searchTerm}"`);

                if (searchTerm.length === 0) {
                    showAllActivities();
                    hideNoResultsMessage();
                    return;
                }

                performSearch(searchTerm);

            }, 300);
        });

        function performSearch(searchTerm) {
            let foundCount = 0;

            activityCards.forEach(card => {
                const cardName = card.dataset.name || '';
                const cardDesc = card.dataset.description || '';
                const cardLevel = card.dataset.level || '';
                const cardFacility = card.dataset.facility || '';

                const visibleName = card.querySelector('.activity-name')?.textContent
                .toLowerCase() || '';
                const visibleDesc = card.querySelector('.activity-description')?.textContent
                    .toLowerCase() || '';

                const isMatch = cardName.includes(searchTerm) ||
                    cardDesc.includes(searchTerm) ||
                    cardLevel.includes(searchTerm) ||
                    cardFacility.includes(searchTerm) ||
                    visibleName.includes(searchTerm) ||
                    visibleDesc.includes(searchTerm);

                if (isMatch) {
                    card.style.display = 'block';
                    foundCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            updateSearchResults(foundCount, searchTerm);
        }

        function showAllActivities() {
            activityCards.forEach(card => {
                card.style.display = 'block';
            });
            console.log('🔄 عرض جميع الأنشطة');
        }

        function updateSearchResults(foundCount, searchTerm) {
            console.log(`📊 النتائج: ${foundCount} نشاط`);

            if (foundCount === 0) {
                activityCards.forEach(card => {
                    card.style.display = 'none';
                });

                showNoResultsMessage(searchTerm);
            } else {
                hideNoResultsMessage();
            }
        }

        function showNoResultsMessage(searchTerm) {
            const paginationContainer = document.getElementById('paginationContainer');
            if (paginationContainer) {
                paginationContainer.style.display = 'none';
            }

            liveSearchMessage.style.display = 'block';
            liveSearchMessage.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2 class="empty-title">No Results Found</h2>
                    <p class="empty-description">
                        We couldn't find any activities matching "<strong>${searchTerm}</strong>". 
                        Try a different search term.
                    </p>
                    <div class="buttons-container" style="justify-content: center; margin-top: 20px;">
                        <button class="btn btn-primary" id="clearLiveSearchBtn">
                            <i class="fas fa-times"></i>
                            Clear Search
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('clearLiveSearchBtn').addEventListener('click', function() {
                searchInput.value = '';
                showAllActivities();
                hideNoResultsMessage();
                searchInput.focus();

                if (paginationContainer) {
                    paginationContainer.style.display = 'flex';
                }
            });

            console.log(`❌ لم يتم العثور على نتائج لـ "${searchTerm}"`);
        }

        function hideNoResultsMessage() {
            liveSearchMessage.style.display = 'none';
            liveSearchMessage.innerHTML = '';

            const paginationContainer = document.getElementById('paginationContainer');
            if (paginationContainer) {
                paginationContainer.style.display = 'flex';
            }
        }

        const initialSearchValue = searchInput.value.trim();
        if (initialSearchValue) {
            console.log(`📝 يوجد بحث مسبق: "${initialSearchValue}"`);
            performSearch(initialSearchValue.toLowerCase());
        }

    } else {
        console.error('❌ لم يتم العثور على العناصر المطلوبة');
        if (!searchInput) console.error('❌ حقل البحث غير موجود');
        if (!activitiesContainer) console.error('❌ حاوية الأنشطة غير موجودة');
    }

    const deleteButtons = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const deleteMessage = document.getElementById('deleteMessage');
    const deleteForm = document.getElementById('deleteForm');
    const confirmDelete = document.getElementById('confirmDelete');
    const cancelDelete = document.getElementById('cancelDelete');

    if (deleteButtons.length > 0) {
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const activityId = this.getAttribute('data-id');
                const activityName = this.getAttribute('data-name');

                deleteMessage.textContent =
                    `Are you sure you want to delete "${activityName}"? This action cannot be undone.`;
                deleteForm.action = `/activities/${activityId}`;

                deleteModal.style.display = 'flex';
            });
        });
    }

    if (confirmDelete && cancelDelete) {
        confirmDelete.addEventListener('click', function() {
            deleteForm.submit();
        });

        cancelDelete.addEventListener('click', function() {
            deleteModal.style.display = 'none';
        });

        deleteModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    }

    const style = document.createElement('style');
    style.textContent = `
        #liveSearchMessage .empty-state {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});

document.addEventListener('DOMContentLoaded', function() {
    initializeCards();
});

function initializeCards() {
    const cards = document.querySelectorAll('.dark-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
}

function decreaseQuantity(button) {
    event.preventDefault();
    
    const card = button.closest('.mini-item-card');
    const qtyElement = card.querySelector('.mini-qty-number');
    const hiddenInput = card.querySelector('input[name="quantity"]');
    const form = card.querySelector('.update-form');
    
    if (!qtyElement || !hiddenInput || !form) {
        console.error('Missing required elements');
        return;
    }
    
    let currentQty = parseInt(qtyElement.textContent);
    
    if (currentQty <= 1) {
        showAlert('Minimum quantity is 1', 'warning');
        return;
    }
    
    currentQty--;
    
    qtyElement.textContent = currentQty;
    
    hiddenInput.value = currentQty;
    
    showQuantityEffect(qtyElement, 'decrease');
    showButtonEffect(button);
    
    console.log(`Quantity decreased to: ${currentQty}`);
}

function increaseQuantity(button) {
    event.preventDefault();
    
    const card = button.closest('.mini-item-card');
    const qtyElement = card.querySelector('.mini-qty-number');
    const hiddenInput = card.querySelector('input[name="quantity"]');
    const form = card.querySelector('.update-form');
    
    if (!qtyElement || !hiddenInput || !form) return;
    
    let currentQty = parseInt(qtyElement.textContent);
    currentQty++;
    
    qtyElement.textContent = currentQty;
    hiddenInput.value = currentQty;
    
    showQuantityEffect(qtyElement, 'increase');
    showButtonEffect(button);
    
    console.log(`Quantity increased to: ${currentQty}`);
}

function submitUpdateForm(form) {
    event.preventDefault();
    
    const hiddenInput = form.querySelector('input[name="quantity"]');
    if (!hiddenInput) {
        console.error('No quantity input found');
        return false;
    }
    
    const quantity = parseInt(hiddenInput.value);
    if (isNaN(quantity) || quantity < 1) {
        showAlert('Please enter a valid quantity (minimum 1)', 'error');
        return false;
    }
    
    const submitButton = form.querySelector('button[type="submit"]');
    showLoadingEffect(submitButton, 'fas fa-paper-plane');
    
    setTimeout(() => {
        form.submit();
    }, 500);
    
    return false;
}

function confirmDelete(form) {
    event.preventDefault();
    
    const card = form.closest('.mini-item-card');
    const itemName = card.querySelector('.mini-item-name')?.textContent;
    
    if (!itemName) {
        console.error('Item name not found');
        return false;
    }
    
    if (!confirm(`Are you sure you want to delete "${itemName}"?`)) {
        return false;
    }
    
    const submitButton = form.querySelector('button[type="submit"]');
    showLoadingEffect(submitButton, 'fas fa-trash');
    
    return true;
}

function showQuantityEffect(element, type) {
    element.style.color = type === 'decrease' ? '#e74c3c' : '#2ecc71';
    
    element.style.transform = 'scale(1.2)';
    element.style.transition = 'all 0.3s ease';
    
    setTimeout(() => {
        element.style.color = '';
        element.style.transform = '';
    }, 300);
    
    showQuantityChange(element, type === 'decrease' ? -1 : 1);
}

function showButtonEffect(button) {
    button.style.transform = 'scale(0.9)';
    button.style.transition = 'transform 0.2s ease';
    
    setTimeout(() => {
        button.style.transform = '';
    }, 200);
}

function showQuantityChange(element, change) {
    const changeElement = document.createElement('span');
    changeElement.className = 'quantity-change-indicator';
    changeElement.textContent = change > 0 ? `+${change}` : change;
    changeElement.style.cssText = `
        position: absolute;
        font-size: 0.8rem;
        font-weight: bold;
        color: ${change > 0 ? '#2ecc71' : '#e74c3c'};
        opacity: 0;
        transform: translateY(0);
        animation: floatUp 1s ease forwards;
        pointer-events: none;
        z-index: 10;
    `;
    
    element.parentElement.style.position = 'relative';
    element.parentElement.appendChild(changeElement);
    
    setTimeout(() => {
        changeElement.remove();
    }, 1000);
}

function showLoadingEffect(button, originalIconClass) {
    const originalHTML = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    button.disabled = true;
    
    button.dataset.originalIcon = originalHTML;
    
    setTimeout(() => {
        if (button.disabled) {
            button.innerHTML = originalHTML;
            button.disabled = false;
            showAlert('Request timed out. Please try again.', 'error');
        }
    }, 5000);
}

function showAlert(message, type = 'info') {
    const alertTypes = {
        'success': { icon: 'fa-check-circle', color: '#2ecc71' },
        'error': { icon: 'fa-exclamation-circle', color: '#e74c3c' },
        'warning': { icon: 'fa-exclamation-triangle', color: '#f39c12' },
        'info': { icon: 'fa-info-circle', color: '#3498db' }
    };
    
    const alertType = alertTypes[type] || alertTypes.info;
    
    const alert = document.createElement('div');
    alert.className = 'custom-alert';
    alert.innerHTML = `
        <i class="fas ${alertType.icon}"></i>
        <span>${message}</span>
        <button class="alert-close">&times;</button>
    `;
    
    alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #2d3748;
        border-left: 4px solid ${alertType.color};
        color: white;
        padding: 12px 16px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        z-index: 10000;
        animation: slideInRight 0.3s ease;
    `;
    
    document.body.appendChild(alert);
    
    const closeBtn = alert.querySelector('.alert-close');
    closeBtn.addEventListener('click', () => {
        alert.remove();
    });
    
    setTimeout(() => {
        if (alert.parentNode) {
            alert.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }
    }, 5000);
}

window.addEventListener('beforeunload', function(e) {
    const hasUnsavedChanges = checkForUnsavedChanges();
    
    if (hasUnsavedChanges) {
        e.preventDefault();
        e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
    }
});

function checkForUnsavedChanges() {
    let hasChanges = false;
    
    document.querySelectorAll('.mini-item-card').forEach(card => {
        const qtyElement = card.querySelector('.mini-qty-number');
        const hiddenInput = card.querySelector('input[name="quantity"]');
        
        if (qtyElement && hiddenInput) {
            const displayQty = parseInt(qtyElement.textContent);
            const hiddenQty = parseInt(hiddenInput.value);
            
            if (displayQty !== hiddenQty) {
                hasChanges = true;
            }
        }
    });
    
    return hasChanges;
}

const customStyles = `
@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

@keyframes floatUp {
    0% {
        opacity: 0;
        transform: translateY(0);
    }
    20% {
        opacity: 1;
        transform: translateY(-10px);
    }
    100% {
        opacity: 0;
        transform: translateY(-20px);
    }
}

.custom-alert {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 10000;
}

.alert-close {
    background: none;
    border: none;
    color: rgba(255, 255, 255, 0.5);
    font-size: 1.2rem;
    cursor: pointer;
    margin-left: 10px;
    transition: color 0.2s;
}

.alert-close:hover {
    color: white;
}

.quantity-change-indicator {
    position: absolute;
    pointer-events: none;
    z-index: 10;
}

.mini-btn:active {
    transform: scale(0.95) !important;
}
`;

if (!document.querySelector('#custom-styles')) {
    const styleElement = document.createElement('style');
    styleElement.id = 'custom-styles';
    styleElement.textContent = customStyles;
    document.head.appendChild(styleElement);
}

function confirmDelete() {
    const activityName = document.querySelector('.title-gradient')?.textContent;
    
    if (!confirm(`Are you sure you want to delete "${activityName}"? This action cannot be undone.`)) {
        return false;
    }
    
    document.getElementById('deleteForm').submit();
    return false;
}