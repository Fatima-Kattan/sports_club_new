// وظيفة لعرض/إخفاء الباسورد مع تحسين للصفحات المتعددة
function setupPasswordToggle() {
    // إعداد جميع أزرار العين في الصفحة
    document.querySelectorAll('.password-toggle').forEach(button => {
        const inputId = button.getAttribute('data-target');
        const eyeIcon = button.querySelector('i');
        
        if (inputId && eyeIcon) {
            const passwordInput = document.getElementById(inputId);
            
            if (passwordInput) {
                // الحالة الافتراضية: كلمة السر مخفية
                passwordInput.type = 'password';
                eyeIcon.className = 'fas fa-eye-slash';

                button.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.className = 'fas fa-eye';
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.className = 'fas fa-eye-slash';
                    }
                });
            }
        }
    });
}

// تأثيرات التركيز على الحقول
function setupInputFocusEffects() {
    document.querySelectorAll('.form-input, .form-select, .form-file-input').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = 'var(--primary)';
            const icon = this.parentElement.querySelector('i.fas');
            if (icon) {
                icon.style.color = 'var(--primary)';
            }
        });

        input.addEventListener('blur', function() {
            this.style.borderColor = 'var(--border)';
            const icon = this.parentElement.querySelector('i.fas');
            if (icon) {
                icon.style.color = 'var(--gray)';
            }
        });
    });
}

// حل مشكلة autofill
function fixAutofillStyles() {
    setTimeout(() => {
        document.querySelectorAll('.form-input, .form-select').forEach(input => {
            if (input.value) {
                input.style.backgroundColor = 'var(--input)';
                input.style.color = 'var(--light)';
            }
        });
    }, 100);
}

// إعداد حقول الباسورد في الصفحة
function setupPasswordFields() {
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    
    passwordInputs.forEach(passwordInput => {
        // إخفاء أي أيقونات افتراضية للحقول
        const style = document.createElement('style');
        style.textContent = `
            input[type="password"]::-webkit-textfield-decoration-container { 
                display: none !important; 
            }
            input[type="password"]::-webkit-caps-lock-indicator { 
                display: none !important; 
            }
            input[type="password"]::-webkit-credentials-auto-fill-button { 
                display: none !important; 
                visibility: hidden !important;
            }
            input[type="password"]::-ms-reveal { 
                display: none !important; 
            }
            input[type="password"]::-ms-clear { 
                display: none !important; 
            }
        `;
        document.head.appendChild(style);

        // منع autocomplete
        passwordInput.autocomplete = "off";
        passwordInput.setAttribute('readonly', 'readonly');
        setTimeout(() => {
            passwordInput.removeAttribute('readonly');
        }, 100);
    });
}

// تحسين عرض حقل الـ file
function setupFileInput() {
    const fileInput = document.getElementById('image');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                this.style.color = 'var(--light)';
            }
        });
    }
}

// تهيئة كل شيء عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    console.log('JS file loaded successfully');
    
    // إعداد حقول الباسورد (الطريقة الجديدة)
    setupPasswordToggle();
    
    // إعدادات إضافية
    setupInputFocusEffects();
    fixAutofillStyles();
    setupPasswordFields();
    setupFileInput();
});