document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded - Activity Management');
    
    // ========== وظائف صفحة index (إدارة الأنشطة) ==========
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
        
        // زر الحذف
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
        
        // تأكيد الحذف
        confirmDeleteBtn.addEventListener('click', function() {
            if (currentActivityId) {
                deleteForm.action = `/activities/${currentActivityId}`;
                deleteForm.submit();
            }
        });
        
        // إلغاء الحذف
        cancelDeleteBtn.addEventListener('click', function() {
            deleteModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            currentActivityId = null;
            currentActivityName = null;
        });
        
        // إغلاق النافذة بالنقر خارجها
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                deleteModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                currentActivityId = null;
                currentActivityName = null;
            }
        });
        
        // إغلاق النافذة بمفتاح ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && deleteModal.classList.contains('active')) {
                deleteModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                currentActivityId = null;
                currentActivityName = null;
            }
        });
        
        // تأثيرات Hover للبطاقات
        const cards = document.querySelectorAll('.activity-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
        
        // تركيز البحث
        /* const searchInput = document.querySelector('.search-input');
        if (searchInput && searchInput.value) {
            searchInput.select();
        } */
        
    }
    
    // ========== وظائف صفحة create/edit (النموذج) ==========
    const activityForm = document.getElementById('activityForm');
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const fileUpload = document.querySelector('.file-upload');
    
    if (activityForm) {
        console.log('Activity form functionality initialized');
        
        // عداد الأحرف للوصف
        if (descriptionTextarea && charCount) {
            descriptionTextarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                
                if (this.value.length > 500) {
                    this.value = this.value.substring(0, 500);
                    charCount.textContent = 500;
                }
            });
            
            // تحديث العداد عند التحميل
            charCount.textContent = descriptionTextarea.value.length;
        }
        
        
        // زر المسح
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
        
        // معاينة الصورة - الطريقة الصحيحة
        if (imageInput && previewImage && imagePreview) {
            console.log('Image preview functionality initialized');
            
            // استمع لتغيير ملف الصورة
            imageInput.addEventListener('change', function(e) {
                console.log('Image input changed');
                const file = e.target.files[0];
                
                if (file) {
                    // التحقق من نوع الملف
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid image file (JPG, PNG, or WebP).');
                        this.value = '';
                        return;
                    }
                    
                    // التحقق من حجم الملف (2MB)
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
                        
                        // إضافة تأثير ظهور تدريجي
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
            
            // زر إزالة الصورة
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
        
        // سحب وإفلات الصورة
        if (fileUpload) {
            console.log('Drag and drop functionality initialized');
            
            // منع السلوك الافتراضي للسحب
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUpload.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            // إضافة تأثيرات للسحب
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
            
            // التعامل مع إسقاط الملف
            fileUpload.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                console.log('Files dropped:', files.length);
                
                if (files.length > 0 && imageInput) {
                    // استخدام DataTransfer لتعيين الملفات
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(files[0]);
                    imageInput.files = dataTransfer.files;
                    
                    // تشغيل معاينة الصورة
                    const event = new Event('change');
                    imageInput.dispatchEvent(event);
                }
            }
            
            // عند النقر على منطقة الرفع
            fileUpload.addEventListener('click', function(e) {
                if (imageInput && e.target !== imageInput) {
                    imageInput.click();
                }
            });
        }
        
        // التحقق من صحة الصورة قبل التقديم
        activityForm.addEventListener('submit', function(e) {
            console.log('Form submit validation');
            
            if (imageInput && imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                const maxSize = 2 * 1024 * 1024; // 2MB
                
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
        
        // تأثيرات التقدم
        const progressSteps = document.querySelectorAll('.progress-step');
        const formGroups = document.querySelectorAll('.form-group');
        
        if (progressSteps.length > 0 && formGroups.length > 0) {
            formGroups.forEach((group, index) => {
                const inputs = group.querySelectorAll('input, textarea, select');
                
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        // تحديث خطوة التقدم بناءً على المجموعة
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
    // استدعاء البحث مباشرة عند الكتابة
    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();
        if (query) {
            // هون بتحط منطق البحث أو استدعاء API
            console.log("جاري البحث عن:", query);

            // مثال: إذا عندك فورم Laravel ممكن تعمل submit تلقائي
            // searchInput.form.submit();
        }
    });
}

///////
        // بحث فوري مع عرض رسالة "No results found"
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🔍 بدء البحث الفوري...');

            const searchInput = document.getElementById('searchInput');
            const activitiesContainer = document.getElementById('activitiesContainer');
            const liveSearchMessage = document.getElementById('liveSearchMessage');

            if (searchInput && activitiesContainer) {
                console.log('✅ تم العثور على جميع العناصر');

                // البحث عن جميع بطاقات الأنشطة
                const activityCards = activitiesContainer.querySelectorAll('.activity-card');
                console.log(`📊 عدد الأنشطة: ${activityCards.length}`);

                // إضافة مؤقت للبحث الفوري (Debounce)
                let searchTimer;

                // حدث البحث عند الكتابة
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimer);

                    searchTimer = setTimeout(() => {
                        const searchTerm = this.value.trim().toLowerCase();
                        console.log(`🔍 جاري البحث عن: "${searchTerm}"`);

                        // إذا كان البحث فارغاً، عرض كل الأنشطة وإخفاء الرسالة
                        if (searchTerm.length === 0) {
                            showAllActivities();
                            hideNoResultsMessage();
                            return;
                        }

                        // إجراء البحث
                        performSearch(searchTerm);

                    }, 300); // تأخير 300ms لتحسين الأداء
                });

                // دالة البحث
                function performSearch(searchTerm) {
                    let foundCount = 0;

                    // البحث في كل بطاقة نشاط
                    activityCards.forEach(card => {
                        // البحث في البيانات المخزنة في data attributes
                        const cardName = card.dataset.name || '';
                        const cardDesc = card.dataset.description || '';
                        const cardLevel = card.dataset.level || '';
                        const cardFacility = card.dataset.facility || '';

                        // البحث في النص الظاهر أيضاً
                        const visibleName = card.querySelector('.activity-name')?.textContent
                        .toLowerCase() || '';
                        const visibleDesc = card.querySelector('.activity-description')?.textContent
                            .toLowerCase() || '';

                        // التحقق من التطابق
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

                    // تحديث عرض النتائج
                    updateSearchResults(foundCount, searchTerm);
                }

                // عرض جميع الأنشطة
                function showAllActivities() {
                    activityCards.forEach(card => {
                        card.style.display = 'block';
                    });
                    console.log('🔄 عرض جميع الأنشطة');
                }

                // تحديث نتائج البحث
                function updateSearchResults(foundCount, searchTerm) {
                    console.log(`📊 النتائج: ${foundCount} نشاط`);

                    if (foundCount === 0) {
                        // إخفاء كل الأنشطة
                        activityCards.forEach(card => {
                            card.style.display = 'none';
                        });

                        // عرض رسالة "No results found"
                        showNoResultsMessage(searchTerm);
                    } else {
                        // إخفاء رسالة "No results found"
                        hideNoResultsMessage();
                    }
                }

                // عرض رسالة "No results found"
                function showNoResultsMessage(searchTerm) {
                    // إخفاء التصفح (pagination) أثناء البحث
                    const paginationContainer = document.getElementById('paginationContainer');
                    if (paginationContainer) {
                        paginationContainer.style.display = 'none';
                    }

                    // إنشاء وتحديث رسالة "No results found"
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

                    // إضافة حدث لزر "Clear Search"
                    document.getElementById('clearLiveSearchBtn').addEventListener('click', function() {
                        searchInput.value = '';
                        showAllActivities();
                        hideNoResultsMessage();
                        searchInput.focus();

                        // إعادة إظهار التصفح
                        if (paginationContainer) {
                            paginationContainer.style.display = 'flex';
                        }
                    });

                    console.log(`❌ لم يتم العثور على نتائج لـ "${searchTerm}"`);
                }

                // إخفاء رسالة "No results found"
                function hideNoResultsMessage() {
                    liveSearchMessage.style.display = 'none';
                    liveSearchMessage.innerHTML = '';

                    // إعادة إظهار التصفح
                    const paginationContainer = document.getElementById('paginationContainer');
                    if (paginationContainer) {
                        paginationContainer.style.display = 'flex';
                    }
                }

                // إذا كان هناك بحث مسبق من Laravel، قم بتنفيذه
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

            // إضافة منطق حذف النشاط
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

            // إضافة أنماط CSS للرسالة
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