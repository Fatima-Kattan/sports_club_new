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
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQ1bWwtMDs=">

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

        <!-- أزرار الإجراءات -->
        {{-- <div class="dark-actions-bar">
            <a href="{{ route('activities.index') }}" class="dark-btn dark-btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to List
            </a>
            <div class="dark-action-group">
                <a href="{{ route('activities.edit', $activity->id) }}" class="dark-btn dark-btn-primary">
                    <i class="fas fa-edit"></i>
                    Edit Activity
                </a>
                <button class="dark-btn dark-btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i>
                    Delete Activity
                </button>
            </div>
        </div> --}}
    </div>

    <!-- نموذج الحذف -->
    <form id="deleteForm" action="{{ route('activities.destroy', $activity->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete() {
            if (confirm(`Are you sure you want to delete "${'{{ $activity->name }}'}"? This action cannot be undone.`)) {
                document.getElementById('deleteForm').submit();
            }
        }

        // تأثيرات بسيطة
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.dark-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>
