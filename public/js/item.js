// item.js - Form validation and image preview functionality

document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const previewPlaceholder = document.querySelector('.preview-placeholder');
    const clearImageBtn = document.getElementById('clearImage');
    const fileInfo = document.getElementById('fileInfo');
    
    // Drag and drop functionality
    imagePreview.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('drag-over');
    });
    
    imagePreview.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
    });
    
    imagePreview.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
        
        if (e.dataTransfer.files.length) {
            const file = e.dataTransfer.files[0];
            if (file.type.startsWith('image/')) {
                imageInput.files = e.dataTransfer.files;
                updateImagePreview(file);
            } else {
                showError('Please select an image file');
            }
        }
    });
    
    // Click to upload
    imagePreview.addEventListener('click', function() {
        imageInput.click();
    });
    
    // Image input change
    imageInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            updateImagePreview(this.files[0]);
        }
    });
    
    // Clear image button
    clearImageBtn.addEventListener('click', function() {
        imageInput.value = '';
        previewImage.style.display = 'none';
        previewPlaceholder.style.display = 'flex';
        clearImageBtn.style.display = 'none';
        fileInfo.textContent = '';
    });
    
    // Update image preview
    function updateImagePreview(file) {
        if (!file.type.match('image.*')) {
            showError('Please select an image file');
            return;
        }
        
        if (file.size > 2 * 1024 * 1024) { // 2MB limit
            showError('Image size should be less than 2MB');
            return;
        }
        
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            previewPlaceholder.style.display = 'none';
            clearImageBtn.style.display = 'flex';
        };
        
        reader.onerror = function() {
            showError('Error reading image file');
        };
        
        reader.readAsDataURL(file);
        
        // Update file info
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        fileInfo.textContent = `${file.name} (${fileSize}MB)`;
    }
    
    // Form validation
    const form = document.getElementById('itemForm');
    const nameInput = document.getElementById('name');
    const quantityInput = document.getElementById('quantity');
    const statusRadios = document.querySelectorAll('input[name="status"]');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validate name
        if (!nameInput.value.trim()) {
            showFieldError(nameInput, 'Item name is required');
            isValid = false;
        } else if (nameInput.value.trim().length > 255) {
            showFieldError(nameInput, 'Item name must be less than 255 characters');
            isValid = false;
        } else {
            clearFieldError(nameInput);
        }
        
        // Validate image
        if (!imageInput.files || !imageInput.files[0]) {
            showFieldError(imageInput, 'Item image is required');
            isValid = false;
        } else {
            clearFieldError(imageInput);
        }
        
        // Validate quantity
        const quantity = parseInt(quantityInput.value);
        if (!quantityInput.value || isNaN(quantity) || quantity < 0) {
            showFieldError(quantityInput, 'Please enter a valid quantity (minimum 0)');
            isValid = false;
        } else {
            clearFieldError(quantityInput);
        }
        
        // Validate status
        let statusSelected = false;
        statusRadios.forEach(radio => {
            if (radio.checked) statusSelected = true;
        });
        
        if (!statusSelected) {
            showFieldError(document.querySelector('.status-options'), 'Please select a status');
            isValid = false;
        } else {
            clearFieldError(document.querySelector('.status-options'));
        }
        
        if (!isValid) {
            e.preventDefault();
            showFormError('Please fix the errors before submitting');
        }
    });
    
    // Real-time validation
    nameInput.addEventListener('input', function() {
        if (this.value.trim()) {
            clearFieldError(this);
        }
    });
    
    quantityInput.addEventListener('input', function() {
        const value = parseInt(this.value);
        if (!isNaN(value) && value >= 0) {
            clearFieldError(this);
        }
    });
    
    statusRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            clearFieldError(document.querySelector('.status-options'));
        });
    });
    
    // Helper functions
    function showFieldError(field, message) {
        const errorDiv = field.parentElement.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.textContent = message;
        } else {
            const errorMessage = document.createElement('p');
            errorMessage.className = 'error-message';
            errorMessage.textContent = message;
            field.parentElement.appendChild(errorMessage);
        }
        field.classList.add('input-invalid');
        field.classList.remove('input-valid');
    }
    
    function clearFieldError(field) {
        const errorDiv = field.parentElement.querySelector('.error-message');
        if (errorDiv && !errorDiv.hasAttribute('data-server-error')) {
            errorDiv.remove();
        }
        field.classList.remove('input-invalid');
        field.classList.add('input-valid');
    }
    
    function showError(message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'error-alert';
        alertDiv.innerHTML = `
            <div class="alert-content">
                <i class="fas fa-exclamation-circle"></i>
                <span>${message}</span>
            </div>
        `;
        document.body.appendChild(alertDiv);
        setTimeout(() => alertDiv.remove(), 3000);
    }
    
    function showFormError(message) {
        showError(message);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    // Show success message if exists
    if (window.successMessage) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'success-alert';
        alertDiv.innerHTML = `
            <div class="alert-content">
                <i class="fas fa-check-circle"></i>
                <span>${window.successMessage}</span>
            </div>
        `;
        document.body.appendChild(alertDiv);
    }
});