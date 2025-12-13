// ==============================================
// Item Edit Form JavaScript - Fixed Version
// ==============================================

// Global variables
let imageInput, imagePreview, fileName, fileUploadBtn, clearBtn;
let removeCurrentImageBtn, removeCurrentImageInput, currentImagePreview, newImageSection;

// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    console.log("Item Edit Form JS Loaded");
    
    // Initialize character counter
    setupCharacterCounter();
    
    // Initialize image upload and preview
    setupImageUpload();
    
    // Initialize form validation
    setupFormValidation();
    
    // Initialize status select interaction
    setupStatusSelect();
    
    // Initialize current image removal functionality
    setupCurrentImageRemoval();
    
    // Display success message if exists
    if (window.categorySuccessMessage) {
        showSuccessToast(window.categorySuccessMessage);
    }
});

// ==============================================
// 1. CHARACTER COUNTER
// ==============================================
function setupCharacterCounter() {
    const descriptionInput = document.getElementById("description");
    const charCount = document.getElementById("charCount");

    if (descriptionInput && charCount) {
        // Update counter on input
        descriptionInput.addEventListener("input", function () {
            const count = this.value.length;
            charCount.textContent = count;

            // Color coding
            if (count > 500) {
                charCount.style.color = "#ff4444";
                this.classList.add("input-invalid");
            } else if (count > 400) {
                charCount.style.color = "#ffa500";
                this.classList.remove("input-invalid");
            } else {
                charCount.style.color = "#A1A09A";
                this.classList.remove("input-invalid");
            }
        });

        // Initial count
        charCount.textContent = descriptionInput.value.length;
    }
}

// ==============================================
// 2. IMAGE UPLOAD & PREVIEW (FIXED)
// ==============================================
function setupImageUpload() {
    imageInput = document.getElementById("image");
    imagePreview = document.getElementById("imagePreview");
    fileName = document.getElementById("fileName");
    fileUploadBtn = document.querySelector(".file-upload-btn");

    if (imageInput && imageInput.hasAttribute("onchange")) {
        imageInput.removeAttribute("onchange");
    }

    if (imageInput && imagePreview && fileName && fileUploadBtn) {
        console.log("Image upload elements found");
        
        imageInput.addEventListener("change", handleImageSelect);
        
        setupDragAndDrop();
        
        createClearButton();
        
        hideClearButton();
    } else {
        console.error("Some image upload elements not found:", {
            imageInput: !!imageInput,
            imagePreview: !!imagePreview,
            fileName: !!fileName,
            fileUploadBtn: !!fileUploadBtn
        });
    }
}

function handleImageSelect(e) {
    const file = e.target.files[0];
    
    if (!file) {
        clearImage();
        return;
    }
    
    console.log("File selected:", file.name, file.type, file.size);
    
    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if (!validTypes.includes(file.type)) {
        showErrorAlert("Please select a valid image (JPEG, PNG, JPG, GIF)");
        clearImage();
        return;
    }
    
    if (file.size > 2 * 1024 * 1024) {
        showErrorAlert("Image size should be less than 2MB");
        clearImage();
        return;
    }
    
    const reader = new FileReader();
    
    reader.onload = function (e) {
        console.log("Image loaded for preview");
        imagePreview.src = e.target.result;
        imagePreview.style.display = "block";
        imagePreview.style.opacity = "0";
        
        setTimeout(() => {
            imagePreview.style.opacity = "1";
            imagePreview.style.transition = "opacity 0.3s ease";
        }, 10);
        
        updateUploadButton(file.name, true);
        showClearButton();
        
        addImageOverlayCloseButton();
    };
    
    reader.onerror = function (e) {
        console.error("Error reading file:", e);
        showErrorAlert("Error reading image file");
        clearImage();
    };
    
    reader.readAsDataURL(file);
}

// ==============================================
// 3. CURRENT IMAGE REMOVAL FUNCTIONALITY
// ==============================================
function setupCurrentImageRemoval() {
    removeCurrentImageBtn = document.getElementById("removeCurrentImageBtn");
    removeCurrentImageInput = document.getElementById("removeCurrentImage");
    currentImagePreview = document.getElementById("currentImagePreview");
    newImageSection = document.getElementById("newImageSection");
    
    if (removeCurrentImageBtn) {
        removeCurrentImageBtn.addEventListener('click', function() {
            // Hide current image
            if (currentImagePreview) {
                currentImagePreview.style.display = 'none';
            }
            
            // Hide the remove button itself
            this.style.display = 'none';
            
            // Set hidden input to indicate image should be removed
            removeCurrentImageInput.value = '1';
            
            // Show new image upload section
            if (newImageSection) {
                newImageSection.style.display = 'block';
            }
            
            // Make new image required
            if (imageInput) {
                imageInput.required = true;
            }
        });
    }
    
    // If no current image, make new image required
    if (!currentImagePreview || currentImagePreview.style.display === 'none') {
        if (imageInput) {
            imageInput.required = true;
        }
    }
}

function createClearButton() {
    
    clearBtn = document.createElement("button");
    clearBtn.type = "button";
    clearBtn.className = "clear-btn";
    clearBtn.innerHTML = '<i class="fas fa-times"></i> Clear Image';
    clearBtn.style.cssText = `
        display: none;
        margin: 10px auto 0;
        padding: 8px 16px;
        background: rgba(255, 68, 68, 0.1);
        border: 1px solid rgba(255, 68, 68, 0.3);
        color: var(--color-error);
        border-radius: 6px;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
    `;
    
    clearBtn.addEventListener("click", clearImage);
    
    clearBtn.addEventListener("mouseenter", function() {
        this.style.background = "rgba(255, 68, 68, 0.2)";
        this.style.borderColor = "var(--color-error)";
    });
    
    clearBtn.addEventListener("mouseleave", function() {
        this.style.background = "rgba(255, 68, 68, 0.1)";
        this.style.borderColor = "rgba(255, 68, 68, 0.3)";
    });
    
    const uploadSection = document.querySelector(".file-upload");
    if (uploadSection) {
        uploadSection.parentNode.insertBefore(clearBtn, uploadSection.nextSibling);
    }
}

function showClearButton() {
    if (clearBtn) {
        clearBtn.style.display = "block";
        setTimeout(() => {
            clearBtn.style.opacity = "1";
        }, 10);
    }
}

function hideClearButton() {
    if (clearBtn) {
        clearBtn.style.display = "none";
        clearBtn.style.opacity = "0";
    }
}

function addImageOverlayCloseButton() {
    const existingCloseBtn = imagePreview.parentNode.querySelector(".image-close-btn");
    if (existingCloseBtn) {
        existingCloseBtn.remove();
    }
    
    const closeBtn = document.createElement("button");
    closeBtn.type = "button";
    closeBtn.className = "image-close-btn";
    closeBtn.innerHTML = '×';
    closeBtn.title = "Remove image";
    closeBtn.style.cssText = `
        position: absolute;
        top: 10px;
        right: 10px;
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid #ccc;
        border-radius: 50%;
        color: #333;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    `;
    
    closeBtn.addEventListener("mouseenter", function() {
        this.style.background = "#fff";
        this.style.borderColor = "#ff4444";
        this.style.color = "#ff4444";
        this.style.transform = "scale(1.1)";
    });
    
    closeBtn.addEventListener("mouseleave", function() {
        this.style.background = "rgba(255, 255, 255, 0.9)";
        this.style.borderColor = "#ccc";
        this.style.color = "#333";
        this.style.transform = "scale(1)";
    });
    
    closeBtn.addEventListener("click", function(e) {
        e.stopPropagation();
        clearImage();
    });
    if (imagePreview.parentNode) {
        imagePreview.parentNode.style.position = "relative";
        imagePreview.parentNode.appendChild(closeBtn);
    }
}

function setupDragAndDrop() {
    if (!fileUploadBtn) return;
    
    // Drag over
    fileUploadBtn.addEventListener("dragover", function (e) {
        e.preventDefault();
        this.style.borderStyle = "solid";
        this.style.backgroundColor = "rgba(5, 193, 247, 0.2)";
        this.style.borderColor = "var(--color-primary)";
        this.style.color = "var(--color-primary)";
    });
    
    // Drag leave
    fileUploadBtn.addEventListener("dragleave", function () {
        this.style.borderStyle = "dashed";
        this.style.backgroundColor = "rgba(5, 193, 247, 0.1)";
        this.style.borderColor = "rgba(5, 193, 247, 0.5)";
        this.style.color = "var(--color-primary)";
    });
    
    // Drop
    fileUploadBtn.addEventListener("drop", function (e) {
        e.preventDefault();
        if (e.dataTransfer.files.length) {
            imageInput.files = e.dataTransfer.files;
            const changeEvent = new Event("change", { bubbles: true });
            imageInput.dispatchEvent(changeEvent);
        }
    });
}

function updateUploadButton(fileNameText, isSelected = false) {
    if (fileName) {
        fileName.textContent = fileNameText || "Click to upload image";
    }
    
    if (fileUploadBtn) {
        if (isSelected) {
            fileUploadBtn.style.borderStyle = "solid";
            fileUploadBtn.style.backgroundColor = "rgba(0, 255, 136, 0.1)";
            fileUploadBtn.style.borderColor = "var(--color-secondary)";
            fileUploadBtn.style.color = "var(--color-secondary)";
        } else {
            fileUploadBtn.style.borderStyle = "dashed";
            fileUploadBtn.style.backgroundColor = "rgba(5, 193, 247, 0.1)";
            fileUploadBtn.style.borderColor = "rgba(5, 193, 247, 0.5)";
            fileUploadBtn.style.color = "var(--color-primary)";
        }
    }
}

function clearImage() {
    console.log("Clearing image");
    
    if (imageInput) imageInput.value = "";
    if (imagePreview) {
        imagePreview.src = "";
        imagePreview.style.display = "none";
    }

    const closeBtn = imagePreview?.parentNode?.querySelector(".image-close-btn");
    if (closeBtn) {
        closeBtn.remove();
    }
    
    updateUploadButton("Click to upload image", false);
    hideClearButton();
}

// ==============================================
// 4. FORM VALIDATION
// ==============================================
function setupFormValidation() {
    const itemForm = document.getElementById("itemForm");
    if (!itemForm) return;
    
    itemForm.addEventListener("submit", function (e) {
        console.log("Form submission validation");
        
        const name = document.getElementById("name")?.value.trim();
        const description = document.getElementById("description")?.value.trim();
        const quantity = document.getElementById("quantity")?.value;
        const status = document.getElementById("status")?.value;
        const image = document.getElementById("image")?.files[0];
        
        let isValid = true;

        document.querySelectorAll(".error-message").forEach((el) => {
            if (!el.hasAttribute("data-server-error")) {
                el.remove();
            }
        });

        document.querySelectorAll(".input-invalid").forEach((el) => {
            el.classList.remove("input-invalid");
        });

        if (!name) {
            isValid = false;
            showError("name", "Item name is required");
        }
        
        if (!quantity || quantity < 0) {
            isValid = false;
            showError("quantity", "Please enter a valid quantity");
        }

        if (!status) {
            isValid = false;
            showError("status", "Please select a status");
        }
        
        // Special validation for edit form
        const hasCurrentImage = currentImagePreview && currentImagePreview.style.display !== 'none';
        const removeCurrentImage = removeCurrentImageInput?.value === '1';
        const hasNewImage = image?.files.length > 0;
        
        // If there's no current image OR current image is being removed, new image is required
        if (!hasCurrentImage || removeCurrentImage) {
            if (!hasNewImage) {
                isValid = false;
                showError("image", "Please select an image");
            }
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
}

// ==============================================
// 5. STATUS SELECT INTERACTION
// ==============================================
function setupStatusSelect() {
    const statusSelect = document.getElementById('status');
    const statusBadge = document.getElementById('selectedStatusBadge');
    const statusText = document.getElementById('selectedStatusText');
    
    if (!statusSelect) return;
    
    
    if (statusBadge && statusText) {
        statusSelect.addEventListener('change', function() {
            const value = this.value;
            const text = this.options[this.selectedIndex].text;
            
            if (value) {
                statusText.textContent = text;
                statusBadge.className = 'selected-status ' + value.replace(/\s+/g, '-');
                statusBadge.style.display = 'inline-flex';
                
                
                const icon = statusBadge.querySelector('i');
                if (icon) {
                    switch(value) {
                        case 'available':
                            icon.className = 'fas fa-check-circle';
                            break;
                        case 'not available':
                            icon.className = 'fas fa-times-circle';
                            break;
                        case 'under maintenance':
                            icon.className = 'fas fa-tools';
                            break;
                        case 'out of service':
                            icon.className = 'fas fa-ban';
                            break;
                    }
                }
            } else {
                statusBadge.style.display = 'none';
            }
        });
        
        
        if (statusSelect.value) {
            statusSelect.dispatchEvent(new Event('change'));
        }
    }
    
    
    statusSelect.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });
    
    statusSelect.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
    });
}

// ==============================================
// 6. ERROR HANDLING FUNCTIONS
// ==============================================
function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    
    const errorElement = document.createElement("p");
    errorElement.className = "error-message";
    errorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
    
    
    const existingError = field.parentNode.querySelector(".error-message");
    if (existingError && !existingError.hasAttribute("data-server-error")) {
        existingError.remove();
    }
    
    field.parentNode.appendChild(errorElement);
    field.classList.add("input-invalid");
}

function showErrorAlert(message) {
    
    const alertDiv = document.createElement("div");
    alertDiv.className = "error-alert";
    alertDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #ff4444;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(255, 68, 68, 0.3);
        z-index: 9999;
        animation: slideIn 0.3s ease, slideOut 0.3s ease 2.7s;
        animation-fill-mode: forwards;
    `;
    
    alertDiv.innerHTML = `
        <div class="alert-content" style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-exclamation-triangle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(alertDiv);
    
    
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.parentNode.removeChild(alertDiv);
        }
    }, 3000);
    
    
    if (!document.querySelector("#alert-animations")) {
        const style = document.createElement("style");
        style.id = "alert-animations";
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }
}

function showSuccessToast(message) {
    const toast = document.createElement("div");
    toast.className = "success-alert";
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #00ff88;
        color: #0a0a0a;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        z-index: 9999;
        animation: slideIn 0.3s ease, slideOut 0.3s ease 2.7s;
        animation-fill-mode: forwards;
    `;
    
    toast.innerHTML = `
        <div class="alert-content" style="display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 3000);
}

// ==============================================
// 7. DELETE CONFIRMATION
// ==============================================
function confirmDelete() {
    if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}

// Export functions for global use if needed
window.itemFormUtils = {
    clearImage,
    showError,
    showErrorAlert,
    showSuccessToast,
    confirmDelete
};