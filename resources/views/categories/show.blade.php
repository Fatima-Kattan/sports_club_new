<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $category->name }} - Fitness Club</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/css/category.css') }}">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZGUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3guMzA3LTI3LjE1NWMtOS45ODctNDAuNjM1LTM5LjY2Ny03My42MTUtNzguMjk5LTg4LjE5NEMyMDEuMTI1LDUxLjkzNywxODguNDMzLDc3LjMzMywxNzEuMzI5LDk4Ljk5OHogTTc5LjMyMSw0OC4wOTZjMjguNjgyLDguNDU4LDU1LjkxNCwyMi4zNTcsNzkuNjgxLDQwLjcwOWMxNS43NzEtMjAuMDY1LDI3LjQzNS00My42MDYsMzMuNjItNjkuNDAyQzE4My4yNDgsMTcuMTc5LDE3My40NjgsMTYsMTYzLjQyMywxNkMxMzEuMTYyLDE2LDEwMS42ODYsMjguMTQsNzkuMzIxLDQ4LjA5NnoiPjwvcGF0aD4gPC9nPjwvc3ZnPg==">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Back Button -->
        <div class="back-button-container">
            <a href="{{ route('categories.index') }}" class="back-to-categories-btn">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Category Header -->
        <div class="category-header-card">
            <div class="category-header-content">
                <div class="category-title-section">
                    <h1 class="category-title">{{ $category->name }}</h1>
                    <p class="category-description">{{ $category->description }}</p>
                </div>
            </div>
        </div>
        <!-- Search Section -->
        <form action="{{ route('categories.show', $category) }}" method="GET" class="category-search-container">
            <div class="search-input-group">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search items (e.g., Basketball, Available, 5...)" class="category-search-input"
                    autocomplete="off" id="categorySearch" autofocus >

                @if (!empty($search))
                    <a href="{{ route('categories.show', $category) }}" class="clear-search-btn" title="Clear search">
                        <i class="fas fa-times"></i>
                    </a>
                @endif

                <button type="submit" class="search-submit-btn">
                    <i class="fas fa-search"></i>
                    Search
                </button>
            </div>

            @if (!empty($search))
                <div class="search-results-info">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Found {{ $items->count() }} item(s) matching "{{ $search }}"
                        <a href="{{ route('categories.show', $category) }}" class="clear-search-link">
                            <i class="fas fa-eye"></i> Show all items
                        </a>
                    </p>
                </div>
            @endif
        </form>


        <!-- Items Section -->
        <div class="items-section">
            <div class="section-header">
                <h2>Equipment Items ({{ $items->count() }})</h2>

                @if ($items->count() > 0)
                    <div class="items-summary">
                        <div class="summary-item" data-status="available">
                            <span
                                class="summary-count available">{{ $items->where('status', 'available')->count() }}</span>
                            <span class="summary-label">Available</span>
                        </div>
                        <div class="summary-item" data-status="Not-available">
                            <span
                                class="summary-count Not-available">{{ $items->where('status', 'Not available')->count() }}</span>
                            <span class="summary-label">Not Available</span>
                        </div>
                        <div class="summary-item" data-status="under-maintenance">
                            <span
                                class="summary-count maintenance">{{ $items->where('status', 'under maintenance')->count() }}</span>
                            <span class="summary-label">Under Maintenance</span>
                        </div>
                        <div class="summary-item" data-status="out-of-service">
                            <span
                                class="summary-count out-of-service">{{ $items->where('status', 'out of service')->count() }}</span>
                            <span class="summary-label">Out of Service</span>
                        </div>
                        <div class="summary-item" data-status="all">
                            <span class="summary-count all">{{ $items->count() }}</span>
                            <span class="summary-label">All Items</span>
                        </div>
                    </div>
                @endif
            </div>

            @if ($items->count() > 0)
                <div class="items-grid">
                    @foreach ($items as $item)
                        <div class="item-card" data-status="{{ str_replace(' ', '-', $item->status) }}">
                            <!-- Item Image -->
                            <div class="item-image-container">
                                @if ($item->image)
                                    <img src="{{ asset('/images/items/' . $item->image) }}"
                                        alt="{{ $item->name }}" class="item-image"
                                        onerror="this.onerror=null; this.src='{{ asset('images/default-item.jpg') }}'">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-image"></i>
                                        <span>No Image</span>
                                    </div>
                                @endif
                            </div>

                            <div class="item-card-header">
                                <div class="item-name-section">
                                    <h3 class="item-name">{{ $item->name }}</h3>
                                    <div class="item-status {{ str_replace(' ', '-', $item->status) }}">
                                        {{ ucfirst($item->status) }}
                                    </div>
                                </div>

                                <div class="item-quantity">
                                    <span class="quantity-label">Quantity:</span>
                                    <span class="quantity-value">{{ $item->quantity }}</span>
                                </div>
                            </div>

                            <div class="item-card-body">
                                <div class="item-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Category:</span>
                                        <span class="detail-value">{{ $category->name }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Created:</span>
                                        <span class="detail-value">{{ $item->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Updated:</span>
                                        <span class="detail-value">{{ $item->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="item-card-footer">
                                <div class="item-actions">
                                    <a href="{{ route('items.edit', [$category, $item]) }}"
                                        class="item-action-btn edit-item" title="Edit Item">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('items.destroy', [$category, $item]) }}" method="POST"
                                        class="delete-item-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item-action-btn delete-item"
                                            title="Delete Item">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-items-found">
                    @if (!empty($search))
                        <i class="fas fa-search"></i>
                        <h4>No Items Found</h4>
                        <p>No items in "{{ $category->name }}" match your search:
                            <strong>"{{ $search }}"</strong>
                        </p>
                    @else
                        <div class="empty-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h3>No Equipment Items</h3>
                        <p>This category doesn't have any equipment items yet.</p>
                        <a href="{{ route('items.create', $category) }}" class="add-item-btn-large">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add First Item</span>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="category-footer">
        <div class="container">
            <p>All Rights Reserved &copy; 2025 Fitness Club</p>
        </div>
    </footer>

    <!-- JavaScript Files -->
    <script src="{{ asset('js/category-form.js') }}"></script>
    @if (session('success'))
        <script>
            window.categorySuccessMessage = "{{ session('success') }}";
        </script>
    @endif
</body>

</html>