<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Club - Edit Activity: {{ $activity->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQ1MS0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LTEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
</head>

<body>
    <div class="form-container">
        <!-- ترويسة الصفحة -->
        <div class="form-header">
            <h1 class="form-title">
                <i class="fas fa-edit"></i>
                Edit Activity: {{ $activity->name }}
            </h1>
            <p class="form-subtitle">
                Update the details of this fitness activity. All required fields are marked with *
            </p>
        </div>

        <!-- معاينة النشاط الحالي -->
        <div class="current-activity-preview">
            <div class="preview-card">
                <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                    @if ($activity->image)
                        <img src="{{ asset('images/activities/' . $activity->image) }}" alt="{{ $activity->name }}"
                            class="current-activity-image">
                    @else
                        <div class="no-image-placeholder">
                            <i class="fas fa-running"></i>
                        </div>
                    @endif
                    <div>
                        <h3>Current Activity</h3>
                        <p class="activity-info">
                            <strong>Name:</strong> {{ $activity->name }} |
                            <strong>Status:</strong>
                            <span class="{{ $activity->is_active ? 'status-active' : 'status-inactive' }}">
                                {{ $activity->is_active ? 'Active' : 'Inactive' }}
                            </span> |
                            <strong>Free Time:</strong>
                            <span class="{{ $activity->free_time ? 'free-yes' : 'free-no' }}">
                                {{ $activity->free_time ? 'Yes' : 'No' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- نموذج التعديل -->
        <form action="{{ route('activities.update', $activity) }}" method="POST" enctype="multipart/form-data"
            id="activityForm" class="form-card">
            @csrf
            @method('PUT')

            <!-- شريط التقدم -->
            <div class="form-progress">
                <div class="progress-step active">
                    <div class="step-number">1</div>
                    <div class="step-label">Basic Info</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">2</div>
                    <div class="step-label">Details</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">3</div>
                    <div class="step-label">Settings</div>
                </div>
            </div>

            <!-- رسائل الخطأ -->
            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Please fix the following errors:</strong>
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- شبكة الحقول -->
            <div class="form-grid">
                <!-- الاسم -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        Activity Name <span class="required">*</span>
                    </label>
                    <input type="text" id="name" name="name" class="form-input"
                        placeholder="e.g., Yoga Classes, Strength Training" value="{{ old('name', $activity->name) }}"
                        required autofocus>
                </div>

                <!-- المنشأة -->
                <div class="form-group">
                    <label for="facility_id" class="form-label">
                        Facility <span class="required">*</span>
                    </label>
                    <select id="facility_id" name="facility_id" class="form-select" required>
                        <option value="">Select a facility</option>
                        @foreach ($facilities as $facility)
                            <option value="{{ $facility->id }}"
                                {{ old('facility_id', $activity->facility_id) == $facility->id ? 'selected' : '' }}>
                                {{ $facility->room_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- الوصف -->
            <div class="form-group full-width">
                <label for="description" class="form-label">
                    Description
                </label>
                <textarea id="description" name="description" class="form-textarea"
                    placeholder="Describe the activity, its benefits, and target audience..." rows="4">{{ old('description', $activity->description) }}</textarea>
                <div class="form-help">
                    Maximum 500 characters. Currently: <span
                        id="charCount">{{ strlen(old('description', $activity->description)) }}</span>/500
                </div>
            </div>

            <!-- الصف الثاني -->
            <div class="form-grid">
                <!-- المستوى -->
                <div class="form-group">
                    <label for="level" class="form-label">Difficulty Level</label>
                    <select id="level" name="level" class="form-select" required>
                        <option value="">Select level</option>
                        <option value="Beginner" {{ old('level', $activity->level) == 'beginner' ? 'selected' : '' }}>
                            Beginner</option>
                        <option value="Intermediate"
                            {{ old('level', $activity->level) == 'intermediate' ? 'selected' : '' }}>Intermediate
                        </option>
                        <option value="Advanced" {{ old('level', $activity->level) == 'advanced' ? 'selected' : '' }}>
                            Advanced</option>
                    </select>
                </div>

                <!-- صورة النشاط -->
                <div class="form-group">
                    <label class="form-label">Activity Image</label>

                    <!-- الصورة الحالية -->
                    <div class="current-image-section">
                        @if ($activity->image)
                            <div class="current-image-info">
                                <img src="{{ asset('images/activities/' . $activity->image) }}" alt="Current Image"
                                    class="current-img-preview">
                                <span class="current-img-name">{{ $activity->image }}</span>
                            </div>
                        @else
                            <span class="no-current-image">No image uploaded</span>
                        @endif
                    </div>

                    <!-- رفع صورة جديدة -->
                    <div class="file-upload">
                        <input type="file" id="image" name="image" accept="image/*">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            Upload new image (optional)
                        </div>
                        <div class="file-upload-hint">
                            Leave empty to keep current image
                        </div>
                    </div>

                    <!-- معاينة الصورة الجديدة -->
                    <div id="imagePreview" class="image-preview">
                        <div class="preview-container">
                            <img id="previewImage" class="preview-image" alt="New Image Preview">
                            <button type="button" class="remove-image">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <p class="preview-note">
                            New image preview (will replace current image)
                        </p>
                    </div>
                </div>
            </div>

            <!-- خيارات مفاتيح الراديو -->
            <div class="form-row">
                <!-- وقت الفراغ -->
                <div class="form-group">
                    <label class="form-label">
                        Free Time Activity <span class="required">*</span>
                    </label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="free_time" value="1" required
                                {{ old('free_time', $activity->free_time) == 1 ? 'checked' : '' }} required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Yes</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="free_time" value="0" required
                                {{ old('free_time', $activity->free_time) == 0 ? 'checked' : '' }} required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">No</span>
                        </label>
                    </div>
                </div>

                <!-- الحالة -->
                <div class="form-group">
                    <label class="form-label">
                        Activity Status <span class="required">*</span>
                    </label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="is_active" value="1" required
                                {{ old('is_active', $activity->is_active) == 1 ? 'checked' : '' }} required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Active</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="is_active" value="0" required
                                {{ old('is_active', $activity->is_active) == 0 ? 'checked' : '' }} required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Inactive</span>
                        </label>
                    </div>
                </div>
            </div>



            <!-- أزرار النموذج -->
            <div class="form-actions">
                <div class="left-actions">
                    <a href="{{ route('activities.show', $activity) }}" class="form-btn btn-view">
                        <i class="fas fa-eye"></i>
                        View Activity
                    </a>
                    <a href="{{ route('activities.index') }}" class="form-btn form-btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Back to List
                    </a>
                </div>
                <div class="right-actions">
                    <button type="reset" class="form-btn form-btn-cancel">
                        <i class="fas fa-redo"></i>
                        Reset Changes
                    </button>
                    <button type="submit" class="form-btn form-btn-submit">
                        <i class="fas fa-save"></i>
                        Update Activity
                    </button>
                </div>
            </div>
        </form>

        <!-- تحميل -->
        <div class="form-loading" id="loadingSpinner">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Edit page loaded');

            // عداد الأحرف
            const descriptionTextarea = document.getElementById('description');
            const charCount = document.getElementById('charCount');

            if (descriptionTextarea && charCount) {
                descriptionTextarea.addEventListener('input', function() {
                    charCount.textContent = this.value.length;

                    if (this.value.length > 500) {
                        this.value = this.value.substring(0, 500);
                        charCount.textContent = 500;
                    }
                });
            }

            // معاينة الصورة الجديدة
            const imageInput = document.getElementById('image');
            const previewDiv = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImage');

            if (imageInput && previewDiv && previewImg) {
                // إخفاء معاينة الصورة الجديدة افتراضيًا
                previewDiv.style.display = 'none';

                imageInput.addEventListener('change', function(e) {
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
                            previewImg.src = e.target.result;
                            previewDiv.style.display = 'block';
                        };

                        reader.readAsDataURL(file);
                    }
                });
            }

            // زر إزالة معاينة الصورة
            const removeImageBtn = document.querySelector('.remove-image');
            if (removeImageBtn) {
                removeImageBtn.addEventListener('click', function() {
                    if (imageInput) imageInput.value = '';
                    if (previewDiv) previewDiv.style.display = 'none';
                    if (previewImg) previewImg.src = '';
                });
            }

            // تحذير قبل مغادرة الصفحة مع تغييرات غير محفوظة
            const form = document.getElementById('activityForm');
            let formChanged = false;

            if (form) {
                const formInputs = form.querySelectorAll('input, textarea, select');

                formInputs.forEach(input => {
                    const originalValue = input.value;
                    const originalChecked = input.checked;

                    input.addEventListener('input', function() {
                        formChanged = true;
                    });

                    input.addEventListener('change', function() {
                        if (this.type === 'radio' || this.type === 'checkbox') {
                            if (this.checked !== originalChecked) {
                                formChanged = true;
                            }
                        }
                    });
                });

                // إعادة تعيين عند حفظ
                form.addEventListener('submit', function() {
                    formChanged = false;
                });

                // زر المسح
                const resetBtn = form.querySelector('button[type="reset"]');
                if (resetBtn) {
                    resetBtn.addEventListener('click', function(e) {
                        if (formChanged) {
                            if (!confirm('Are you sure you want to reset all changes?')) {
                                e.preventDefault();
                                return false;
                            }

                            // إخفاء معاينة الصورة الجديدة
                            if (previewDiv) previewDiv.style.display = 'none';
                            if (previewImg) previewImg.src = '';
                            if (imageInput) imageInput.value = '';

                            formChanged = false;
                        }
                    });
                }

                // تحذير عند مغادرة الصفحة
                window.addEventListener('beforeunload', function(e) {
                    if (formChanged) {
                        e.preventDefault();
                        e.returnValue = '';
                        return '';
                    }
                });
            }
        });
    </script>

</body>

</html>
