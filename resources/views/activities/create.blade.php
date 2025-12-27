<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Club - Create New Activity</title>
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml"
    href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

</head>
<body style="background:  linear-gradient(135deg, #0f172a, #1e293b);">
    <div class="form-container">
        <!-- ترويسة الصفحة -->
        <div class="form-header">
            <h1 class="form-title">
                <i class="fas fa-plus-circle"></i>
                Create New Activity
            </h1>
            <p class="form-subtitle">
                Add a new fitness activity to your club's offerings. Fill in all required fields marked with *
            </p>
        </div>

        <!-- نموذج الإنشاء -->
        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data" id="activityForm" class="form-card">
            @csrf
            
            <!-- شريط التقدم (اختياري للصفحات متعددة الخطوات) -->
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

            <!-- شبكة الحقول -->
            <div class="form-grid">
                <!-- الاسم -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        Activity Name <span class="required">*</span>
                        <div class="form-tooltip">
                            <i class="fas fa-question-circle tooltip-icon"></i>
                            <div class="tooltip-text">
                                Enter the official name of the activity. This will be displayed to members.
                            </div>
                        </div>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input" 
                        placeholder="e.g., Yoga Classes, Strength Training"
                        required
                        autofocus
                    >
                    @error('name')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- المنشأة -->
                <div class="form-group">
                    <label for="facility_id" class="form-label">
                        Facility <span class="required">*</span>
                    </label>
                    <select id="facility_id" name="facility_id" class="form-select" required>
                        <option value="">Select a facility</option>
                        @foreach($facilities as $facility)
                            <option  value="{{ $facility->id }}" {{ old('facility_id') == $facility->id ? 'selected' : '' }}>
                                {{ $facility->room_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('facility_id')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- الوصف -->
            <div class="form-group full-width">
                <label for="description" class="form-label">
                    Description
                    <div class="form-tooltip">
                        <i class="fas fa-question-circle tooltip-icon"></i>
                        <div class="tooltip-text">
                            Provide a detailed description of the activity. Include benefits, target audience, and any special requirements.
                        </div>
                    </div>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    class="form-textarea" 
                    placeholder="Describe the activity, its benefits, and target audience..."
                    rows="4"
                >{{ old('description') }}</textarea>
                <div class="form-help">
                    Maximum 500 characters. Currently: <span id="charCount">0</span>/500
                </div>
                @error('description')
                    <div class="form-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- الصف الثاني -->
            <div class="form-grid">
                <!-- المستوى -->
                <div class="form-group">
                    <label for="level" class="form-label">Difficulty Level</label>
                    <select id="level" name="level" class="form-select">
                        <option value="">Select level</option>
                        <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                    @error('level')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- صورة النشاط -->
                <div class="form-group">
                    <label class="form-label">Activity Image</label>
                    <div class="file-upload">
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            accept="image/*"
                            onchange="previewImage(event)"
                        >
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            Click to upload image
                        </div>
                        <div class="file-upload-hint">
                            Recommended: 800x600px, PNG, JPG, or WebP
                        </div>
                        
                    </div>
                    <div id="imagePreview" class="image-preview" style="display: none;">
                        <div class="preview-container">
                            <img id="previewImage" class="preview-image" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @error('image')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- خيارات مفاتيح الراديو -->
            <div class="form-row">
                <!-- وقت الفراغ -->
                <div class="form-group">
                    <label class="form-label">
                        Free Time Activity <span class="required">*</span>
                        <div class="form-tooltip">
                            <i class="fas fa-question-circle tooltip-icon"></i>
                            <div class="tooltip-text">
                                Free time activities are available for members to join anytime without scheduling.
                            </div>
                        </div>
                    </label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="free_time"  value='1' required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Yes</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="free_time"  value='0' required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">No</span>
                        </label>
                    </div>
                    @error('free_time')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- الحالة -->
                <div class="form-group">
                    <label class="form-label">
                        Activity Status <span class="required">*</span>
                    </label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="is_active"  value='1' required>
                            <span class="radio-custom"></span>
                            <span class="radio-label">Active</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="is_active"  value='0' required>
                            <span class="radio-custom"></span>
                            <span class="radio-label" >Inactive</span>
                        </label>
                    </div>
                    @error('is_active')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- أزرار النموذج -->
            <div class="form-actions">
                <div>
                    <a href="{{ route('activities.index') }}" class="form-btn form-btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Back to Activities
                    </a>
                </div>
                <div style="display: flex; gap: 15px;">
                    <button type="reset" class="form-btn form-btn-cancel">
                        <i class="fas fa-redo"></i>
                        Reset Form
                    </button>
                    <button type="submit" class="form-btn form-btn-submit">
                        <i class="fas fa-save"></i>
                        Create Activity
                    </button>
                </div>
            </div>
        </form>

        <!-- تحميل -->
        <div class="form-loading" id="loadingSpinner">
            <div class="loading-spinner"></div>
        </div>
    </div>
    <script src="{{ asset('js/activity.js') }}"></script>
  
</body>
</html>