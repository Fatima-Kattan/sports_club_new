// Profile Page JavaScript 
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Profile page loaded - Complete Version');
    
    let fileDialogBlocked = false;
    
    
    function setupPasswordToggles() {
        const toggleButtons = document.querySelectorAll('.password-toggle');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (passwordInput && icon) {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.replace('fa-eye-slash', 'fa-eye');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.replace('fa-eye', 'fa-eye-slash');
                    }
                }
            });
        });
    }
    
    
    function setupNavigation() {
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const profileCard = document.getElementById('profileCard');
        const editForm = document.getElementById('editForm');
        const passwordCard = document.getElementById('passwordCard');
        const deleteCard = document.getElementById('deleteCard');
        
        if (sidebarLinks.length === 0) return;
        
        function hideAllSections() {
            if (profileCard) profileCard.style.display = 'none';
            if (editForm) editForm.style.display = 'none';
            if (passwordCard) passwordCard.style.display = 'none';
            if (deleteCard) deleteCard.style.display = 'none';
        }
        
        
        function updateActiveLink(section) {
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === section) {
                    link.classList.add('active');
                }
            });
        }
        
        
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.getAttribute('data-section');
                
                hideAllSections();
                updateActiveLink(section);
                
                switch(section) {
                    case 'profile':
                        if (profileCard) {
                            profileCard.style.display = 'block';
                            profileCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                        break;
                    case 'password':
                        if (passwordCard) {
                            passwordCard.style.display = 'block';
                            passwordCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                        break;
                    case 'delete':
                        if (deleteCard) {
                            deleteCard.style.display = 'block';
                            deleteCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                        break;
                }
                
                
                history.pushState(null, '', '#' + section);
            });
        });
        
        
        if (window.location.hash) {
            const hash = window.location.hash.substring(1);
            const targetLink = document.querySelector(`.sidebar-link[data-section="${hash}"]`);
            if (targetLink) {
                setTimeout(() => targetLink.click(), 100);
            }
        }
    }
    
    
    function setupFileUpload() {
        
        const fileInputs = document.querySelectorAll('input[type="file"][name="image"]');
        console.log('📁 Found file inputs:', fileInputs.length);
        
        if (fileInputs.length === 0) return;
        
        // خذ أول input فقط
        const fileInput = fileInputs[0];
        const uploadArea = document.querySelector('.file-upload-area');
        
        console.log('✅ Using file input:', fileInput.id || 'no id');
        
        
        function resetFileInput() {
            
            const newInput = fileInput.cloneNode(true);
            if (fileInput.parentNode) {
                fileInput.parentNode.replaceChild(newInput, fileInput);
            }
            
            console.log('🔄 File input reset');
            
            
            setupFileInputEvents(newInput);
            return newInput;
        }
        
        function setupFileInputEvents(inputElement) {
            
            inputElement.addEventListener('change', function(e) {
                console.log('📁 File selected:', this.files[0]?.name);
                
                if (fileDialogBlocked) {
                    console.log('🚫 Dialog blocked (already open)');
                    return;
                }
                
                const file = e.target.files[0];
                if (!file) return;
                
                
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    return;
                }
                
                
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, GIF, WEBP)');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('🖼️ Preview loaded');
                    
                    
                    document.querySelectorAll('.current-image img, .avatar-container img, .user-profile-image').forEach(img => {
                        img.src = e.target.result;
                    });
                    
                    
                    setTimeout(() => {
                        openEditFormAfterImageSelect();
                    }, 500);
                };
                reader.readAsDataURL(file);
            });
            
            
            inputElement.addEventListener('click', function(e) {
                if (fileDialogBlocked) {
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    return false;
                }
                
                fileDialogBlocked = true;
                console.log('📁 File dialog opening...');
                
                
                setTimeout(() => {
                    fileDialogBlocked = false;
                    console.log('📁 File dialog ready again');
                }, 1000);
            });
        }
        
        
        setupFileInputEvents(fileInput);
        
        
        if (uploadArea) {
            uploadArea.addEventListener('click', function() {
                console.log('📁 Upload area clicked');
                
                if (!fileDialogBlocked) {
                    fileInput.click();
                }
            });
        }
        
        
        const changeAvatarBtn = document.querySelector('.change-avatar-btn');
        if (changeAvatarBtn) {
            changeAvatarBtn.addEventListener('click', function() {
                console.log('📷 Change avatar button clicked');
                
                if (!fileDialogBlocked) {
                    fileInput.click();
                }
            });
        }
    }
    
    
    function setupDeleteConfirmation() {
        const deleteForm = document.getElementById('deleteAccountForm');
        if (!deleteForm) return;
        
        const deleteBtn = document.getElementById('deleteBtn');
        const cancelBtn = document.querySelector('.cancel-delete-btn');
        
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function(e) {
                if (!confirm('⚠️ WARNING: This action is permanent!\n\nAre you absolutely sure you want to delete your account?')) {
                    e.preventDefault();
                }
            });
        }
        
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const profileLink = document.querySelector('.sidebar-link[data-section="profile"]');
                if (profileLink) {
                    profileLink.click();
                }
            });
        }
    }
    
    
    function cleanDuplicateFileInputs() {
        console.log('🧹 Cleaning duplicate file inputs...');
        
        const allFileInputs = document.querySelectorAll('input[type="file"][name="image"]');
        
        if (allFileInputs.length > 1) {
            console.log(`⚠️ Found ${allFileInputs.length} image inputs, keeping first only`);
            
            
            for (let i = 1; i < allFileInputs.length; i++) {
                if (allFileInputs[i].parentNode) {
                    allFileInputs[i].remove();
                    console.log(`🗑️ Removed duplicate input ${i + 1}`);
                }
            }
        }
    }
    
    
    function setupViewEditToggle() {
        const editProfileBtn = document.getElementById('editProfileBtn');
        const cancelEditBtn = document.getElementById('cancelEditBtn');
        const toggleEditBtn = document.getElementById('toggleEditMode');
        
        const profileCard = document.getElementById('profileCard');
        const editForm = document.getElementById('editForm');
        
        if (!profileCard || !editForm) return;
        
        
        function switchToEditMode() {
            if (profileCard) profileCard.style.display = 'none';
            if (editForm) editForm.style.display = 'block';
            
            
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === 'profile') {
                    link.classList.add('active');
                }
            });
            
            
            setTimeout(() => {
                editForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
            
            console.log('📝 Switched to edit mode');
        }
        
        
        function switchToViewMode() {
            if (profileCard) profileCard.style.display = 'block';
            if (editForm) editForm.style.display = 'none';
            
            
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === 'profile') {
                    link.classList.add('active');
                }
            });
            
            
            setTimeout(() => {
                profileCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
            
            console.log('👁️ Switched to view mode');
        }
        
        
        if (editProfileBtn) {
            editProfileBtn.addEventListener('click', function(e) {
                e.preventDefault();
                switchToEditMode();
            });
        }
        
        if (cancelEditBtn) {
            cancelEditBtn.addEventListener('click', function(e) {
                e.preventDefault();
                switchToViewMode();
            });
        }
        
        if (toggleEditBtn) {
            toggleEditBtn.addEventListener('click', function(e) {
                e.preventDefault();
                switchToEditMode();
            });
        }
        
        
        window.switchToEditMode = switchToEditMode;
        window.switchToViewMode = switchToViewMode;
    }
    
    
    function setupFormSubmission() {
        const profileForm = document.querySelector('#profile-info form');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                
                
                
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                    submitBtn.disabled = true;
                    
                    
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        
                        showToast('Profile updated successfully!', 'success');
                        
                        
                        setTimeout(() => {
                            const cancelBtn = document.getElementById('cancelEditBtn');
                            if (cancelBtn) cancelBtn.click();
                        }, 1500);
                    }, 1000);
                }
            });
        }
        
        
        setTimeout(() => {
            const successMessages = document.querySelectorAll('.success-message');
            successMessages.forEach(msg => {
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 300);
            });
        }, 5000);
    }
    
    
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        document.body.appendChild(toast);
        
        
        if (!document.querySelector('#toast-styles')) {
            const style = document.createElement('style');
            style.id = 'toast-styles';
            style.textContent = `
                .toast {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #1e293b;
                    color: white;
                    padding: 15px 20px;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
                    border: 1px solid #334155;
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    max-width: 300px;
                }
                
                .toast-success {
                    border-left: 4px solid #10b981;
                }
                
                .toast i {
                    color: #10b981;
                }
                
                @keyframes slideIn {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                
                @keyframes slideOut {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 300);
        }, 3000);
    }
    
    
    function openEditFormAfterImageSelect() {
        console.log('📝 Auto-opening edit form after image selection');
        
        
        const profileLink = document.querySelector('.sidebar-link[data-section="profile"]');
        if (profileLink) {
            profileLink.click();
        }
        
        
        setTimeout(() => {
            if (window.switchToEditMode) {
                window.switchToEditMode();
            } else {
                const editProfileBtn = document.getElementById('editProfileBtn');
                if (editProfileBtn) {
                    editProfileBtn.click();
                }
            }
            
            
            const editForm = document.getElementById('editForm');
            if (editForm) {
                editForm.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
                
                
                showEditFormMessage('Image selected! Click "Save Changes" to update your profile.');
                
                
                addImageChangeNoticeStyles();
            }
        }, 300);
    }
    
    
    function showEditFormMessage(message) {
        const editForm = document.getElementById('editForm');
        if (!editForm) return;
        
        const sectionHeader = editForm.querySelector('.section-header');
        if (sectionHeader) {
            
            const oldMessage = sectionHeader.querySelector('.image-change-notice');
            if (oldMessage) oldMessage.remove();
            
            
            const messageDiv = document.createElement('div');
            messageDiv.className = 'image-change-notice';
            messageDiv.innerHTML = `
                <i class="fas fa-image"></i>
                <span>${message}</span>
            `;
            sectionHeader.appendChild(messageDiv);
            
            
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.style.opacity = '0';
                    setTimeout(() => messageDiv.remove(), 300);
                }
            }, 5000);
        }
    }
    
    
    function addImageChangeNoticeStyles() {
        if (!document.querySelector('#image-notice-styles')) {
            const style = document.createElement('style');
            style.id = 'image-notice-styles';
            style.textContent = `
                .image-change-notice {
                    background: rgba(5, 193, 247, 0.15);
                    border: 1px solid rgba(5, 193, 247, 0.3);
                    color: #05c1f7;
                    padding: 12px 15px;
                    border-radius: 8px;
                    margin-top: 15px;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: 14px;
                    animation: fadeIn 0.3s ease;
                }
                
                .image-change-notice i {
                    color: #05c1f7;
                    font-size: 16px;
                }
                
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(-10px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }
    
    
    function setupAvatarClickToEdit() {
        
        const avatarImage = document.querySelector('.avatar-container .user-profile-image');
        const avatarContainer = document.querySelector('.avatar-container');
        
        if (avatarContainer && !avatarContainer.querySelector('.avatar-clickable')) {
            
            const clickableLink = document.createElement('a');
            clickableLink.href = '#';
            clickableLink.className = 'avatar-clickable';
            clickableLink.id = 'avatarClickToEdit';
            clickableLink.title = 'Click to edit profile';
            
            
            if (avatarImage) {
                clickableLink.appendChild(avatarImage.cloneNode(true));
            }
            
            
            if (avatarImage && avatarImage.parentNode) {
                avatarImage.parentNode.replaceChild(clickableLink, avatarImage);
            }
            
            
            if (!document.querySelector('#avatar-click-styles')) {
                const style = document.createElement('style');
                style.id = 'avatar-click-styles';
                style.textContent = `
                    .avatar-clickable {
                        display: block;
                        width: 100%;
                        height: 100%;
                        cursor: pointer;
                        position: relative;
                        border-radius: 50%;
                        overflow: hidden;
                    }
                    
                    .avatar-clickable:hover:after {
                        content: 'Edit Profile';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.7);
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 14px;
                        font-weight: 500;
                    }
                `;
                document.head.appendChild(style);
            }
            
            
            clickableLink.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('🖼️ Avatar clicked, opening edit form...');
                
                
                const profileLink = document.querySelector('.sidebar-link[data-section="profile"]');
                if (profileLink) {
                    profileLink.click();
                }
                
                
                setTimeout(() => {
                    if (window.switchToEditMode) {
                        window.switchToEditMode();
                    }
                }, 300);
            });
        }
    }
    
    
    function setupCameraButtonToOpenForm() {
        const changeAvatarBtn = document.querySelector('.change-avatar-btn');
        
        if (changeAvatarBtn) {
            
            const originalOnClick = changeAvatarBtn.onclick;
            
            changeAvatarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('📷 Camera button clicked - opening form first');
                
                
                if (window.switchToEditMode) {
                    window.switchToEditMode();
                }
                
                
                setTimeout(() => {
                    const fileInput = document.querySelector('#editForm input[type="file"][name="image"]') || 
                                    document.querySelector('input[type="file"][name="image"]');
                    
                    if (fileInput && !fileDialogBlocked) {
                        console.log('📁 Opening file picker from edit form...');
                        fileInput.click();
                    }
                }, 500);
                
                
                return false;
            });
        }
    }
    
    
    setupPasswordToggles();           
    setupNavigation();                
    cleanDuplicateFileInputs();       
    setupFileUpload();                
    setupDeleteConfirmation();        
    setupViewEditToggle();           
    setupFormSubmission();            
    setupAvatarClickToEdit();         
    setupCameraButtonToOpenForm();    
    
    console.log('✅ Profile page initialized successfully');
    
    
    window.fixFileUpload = function() {
        console.log('🔧 Manual file upload fix...');
        
        
        const allFileInputs = document.querySelectorAll('input[type="file"][name="image"]');
        allFileInputs.forEach(input => {
            if (input.parentNode) input.remove();
        });
        
        
        const form = document.querySelector('#profile-info form');
        if (form) {
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'image';
            newInput.id = 'image';
            newInput.accept = 'image/*';
            newInput.className = 'form-file-input';
            newInput.style.display = 'none';
            
            form.appendChild(newInput);
            console.log('✅ Created new single file input');
            
            
            setupFileUpload();
        }
    };
    
    
    window.showEditFormMessage = showEditFormMessage;
});


(function() {
    'use strict';
    
    
    let fileDialogOpen = false;
    
    
    const originalAddEventListener = EventTarget.prototype.addEventListener;
    
    
    EventTarget.prototype.addEventListener = function(type, listener, options) {
        if (this instanceof HTMLInputElement && this.type === 'file' && type === 'click') {
            
            const wrappedListener = function(e) {
                if (fileDialogOpen) {
                    console.log('🚫 Blocked duplicate file dialog');
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    return false;
                }
                
                fileDialogOpen = true;
                console.log('📁 Opening file dialog');
                
                
                const result = listener.call(this, e);
                
                
                setTimeout(() => {
                    fileDialogOpen = false;
                    console.log('📁 File dialog ready');
                }, 1000);
                
                return result;
            };
            
            return originalAddEventListener.call(this, type, wrappedListener, options);
        }
        
        return originalAddEventListener.call(this, type, listener, options);
    };
    
    console.log('🔧 File dialog fix applied');
})();