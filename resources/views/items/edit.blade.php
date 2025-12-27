<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Item - {{ $item->name }} - Fitness Club</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/css/item.css') }}">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZGUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3guMzA3LTI3LjE1NWMtOS45ODctNDAuNjM1LTM5LjY2Ny03My42MTUtNzguMjk5LTg4LjE5NEMyMDEuMTI1LDUxLjkzNywxODguNDMzLDc3LjMzMywxNzEuMzI5LDk4Ljk5OHogTTc5LjMyMSw0OC4wOTZjMjguNjgyLDguNDU4LDU1LjkxNCwyMi4zNTcsNzkuNjgxLDQwLjcwOWMxNS43NzEtMjAuMDY1LDI3LjQzNS00My42MDYsMzMuNjItNjkuNDAyQzE4My4yNDgsMTcuMTc5LDE3My40NjgsMTYsMTYzLjQyMywxNkMxMzEuMTYyLDE2LDEwMS42ODYsMjguMTQsNzkuMzIxLDQ4LjA5NnoiPjwvcGF0aD4gPC9nPjwvc3ZnPg=">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Main Content -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Edit Item</h1>
            <p>Edit equipment item: <strong>{{ $item->name }}</strong></p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="success-alert">
                <div class="alert-content">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="error-alert">
                <div class="alert-content">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="alert-message">
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="form-card">
            <!-- Category Display with Navigation -->
            <div class="category-display-with-nav">
                <div class="category-info-section">
                    <div class="category-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="category-details">
                        <h3>Editing in Category:</h3>
                        <h2>{{ $category->name }}</h2>
                        <p class="category-description">{{ Str::limit($category->description, 100) }}</p>
                    </div>
                </div>
                
                <div class="category-nav-buttons">
                    <a href="{{ route('categories.show', $category) }}" class="nav-btn back-to-category">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to Items</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="nav-btn all-categories">
                        <i class="fas fa-th-list"></i>
                        <span>All Categories</span>
                    </a>
                </div>
            </div>

            <form action="{{ route('items.update', ['category' => $category, 'item' => $item]) }}" method="POST"
                enctype="multipart/form-data" id="itemForm">
                @csrf
                @method('PUT')

                <!-- Category Info (Hidden) -->
                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <!-- Item Name -->
                <div class="form-group">
                    <label for="name">Item Name <span class="required">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}"
                        placeholder="Enter item name (e.g., Basketball, Treadmill)" required
                        class="{{ $errors->has('name') ? 'input-invalid' : '' }}">
                    @error('name')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div class="form-group">
                    <label for="quantity">Quantity <span class="required">*</span></label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $item->quantity) }}"
                        min="0" placeholder="How many items available?" required
                        class="{{ $errors->has('quantity') ? 'input-invalid' : '' }}">
                    @error('quantity')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Status Field - Current value is selected -->
                <div class="form-group">
                    <div class="status-select-container">
                        <label for="status" class="form-label">
                            Status <span class="required-star">*</span>
                            <span class="form-help">Current availability state of the item</span>
                        </label>

                        <div class="status-select-wrapper">
                            <select name="status" id="status" required
                                class="status-select {{ $errors->has('status') ? 'invalid' : '' }}">
                                <option value="">Select item status</option>
                                <option value="available"
                                    {{ old('status', $item->status) == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="not available"
                                    {{ old('status', $item->status) == 'not available' ? 'selected' : '' }}>
                                    Not Available
                                </option>
                                <option value="under maintenance"
                                    {{ old('status', $item->status) == 'under maintenance' ? 'selected' : '' }}>
                                    Under Maintenance
                                </option>
                                <option value="out of service"
                                    {{ old('status', $item->status) == 'out of service' ? 'selected' : '' }}>
                                    Out of Service
                                </option>
                            </select>
                        </div>

                        @error('status')
                            <span class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Current Image Display -->
                <div class="form-section">
                    <div class="form-group">
                        <label class="form-label">
                            Current Item Photo
                            <span class="form-help">Click X button to remove current image and upload new one</span>
                        </label>

                        <div class="current-image-container">
                            @if ($item->image && file_exists(public_path('images/items/' . $item->image)))
                                <div class="current-image-wrapper">
                                    <img src="{{ asset('images/items/' . $item->image) }}" alt="Current Item Image"
                                        id="currentImagePreview" class="current-image-preview">
                                    <button type="button" class="image-close-btn" id="removeCurrentImageBtn"
                                        title="Remove current image">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <input type="hidden" name="remove_current_image" id="removeCurrentImage"
                                        value="0">
                                </div>
                                <div class="image-info">
                                    <p>Click the X button to remove current image and upload a new one.</p>
                                </div>
                            @else
                                <div class="no-image-message">
                                    No image currently uploaded. Please upload a new image below.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- New Image Upload (Optional) -->
                <div class="form-section" id="newImageSection"
                    style="{{ $item->image ? 'display: none;' : 'display: block;' }}">
                    <div class="form-group">
                        <label class="form-label">
                            New Item Photo <span class="required-star">*</span>
                            <span class="form-help">(JPEG, PNG, JPG, GIF - Max 2MB)</span>
                        </label>

                        <div class="file-upload">
                            <button type="button" class="file-upload-btn">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span id="fileName">Click to upload new image</span>
                            </button>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif">
                        </div>

                        <div class="image-preview">
                            <img id="imagePreview" alt="New Image Preview" class="new-image-preview">
                        </div>

                        <button type="button" id="clearImageBtn" class="clear-btn">
                            <i class="fas fa-times"></i> Clear New Image
                        </button>

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i>
                        <span>Update Item</span>
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        <span>Cancel</span>
                    </a>

                    
                </div>
            </form>

            <!-- Delete Form (Hidden) -->
            <form id="deleteForm" action="{{ route('items.destroy', ['category' => $category, 'item' => $item]) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>All Rights Reserved &copy; 2025 Fitness Club</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/item.js') }}"></script>
    <script>
        // Handle delete button click
        document.getElementById('deleteItemBtn')?.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                document.getElementById('deleteForm').submit();
            }
        });

        // Handle current image removal
        document.getElementById('removeCurrentImageBtn')?.addEventListener('click', function() {
            document.getElementById('removeCurrentImage').value = '1';
            this.parentElement.style.display = 'none';
            document.getElementById('newImageSection').style.display = 'block';
        });
    </script>
    
    @if (session('success'))
        <script>
            window.categorySuccessMessage = "{{ session('success') }}";
        </script>
    @endif
</body>

</html>