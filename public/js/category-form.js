// category-form.js - Form handling for Category Creation/Edit

// DOM Elements
const categoryForm = document.getElementById("categoryForm");
const nameInput = document.getElementById("name");
const descriptionInput = document.getElementById("description");
const charCount = document.getElementById("charCount");

// Flag to prevent initial validation
let isInitialLoad = true;

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
    if (categoryForm) {
        initializeForm();
        setupEventListeners();
    }
    checkForSuccessMessage();
    setupDeleteConfirmations();
    setupSportsFilter();
    setupCategoryCardsHover();
    addFormReset();
    setupAutoSave();

    setupIndexPage();

    // Set flag to false after initial setup
    setTimeout(() => {
        isInitialLoad = false;
    }, 100);
});

// ===== FORM HANDLING FUNCTIONS =====

// Initialize form
function initializeForm() {
    // Set initial character count
    if (descriptionInput && charCount) {
        updateCharCount();

        // Don't validate on initial load
        if (!isInitialLoad) {
            validateInput(nameInput);
            validateInput(descriptionInput);
        }
    }
}

// Set up event listeners
function setupEventListeners() {
    if (categoryForm) {
        // Character counter for description
        descriptionInput.addEventListener("input", updateCharCount);

        // Real-time validation
        nameInput.addEventListener("input", function () {
            // Don't validate on first character if it's initial load
            if (!isInitialLoad || this.value.trim().length > 0) {
                validateInput(this);
            }
        });

        descriptionInput.addEventListener("input", function () {
            updateCharCount();
            // Don't validate on first character if it's initial load
            if (!isInitialLoad || this.value.trim().length > 0) {
                validateInput(this);
            }
        });

        // Form submission
        categoryForm.addEventListener("submit", validateForm);

        // Add focus effects
        const inputs = [nameInput, descriptionInput];
        inputs.forEach((input) => {
            input.addEventListener("focus", addFocusStyle);
            input.addEventListener("blur", removeFocusStyle);
        });
    }
}

// Update character counter
function updateCharCount() {
    if (!descriptionInput || !charCount) return;

    const count = descriptionInput.value.length;
    charCount.textContent = count;

    // Change color based on character count
    if (count > 500) {
        charCount.style.color = "#ff4444";
        descriptionInput.classList.add("input-invalid");
        descriptionInput.classList.remove("input-valid");
    } else if (count > 400) {
        charCount.style.color = "#ffa500";
    } else {
        charCount.style.color = "#A1A09A";

        // Only mark as valid if there's content
        if (count > 0) {
            descriptionInput.classList.add("input-valid");
            descriptionInput.classList.remove("input-invalid");
        } else {
            descriptionInput.classList.remove("input-valid", "input-invalid");
        }
    }
}

// Validate individual input
function validateInput(input) {
    if (!input) return;

    const value = input.value.trim();

    if (input === nameInput) {
        if (!value) {
            markInputInvalid(input, "Category name is required");
        } else if (value.length < 3) {
            markInputInvalid(
                input,
                "Category name must be at least 3 characters"
            );
        } else if (value.length > 255) {
            markInputInvalid(
                input,
                "Category name must not exceed 255 characters"
            );
        } else {
            markInputValid(input);
        }
    }

    if (input === descriptionInput) {
        if (!value) {
            markInputInvalid(input, "Description is required");
        } else if (value.length > 500) {
            markInputInvalid(
                input,
                "Description must not exceed 500 characters"
            );
        } else {
            markInputValid(input);
        }
    }
}

// Mark input as valid
function markInputValid(input) {
    input.classList.add("input-valid");
    input.classList.remove("input-invalid");

    // Remove any existing error message (only those created by JS)
    const errorElement = input.nextElementSibling;
    if (
        errorElement &&
        errorElement.classList.contains("error-message") &&
        !errorElement.hasAttribute("data-server-error")
    ) {
        errorElement.remove();
    }
}

// Mark input as invalid
function markInputInvalid(input, message) {
    input.classList.add("input-invalid");
    input.classList.remove("input-valid");

    // Check if error message already exists (and not a server error)
    let errorElement = input.nextElementSibling;

    if (
        !errorElement ||
        !errorElement.classList.contains("error-message") ||
        errorElement.hasAttribute("data-server-error")
    ) {
        // Create new error message element
        errorElement = document.createElement("p");
        errorElement.className = "error-message";
        input.parentNode.insertBefore(errorElement, input.nextSibling);
    }

    errorElement.textContent = message;
}

// Validate entire form
function validateForm(e) {
    e.preventDefault();

    // Clear previous validation (only client-side errors)
    clearValidation();

    // Get form values
    const name = nameInput.value.trim();
    const description = descriptionInput.value.trim();

    let isValid = true;
    let errorMessages = [];

    // Validate name
    if (!name) {
        isValid = false;
        markInputInvalid(nameInput, "Please enter category name");
        errorMessages.push("Category name is required");
    } else if (name.length < 3) {
        isValid = false;
        markInputInvalid(
            nameInput,
            "Category name must be at least 3 characters"
        );
        errorMessages.push("Category name must be at least 3 characters");
    } else if (name.length > 255) {
        isValid = false;
        markInputInvalid(
            nameInput,
            "Category name must not exceed 255 characters"
        );
        errorMessages.push("Category name must not exceed 255 characters");
    }

    // Validate description
    if (!description) {
        isValid = false;
        markInputInvalid(descriptionInput, "Please enter category description");
        errorMessages.push("Description is required");
    } else if (description.length > 500) {
        isValid = false;
        markInputInvalid(
            descriptionInput,
            "Description must not exceed 500 characters"
        );
        errorMessages.push("Description must not exceed 500 characters");
    }

    // If form is valid, submit it
    if (isValid) {
        // Show loading state
        showLoadingState();

        // Submit form after a short delay to show loading state
        setTimeout(() => {
            categoryForm.submit();
        }, 500);
    } else {
        // Show error summary
        if (errorMessages.length > 0) {
            showErrorAlert("Please fix the following errors:", errorMessages);
            // Scroll to first error
            scrollToFirstError();
        }
    }
}

// Clear all validation states (client-side only)
function clearValidation() {
    if (!nameInput || !descriptionInput) return;

    [nameInput, descriptionInput].forEach((input) => {
        input.classList.remove("input-valid", "input-invalid");

        // Remove error messages (only those created by JS)
        const errorElement = input.nextElementSibling;
        if (
            errorElement &&
            errorElement.classList.contains("error-message") &&
            !errorElement.hasAttribute("data-server-error")
        ) {
            errorElement.remove();
        }
    });
}

// Show loading state
function showLoadingState() {
    const submitButton = categoryForm.querySelector(".btn-primary");
    if (!submitButton) return;

    const originalText = submitButton.innerHTML;

    submitButton.innerHTML = `
        <span class="loading-spinner"></span>
        <span>Saving...</span>
    `;
    submitButton.disabled = true;

    // Store original content for cleanup
    submitButton.dataset.originalContent = originalText;

    // Restore button after 5 seconds (in case submission fails)
    setTimeout(() => {
        if (submitButton.disabled) {
            submitButton.innerHTML = submitButton.dataset.originalContent;
            submitButton.disabled = false;
        }
    }, 5000);
}

// Show error alert
function showErrorAlert(title, messages) {
    // Remove existing alert
    const existingAlert = document.querySelector(".error-alert");
    if (existingAlert) {
        existingAlert.remove();
    }

    const errorAlert = document.createElement("div");
    errorAlert.className = "error-alert";
    errorAlert.innerHTML = `
        <div class="alert-content">
            <span class="alert-icon">⚠️</span>
            <div class="alert-message">
                <strong>${title}</strong>
                <ul>
                    ${messages.map((msg) => `<li>${msg}</li>`).join("")}
                </ul>
            </div>
            <button class="close-alert">✕</button>
        </div>
    `;

    document.body.appendChild(errorAlert);

    // Add close functionality
    const closeBtn = errorAlert.querySelector(".close-alert");
    closeBtn.addEventListener("click", function () {
        errorAlert.remove();
    });

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (errorAlert.parentNode) {
            errorAlert.remove();
        }
    }, 5000);
}

// Check for success message from server
function checkForSuccessMessage() {
    // Check for window variable set by server
    if (window.categorySuccessMessage) {
        showSuccessAlert(window.categorySuccessMessage);
    }

    // Also check for existing success message in DOM
    const successMessage = document.querySelector(".success-message");
    if (successMessage) {
        showSuccessAlert(successMessage.textContent.trim());

        // Auto-remove inline success message
        setTimeout(() => {
            successMessage.remove();
        }, 1000);
    }
}

// Show success alert
function showSuccessAlert(message) {
    setTimeout(() => {
        const successAlert = document.createElement("div");
        successAlert.className = "success-alert";
        successAlert.innerHTML = `
            <div class="alert-content">
                <span>✅</span>
                <span>${message}</span>
            </div>
        `;

        document.body.appendChild(successAlert);

        // Auto-remove after animation
        setTimeout(() => {
            if (successAlert.parentNode) {
                successAlert.remove();
            }
        }, 3000);
    }, 500);
}

// Add focus style
function addFocusStyle(e) {
    e.target.parentElement.classList.add("focused");
}

// Remove focus style
function removeFocusStyle(e) {
    e.target.parentElement.classList.remove("focused");
}

// Setup delete confirmations
function setupDeleteConfirmations() {
    const deleteForms = document.querySelectorAll('form[action*="destroy"]');
    deleteForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            if (
                !confirm(
                    "Are you sure you want to delete this category? This action cannot be undone."
                )
            ) {
                e.preventDefault();
            }
        });
    });
}

// Setup sports filter (for show page)
function setupSportsFilter() {
    const filterInput = document.getElementById("sportsFilter");
    const sportsList = document.querySelector(".sports-list");

    if (filterInput && sportsList) {
        filterInput.addEventListener("input", function () {
            const filterValue = this.value.toLowerCase();
            const sportsItems = sportsList.querySelectorAll("li");

            sportsItems.forEach((item) => {
                const text = item.textContent.toLowerCase();
                if (text.includes(filterValue)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    }
}

// Setup category cards hover effect
function setupCategoryCardsHover() {
    const categoryCards = document.querySelectorAll(".category-card");
    categoryCards.forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-10px)";
        });

        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
        });
    });
}

// Scroll to first error
function scrollToFirstError() {
    const firstError = document.querySelector(".input-invalid");
    if (firstError) {
        firstError.scrollIntoView({ behavior: "smooth", block: "center" });
        firstError.focus();
    }
}

// Utility function to check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
            (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
            (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Add form reset functionality
function addFormReset() {
    const cancelBtn = document.querySelector(".btn-cancel");
    if (cancelBtn) {
        cancelBtn.addEventListener("click", function (e) {
            if (categoryForm) {
                categoryForm.reset();
                clearValidation();
                if (charCount) {
                    charCount.textContent = "0";
                    charCount.style.color = "#A1A09A";
                }
            }
        });
    }
}

// Add auto-save feature (optional)
function setupAutoSave() {
    let autoSaveTimer;
    const autoSaveInterval = 30000; // 30 seconds

    if (categoryForm) {
        categoryForm.addEventListener("input", function () {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                // Check if form has valid data
                const name = nameInput.value.trim();
                const description = descriptionInput.value.trim();

                if (
                    name.length >= 3 &&
                    description.length > 0 &&
                    description.length <= 500
                ) {
                    console.log("Auto-saving...");
                    // You could implement actual auto-save here
                    // For example, save to localStorage or send AJAX request

                    // Example: Save to localStorage
                    try {
                        const formData = {
                            name: name,
                            description: description,
                            timestamp: new Date().toISOString(),
                        };
                        localStorage.setItem(
                            "categoryDraft",
                            JSON.stringify(formData)
                        );
                    } catch (error) {
                        console.error("Failed to auto-save:", error);
                    }
                }
            }, autoSaveInterval);
        });
    }
}

// Check for auto-saved data on page load
function checkForAutoSavedData() {
    try {
        const savedData = localStorage.getItem("categoryDraft");
        if (
            savedData &&
            categoryForm &&
            confirm(
                "You have unsaved data from a previous session. Would you like to restore it?"
            )
        ) {
            const data = JSON.parse(savedData);
            if (nameInput && data.name) nameInput.value = data.name;
            if (descriptionInput && data.description)
                descriptionInput.value = data.description;
            updateCharCount();
            validateInput(nameInput);
            validateInput(descriptionInput);
        }
    } catch (error) {
        console.error("Failed to load auto-saved data:", error);
    }
}

// Clear auto-saved data when form is submitted successfully
function clearAutoSavedData() {
    try {
        localStorage.removeItem("categoryDraft");
    } catch (error) {
        console.error("Failed to clear auto-saved data:", error);
    }
}

// Mark server-side error messages for distinction
function markServerErrors() {
    // Mark existing server error messages
    const serverErrors = document.querySelectorAll(".error-message");
    serverErrors.forEach((error) => {
        if (!error.hasAttribute("data-server-error")) {
            error.setAttribute("data-server-error", "true");
        }
    });
}

// Initialize server error marking on load
document.addEventListener("DOMContentLoaded", function () {
    markServerErrors();
});

// Prevent form submission when there are server errors
if (categoryForm) {
    categoryForm.addEventListener("submit", function (e) {
        // Clear auto-saved data on successful submission
        clearAutoSavedData();

        // Prevent submission if there are visible server errors
        const serverErrors = document.querySelectorAll(
            ".error-message[data-server-error]"
        );
        if (serverErrors.length > 0) {
            e.preventDefault();
            alert(
                "Please fix the errors highlighted in red before submitting."
            );
        }
    });
}

// Handle page refresh warning
window.addEventListener("beforeunload", function (e) {
    if (categoryForm) {
        const name = nameInput ? nameInput.value.trim() : "";
        const description = descriptionInput
            ? descriptionInput.value.trim()
            : "";

        // Only show warning if there's unsaved data
        if (
            (name.length > 0 || description.length > 0) &&
            !document.querySelector(".loading-spinner")
        ) {
            e.preventDefault();
            e.returnValue =
                "You have unsaved changes. Are you sure you want to leave?";
            return e.returnValue;
        }
    }
});

// Handle tab/window visibility change
document.addEventListener("visibilitychange", function () {
    if (document.visibilityState === "hidden" && categoryForm) {
        // Auto-save when user leaves the tab
        const name = nameInput ? nameInput.value.trim() : "";
        const description = descriptionInput
            ? descriptionInput.value.trim()
            : "";

        if (
            name.length >= 3 &&
            description.length > 0 &&
            description.length <= 500
        ) {
            try {
                const formData = {
                    name: name,
                    description: description,
                    timestamp: new Date().toISOString(),
                };
                localStorage.setItem("categoryDraft", JSON.stringify(formData));
            } catch (error) {
                console.error("Failed to auto-save on tab switch:", error);
            }
        }
    }
});

// Export functions for testing (optional)
if (typeof module !== "undefined" && module.exports) {
    module.exports = {
        validateInput,
        markInputValid,
        markInputInvalid,
        validateForm,
        updateCharCount,
    };
}

// ====== NEW SEARCH FUNCTIONALITY ======

// Initialize index page features
function setupIndexPage() {
    const searchInput = document.getElementById("categorySearch");

    if (searchInput) {
        // Focus search when page loads (if there's search)
        if (searchInput.value) {
            searchInput.focus();
            searchInput.select();
        }

        // Setup keyboard shortcuts
        setupSearchKeyboardShortcuts(searchInput);

        // Optional: Auto-submit after typing stops
        setupAutoSubmit(searchInput);
    }

    // Setup delete confirmations for all delete forms
    setupDeleteConfirmations();

    // Setup hover effects for category cards
    setupCategoryCardsHover();
}

// Setup keyboard shortcuts for search
function setupSearchKeyboardShortcuts(searchInput) {
    document.addEventListener("keydown", function (e) {
        // Press / to focus search
        if (e.key === "/" && !e.ctrlKey && !e.metaKey) {
            const activeElement = document.activeElement;
            if (
                activeElement !== searchInput &&
                activeElement.tagName !== "INPUT" &&
                activeElement.tagName !== "TEXTAREA"
            ) {
                e.preventDefault();
                searchInput.focus();
                searchInput.select();
            }
        }

        // Press Escape to clear search
        if (e.key === "Escape" && searchInput.value) {
            e.preventDefault();
            window.location.href = window.location.pathname; // Clear search
        }

        // Ctrl/Cmd + F to focus search
        if ((e.ctrlKey || e.metaKey) && e.key === "f") {
            e.preventDefault();
            searchInput.focus();
            searchInput.select();
        }

        // N to add new category
        if (e.key === "n" && !e.ctrlKey && !e.metaKey) {
            const addButton = document.querySelector(".add-category-btn");
            if (addButton) {
                addButton.click();
            }
        }
    });
}

// Optional: Auto-submit form after user stops typing
function setupAutoSubmit(searchInput) {
    let typingTimer;

    searchInput.addEventListener("input", function () {
        clearTimeout(typingTimer);

        if (this.value.trim().length >= 2) {
            typingTimer = setTimeout(() => {
                this.form.submit();
            }, 800);
        }
    });
}

// Show toast notification
function showToast(message, type = "info") {
    const toast = document.createElement("div");
    toast.className = "custom-toast";
    toast.textContent = message;

    // Set background color based on type
    const bgColor =
        type === "success"
            ? "rgba(0, 255, 136, 0.9)"
            : type === "error"
            ? "rgba(255, 68, 68, 0.9)"
            : "rgba(5, 193, 247, 0.9)";

    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: ${bgColor};
        color: var(--color-dark);
        padding: 1rem 1.5rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        z-index: 99999;
        animation: slideInRight 0.3s ease;
        font-weight: 600;
        max-width: 300px;
    `;

    document.body.appendChild(toast);

    // Auto-remove after 3 seconds
    setTimeout(() => {
        toast.style.animation = "slideOutRight 0.3s ease";
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    }, 3000);
}

// Add CSS for search functionality
const dynamicStyles = `
    .search-highlight {
        background-color: rgba(255, 255, 0, 0.3);
        padding: 0.1rem 0.3rem;
        border-radius: 3px;
        font-weight: bold;
    }
    
    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
`;

// Inject dynamic styles
const styleSheet = document.createElement("style");
styleSheet.textContent = dynamicStyles;
document.head.appendChild(styleSheet);
// Search functionality for category show page
function setupCategorySearch() {
    const searchInput = document.querySelector('.search-input');
    const clearSearchBtn = document.querySelector('.clear-search-btn');
    
    if (searchInput) {
        // Auto-focus search input if there's search
        if (searchInput.value) {
            searchInput.focus();
            searchInput.select();
        }
        
        // Keyboard shortcuts
        searchInput.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + F to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                this.focus();
                this.select();
            }
            
            // Escape to clear search
            if (e.key === 'Escape' && this.value) {
                if (clearSearchBtn) {
                    clearSearchBtn.click();
                } else {
                    window.location.href = window.location.pathname;
                }
            }
        });
        
        // Auto-submit after typing stops (optional)
        let typingTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            
            if (this.value.trim().length >= 2) {
                typingTimer = setTimeout(() => {
                    this.form.submit();
                }, 800);
            }
        });
    }
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    setupCategorySearch();
});
