<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->name }} - Fitness Club</title>
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQ1MS0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LTEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

</head>

<body>
    <!-- حاوية داكنة -->
    <div class="dark-container">
        <!-- الشريط العلوي -->
        <div class="dark-header">
            <!-- خلفية متحركة -->
            <div class="header-bg-animation"></div>

            <!-- زر العودة مع تأثير -->
            <a href="{{ route('activities.index') }}" class="dark-back glow-on-hover">
                <div class="back-icon-wrapper">
                    <i class="fas fa-arrow-left"></i>
                    <div class="back-pulse"></div>
                </div>
                <span class="back-text">Activities</span>
                <div class="back-underline"></div>
            </a>

            <!-- العنوان مع تأثيرات -->
            <div class="dark-title">
                <div class="title-wrapper">
                    <h1 class="title-text">
                        <span class="title-gradient">{{ $activity->name }}</span>
                        <div class="title-underline"></div>
                    </h1>
                    <p class="dark-subtitle">
                        <i class="fas fa-info-circle"></i>
                        Activity Details
                        <span class="subtitle-dot"></span>
                    </p>
                </div>
            </div>

            <!-- الأزرار مع تأثيرات خاصة -->
            <div class="dark-actions">
                @if (Auth::check() && Auth::user()->is_admin)
                    <div class="dark-actions">
                        <a href="{{ route('activities.edit', $activity->id) }}" class="dark-action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="dark-action-btn" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <!-- بطاقة الصورة -->
        <div class="dark-image-card">
            @if ($activity->image)
                <img src="{{ asset('images/activities/' . $activity->image) }}" alt="{{ $activity->name }}"
                    class="dark-image">
            @else
                <div class="dark-image-placeholder">
                    <div class="dark-placeholder-circle">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <p>No image available</p>
                </div>
            @endif

            <!-- شارات الحالة -->
            <div class="dark-badges">
                <div class="dark-badge {{ $activity->is_active ? 'dark-badge-success' : 'dark-badge-danger' }}">
                    <span class="dark-dot"></span>
                    {{ $activity->is_active ? 'Active' : 'Inactive' }}
                </div>
                @if ($activity->level)
                    <div class="dark-badge dark-badge-info">
                        {{ $activity->level }}
                    </div>
                @endif
                <div class="dark-badge {{ $activity->free_time ? 'dark-badge-warning' : 'dark-badge-primary' }}">
                    {{ $activity->free_time ? 'Free Time' : 'Scheduled' }}
                </div>
            </div>
        </div>

        <!-- بطاقات المعلومات -->
        <div class="dark-cards-grid">
            <!-- بطاقة المعلومات الأساسية -->
            <div class="dark-card">
                <div class="dark-card-header">
                    <div class="dark-card-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3>Basic Information</h3>
                </div>
                <div class="dark-card-content">
                    <div class="dark-info-line">
                        <div class="dark-info-label">
                            <i class="fas fa-building"></i>
                            Facility
                        </div>
                        <div class="dark-info-value">{{ $activity->facility->room_name ?? 'Not assigned' }}</div>
                    </div>

                    @if ($activity->level)
                        <div class="dark-info-line">
                            <div class="dark-info-label">
                                <i class="fas fa-chart-line"></i>
                                Difficulty
                            </div>
                            <div class="dark-info-value">{{ $activity->level }}</div>
                        </div>
                    @endif

                    <div class="dark-info-line">
                        <div class="dark-info-label">
                            <i class="fas fa-calendar"></i>
                            Type
                        </div>
                        <div class="dark-info-value">{{ $activity->free_time ? 'Free Time' : 'Scheduled' }}</div>
                    </div>
                </div>
            </div>

            <!-- بطاقة التواريخ -->
            <div class="dark-card">
                <div class="dark-card-header">
                    <div class="dark-card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Dates</h3>
                </div>
                <div class="dark-card-content">
                    <div class="dark-info-line">
                        <div class="dark-info-label">
                            <i class="fas fa-calendar-plus"></i>
                            Created
                        </div>
                        <div class="dark-info-value">{{ $activity->created_at->format('M d, Y') }}</div>
                    </div>

                    <div class="dark-info-line">
                        <div class="dark-info-label">
                            <i class="fas fa-calendar-check"></i>
                            Updated
                        </div>
                        <div class="dark-info-value">{{ $activity->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الوصف -->
        <div class="dark-card full-width">
            <div class="dark-card-header">
                <div class="dark-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>
                <h3>Description</h3>
            </div>
            <div class="dark-card-content">
                @if ($activity->description)
                    <div class="dark-description">
                        {{ $activity->description }}
                    </div>
                @else
                    <div class="dark-no-description">
                        <i class="fas fa-comment-alt"></i>
                        <p>No description available for this activity</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- بطاقة العناصر -->
        @if ($items->count() > 0)
            <div class="dark-card full-width">
                <div class="dark-card-header">
                    <div class="dark-card-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h3>Items</h3>
                </div>
                <div class="dark-card-content">
                    <div class="mini-items-grid">
                        @foreach ($items as $item)
                            <div class="mini-item-card" data-item-id="{{ $item->id }}">
                                <!-- رأس البطاقة مع الصورة والأزرار -->
                                <div class="mini-item-header">
                                    <!-- الصورة -->
                                    <div class="mini-item-img">
                                        @if ($item->image)
                                            <img src="{{ asset('images/items/' . $item->image) }}"
                                                alt="{{ $item->name }}">
                                        @else
                                            <div class="mini-no-img">
                                                <i class="fas fa-dumbbell"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- الأزرار الصغيرة -->
                                    <div class="mini-item-actions">
                                        <button class="mini-btn minus-btn" onclick="decreaseQuantity(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <form
                                            action="{{ route('activities.items.update', [$activity->id, $item->id]) }}"
                                            method="POST" class="update-form"
                                            onsubmit="return submitUpdateForm(this)">
                                            @csrf
                                            <input type="hidden" name="quantity"
                                                value="{{ $item->pivot->quantity }}" class="quantity-input">
                                            <button class="mini-btn send-btn" type="submit">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </form>

                                        <!-- زر الحذف مع الفورم -->
                                        <form
                                            action="{{ route('activities.items.detach', [$activity->id, $item->id]) }}"
                                            method="POST" class="delete-form"
                                            onsubmit="return confirmDeleteItem(this, '{{ $item->name }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="mini-btn trash-btn" title="Delete" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- معلومات العنصر -->
                                <div class="mini-item-body">
                                    <h5 class="mini-item-name">{{ $item->name }}</h5>

                                    <!-- الكمية -->
                                    <div class="mini-quantity">
                                        <span class="mini-qty-number">{{ $item->pivot->quantity }}</span>
                                        <span class="mini-qty-label">units</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- زر إضافة المزيد من العناصر -->
                    <div class="card-actions">
                        <a href="{{ route('items.index', ['activity' => $activity->id]) }}"
                            class="card-btn card-btn-add">
                            <i class="fas fa-plus"></i>
                            Add More Items
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <form id="deleteForm" action="{{ route('activities.destroy', $activity->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script src="{{ asset('js/activity.js') }}"></script>
</body>

</html>
