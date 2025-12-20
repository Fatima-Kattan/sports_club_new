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
        const searchInput = document.querySelector('.search-input');
        if (searchInput && searchInput.value) {
            searchInput.select();
        }
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
        
        // تحميل النموذج
        const loadingSpinner = document.getElementById('loadingSpinner');
        if (loadingSpinner) {
            activityForm.addEventListener('submit', function() {
                loadingSpinner.classList.add('active');
            });
        }
        
        // استعادة النموذج من التخزين المحلي
        const formInputs = activityForm.querySelectorAll('input, textarea, select');
        
        formInputs.forEach(input => {
            // حفظ عند التغيير
            input.addEventListener('input', function() {
                const formData = {};
                formInputs.forEach(inp => {
                    if (inp.type === 'radio' || inp.type === 'checkbox') {
                        if (inp.checked) {
                            formData[inp.name] = inp.value;
                        }
                    } else {
                        formData[inp.name] = inp.value;
                    }
                });
                localStorage.setItem('activityFormDraft', JSON.stringify(formData));
            });
            
            // استعادة عند التحميل
            const savedData = localStorage.getItem('activityFormDraft');
            if (savedData) {
                try {
                    const formData = JSON.parse(savedData);
                    if (input.type === 'radio') {
                        input.checked = (formData[input.name] === input.value);
                    } else if (input.type === 'checkbox') {
                        input.checked = formData[input.name] === 'true';
                    } else {
                        input.value = formData[input.name] || '';
                    }
                } catch (e) {
                    console.error('Error parsing saved form data:', e);
                }
            }
        });
        
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
