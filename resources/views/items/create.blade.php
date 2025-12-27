<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add New Item - {{ $category->name }} - Fitness Club</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/css/item.css') }}">
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
            <h1>Add New Item</h1>
            <p>Add equipment item to <strong>{{ $category->name }}</strong> category</p>
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
                        <h3>Adding to Category:</h3>
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

            <form action="{{ route('items.store', $category) }}" method="POST" enctype="multipart/form-data"
                id="itemForm">
                @csrf

                <!-- Category Info (Hidden) -->
                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <!-- Item Name -->
                <div class="form-group">
                    <label for="name">Item Name <span class="required">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
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
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}"
                        min="0" placeholder="How many items available?" required
                        class="{{ $errors->has('quantity') ? 'input-invalid' : '' }}">
                    @error('quantity')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Status Field -->
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
                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="not available"
                                    {{ old('status') == 'not available' ? 'selected' : '' }}>
                                    Not Available
                                </option>
                                <option value="under maintenance"
                                    {{ old('status') == 'under maintenance' ? 'selected' : '' }}>
                                    Under Maintenance
                                </option>
                                <option value="out of service"
                                    {{ old('status') == 'out of service' ? 'selected' : '' }}>
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

                <!-- Image Upload -->
                <div class="form-section">
                    <div class="form-group">
                        <label class="form-label">
                            Item Photo <span class="required-star">*</span>
                            <span class="form-help">(JPEG, PNG, JPG, GIF - Max 2MB)</span>
                        </label>

                        <div class="file-upload">
                            <button type="button" class="file-upload-btn">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span id="fileName">Click to upload image</span>
                            </button>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif">
                        </div>

                        <div class="image-preview">
                            <img id="imagePreview" alt="Image Preview">
                        </div>

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create Item</span>
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
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
    @if (session('success'))
        <script>
            window.categorySuccessMessage = "{{ session('success') }}";
        </script>
    @endif
</body>

</html>