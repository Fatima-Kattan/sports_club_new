<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Employee - Fitness Club</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* تنسيقات إضافية للصفحة */
        :root {
            --color-primary: #05C1F7;
            --color-secondary: #00ff88;
            --color-dark: #0a0a0a;
            --color-light: #FDFDFC;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background: #0a0a0a;
            color: #EDEDEC;
            margin: 0;
            padding: 0;
        }

        .create-employee-container {
            width: 100vw;
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #EDEDEC;
            padding: 100px 20px 50px;
            position: relative;
            overflow-x: hidden;
        }

        .create-employee-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.03"><polygon fill="%2300ff88" points="0,500 1000,0 1000,1000 0,1000"/></svg>');
            background-size: cover;
            z-index: 1;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(5, 193, 247, 0.3);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 2.5rem;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-subtitle {
            color: #A1A09A;
            font-size: 1.1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: var(--color-primary);
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(5, 193, 247, 0.3);
            border-radius: 10px;
            color: #EDEDEC;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 15px rgba(5, 193, 247, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-control::placeholder {
            color: #A1A09A;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2305C1F7' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: rgba(5, 193, 247, 0.1);
            border: 2px dashed rgba(5, 193, 247, 0.5);
            border-radius: 10px;
            color: var(--color-primary);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-btn:hover {
            background: rgba(5, 193, 247, 0.2);
            border-color: var(--color-primary);
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-submit,
        .btn-cancel {
            padding: 12px 35px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            color: var(--color-dark);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(5, 193, 247, 0.4);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            color: #EDEDEC;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--color-primary);
        }

        .required-star {
            color: #ff4444;
            margin-left: 3px;
        }

        .form-help {
            color: #A1A09A;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .image-preview {
            margin-top: 10px;
            text-align: center;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 10px;
            border: 2px solid var(--color-primary);
            display: none;
        }

        /* رسائل الخطأ */
        .error-message {
            color: #ff4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .has-error .form-control {
            border-color: #ff4444;
        }

        /* تأثيرات إضافية */
        .form-section {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .section-title {
            color: var(--color-secondary);
            font-size: 1.2rem;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 255, 136, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .create-employee-container {
                padding: 80px 15px 30px;
            }

            .form-container {
                padding: 20px;
            }

            .form-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header مبسط -->
    <header style="background: #0a0a0a; color: white; padding: 15px; position: fixed; width: 100%; top: 0; z-index: 1000; border-bottom: 2px solid #05C1F7;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('employees.index') }}" style="color: #05C1F7; text-decoration: none; font-size: 1.5rem; font-weight: bold;">
                <i class="fas fa-dumbbell" style="margin-right: 10px;"></i>
                Sports Club
            </a>
            <div>
                <a href="{{ route('employees.index') }}" style="color: white; text-decoration: none; margin-left: 20px;">
                    <i class="fas fa-arrow-left"></i> Back to Employees
                </a>
            </div>
        </div>
    </header>

    <div class="create-employee-container" style="margin-top: 70px;">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Add New Employee</h1>
                <p class="form-subtitle">Fill in the details below to add a new team member</p>
            </div>

            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
                @csrf

                <div class="form-section">
                    <h3 class="section-title">Basic Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="full_name" class="form-label">
                                Full Name <span class="required-star">*</span>
                            </label>
                            <input type="text" id="full_name" name="full_name" class="form-control"
                                placeholder="Enter full name" value="{{ old('full_name') }}" required>
                            @error('full_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                Email Address <span class="required-star">*</span>
                            </label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="employee@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="position" class="form-label">
                                Position <span class="required-star">*</span>
                            </label>
                            <input type="text" id="position" name="position" class="form-control"
                                placeholder="e.g., Senior Coach, HR Manager" value="{{ old('position') }}" required>
                            @error('position')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="form-label">
                                Phone Number <span class="required-star">*</span>
                            </label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control"
                                placeholder="+1234567890" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Employment Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="mgr_id" class="form-label">
                                Manager <span class="required-star">*</span>
                            </label>
                            <select id="mgr_id" name="mgr_id" class="form-control" >
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}"
                                        {{ old('mgr_id') == $manager->id ? 'selected' : '' }}>
                                        {{ $manager->full_name }} ({{ $manager->position }})
                                    </option>
                                @endforeach
                            </select>
                            @error('mgr_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="salary" class="form-label">
                                Salary ($) <span class="required-star">*</span>
                            </label>
                            <input type="number" id="salary" name="salary" class="form-control"
                                placeholder="e.g., 3000" value="{{ old('salary') }}" min="0" step="0.01"
                                required>
                            @error('salary')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="hire_date" class="form-label">
                                Hire Date <span class="required-star">*</span>
                            </label>
                            <input type="date" id="hire_date" name="hire_date" class="form-control"
                                value="{{ old('hire_date') }}" required>
                            @error('hire_date')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">
                                Role <span class="required-star">*</span>
                            </label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="coach" {{ old('role') == 'coach' ? 'selected' : '' }}>Coach</option>
                                <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee
                                </option>
                            </select>
                            @error('role')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Professional Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" id="specialization" name="specialization" class="form-control"
                                placeholder="e.g., Fitness Training, Nutrition" value="{{ old('specialization') }}">
                            @error('specialization')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="years_of_experience" class="form-label">
                                Years of Experience <span class="required-star">*</span>
                            </label>
                            <input type="number" id="years_of_experience" name="years_of_experience"
                                class="form-control" placeholder="e.g., 5" value="{{ old('years_of_experience') }}"
                                min="0" required>
                            @error('years_of_experience')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="working_hours_start" class="form-label">
                                Working Hours Start <span class="required-star">*</span>
                            </label>
                            <input type="time" id="working_hours_start" name="working_hours_start"
                                class="form-control" value="{{ old('working_hours_start') }}" required>
                            @error('working_hours_start')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="working_hours_end" class="form-label">
                                Working Hours End <span class="required-star">*</span>
                            </label>
                            <input type="time" id="working_hours_end" name="working_hours_end"
                                class="form-control" value="{{ old('working_hours_end') }}" required>
                            @error('working_hours_end')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Profile Image</h3>
                    <div class="form-group">
                        <label class="form-label">
                            Employee Photo <span class="required-star">*</span>
                            <span class="form-help">(JPEG, PNG, JPG, GIF - Max 2MB)</span>
                        </label>

                        <div class="file-upload">
                            <button type="button" class="file-upload-btn">
                                <span id="fileName">Click to upload image</span>
                            </button>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif" required
                                onchange="document.getElementById('fileName').textContent = this.files[0].name">
                        </div>

                        <div class="image-preview">
                            <img id="imagePreview" alt="Image Preview">
                        </div>

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <svg style="width:20px;height:20px;margin-right:8px;vertical-align:middle;"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V7L17 3M19 19H5V5H16.17L19 7.83V19M12 12C10.34 12 9 13.34 9 15S10.34 18 12 18 15 16.66 15 15 13.66 12 12 12M6 6H15V10H6V6Z" />
                        </svg>
                        Create Employee
                    </button>

                    <a href="{{ route('employees.index') }}" class="btn-cancel">
                        <svg style="width:20px;height:20px;margin-right:8px;vertical-align:middle;"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer مبسط -->
    <footer style="background: #111; color: #A1A09A; text-align: center; padding: 20px; margin-top: 50px;">
        <p>&copy; 2025 Sports Club. All rights reserved.</p>
    </footer>

    <!-- JavaScript إضافي -->
    <script>
        // معاينة الصورة قبل الرفع
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }

            // تحديث اسم الملف عند الاختيار
            document.getElementById('image').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Click to upload image';
                document.getElementById('fileName').textContent = fileName;
            });

            // التحقق من أن وقت النهاية بعد وقت البداية
            document.getElementById('employeeForm').addEventListener('submit', function(e) {
                const start = document.getElementById('working_hours_start').value;
                const end = document.getElementById('working_hours_end').value;

                if (start && end && start >= end) {
                    e.preventDefault();
                    alert('Working hours end must be after working hours start!');
                    document.getElementById('working_hours_end').focus();
                }
            });

            // تعيين التاريخ الافتراضي ليوم اليوم
            const today = new Date().toISOString().split('T')[0];
            if (!document.getElementById('hire_date').value) {
                document.getElementById('hire_date').value = today;
            }

            // عرض رسائل الخطأ
            @if ($errors->any())
                let errorMessage = "Please fix the following errors:\n";
                @foreach ($errors->all() as $error)
                    errorMessage += "• {{ $error }}\n";
                @endforeach
                alert(errorMessage);
            @endif

            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>
</body>
</html>