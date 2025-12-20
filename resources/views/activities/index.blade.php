<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Club - Activities Management</title>
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

</head>

<body>
    <div class="container">
        <!-- ترويسة الصفحة -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-running"></i>
                Activities Hub
            </h1>
            <p class="page-subtitle">
                Manage all fitness activities in one centralized dashboard
            </p>
        </div>

        <!-- إحصائيات -->
        @php
            $totalActivities = $activities->total();
            $activeActivities = App\Models\Activity::where('is_active', true)->count();
            $freeActivities = App\Models\Activity::where('free_time', true)->count();
            $premiumActivities = App\Models\Activity::where('free_time', false)->count();
        @endphp

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">{{ $totalActivities }}</div>
                <div class="stat-label">Total Activities</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $activeActivities }}</div>
                <div class="stat-label">Active Activities</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $freeActivities }}</div>
                <div class="stat-label">Free Activities</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $premiumActivities }}</div>
                <div class="stat-label">Premium Activities</div>
            </div>
        </div>

        <!-- شريط التحكم -->
        <div class="table-controls">
            <div class="buttons-container">
                <a href="{{ route('activities.create') }}" class="btn btn-primary pulse-effect">
                    <i class="fas fa-plus-circle"></i>
                    New Activity
                </a>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i>
                    Refresh
                </a>
            </div>

            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <form action="{{ route('activities.index') }}" method="GET" style="display: contents;">
                    <input type="text" name="search" class="search-input"
                        placeholder="Search activities by name, description, or level..." value="{{ $search ?? '' }}"
                        autocomplete="off">
                </form>
            </div>
        </div>

        <!-- رسائل التنبيه -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span class="alert-message">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span class="alert-message">{{ session('error') }}</span>
            </div>
        @endif

        <!-- شبكة الأنشطة -->
        @if ($activities->count() > 0)
            <div class="activities-grid">
                @foreach ($activities as $index => $activity)
                    <div class="activity-card" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="card-image-container">
                            @if ($activity->image)
                                <img src="{{ asset('images/activities/' . $activity->image) }}"
                                    alt="{{ $activity->name }}" class="card-image"
                                    onerror="this.onerror=null; this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 400 200\"><defs><linearGradient id=\"grad\" x1=\"0%\" y1=\"0%\" x2=\"100%\" y2=\"100%\"><stop offset=\"0%\" style=\"stop-color:#05C1F7;stop-opacity:1\" /><stop offset=\"100%\" style=\"stop-color:#00ff88;stop-opacity:1\" /></linearGradient></defs><rect width=\"400\" height=\"200\" fill=\"url(#grad)\"/></svg>'">
                            @else
                                <div class="card-image" style="background: linear-gradient(135deg, #05C1F7, #00ff88);">
                                </div>
                            @endif

                            <div class="card-badges">
                                <span class="badge {{ $activity->free_time ? 'badge-free' : 'badge-paid' }}">
                                    {{ $activity->free_time ? 'FREE' : 'PAID' }}
                                </span>
                                <span class="badge {{ $activity->is_active ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $activity->is_active ? 'ACTIVE' : 'INACTIVE' }}
                                </span>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-title">
                                <span>{{ $activity->name }}</span>
                                @if ($activity->level)
                                    <span class="card-level">{{ $activity->level }}</span>
                                @endif
                            </div>

                            @if ($activity->description)
                                <p class="card-description">
                                    {{ Str::limit($activity->description, 120) }}
                                </p>
                            @endif

                            <div class="activity-details">
                                <div class="detail-item">
                                    <span class="detail-label">Facility</span>
                                    <span class="detail-value facility-name">
                                        {{ $activity->facility->name ?? 'Not Assigned' }}
                                    </span>
                                </div>

                                <div class="detail-item">
                                    <span class="detail-label">Type</span>
                                    <span class="detail-value">
                                        {{ $activity->free_time ? 'Free Time' : 'Scheduled' }}
                                    </span>
                                </div>
                            </div>

                            <div class="card-actions">
                                <a href="{{ route('activities.show', $activity) }}" class="card-btn card-btn-view">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                @if (Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('activities.edit', $activity) }}" class="card-btn card-btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <button class="card-btn card-btn-delete delete-btn" data-id="{{ $activity->id }}"
                                        data-name="{{ $activity->name }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- التصفح -->
            @if ($activities->hasPages())
                <div class="pagination">
                    {{-- Previous Page --}}
                    @if ($activities->onFirstPage())
                        <span class="page-btn disabled">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $activities->previousPageUrl() }}" class="page-btn">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @php
                        $current = $activities->currentPage();
                        $last = $activities->lastPage();
                        $start = max($current - 2, 1);
                        $end = min($current + 2, $last);
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $activities->url(1) }}" class="page-btn">1</a>
                        @if ($start > 2)
                            <span class="page-btn disabled">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $activities->url($i) }}" class="page-btn {{ $i == $current ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($end < $last)
                        @if ($end < $last - 1)
                            <span class="page-btn disabled">...</span>
                        @endif
                        <a href="{{ $activities->url($last) }}" class="page-btn">{{ $last }}</a>
                    @endif

                    {{-- Next Page --}}
                    @if ($activities->hasMorePages())
                        <a href="{{ $activities->nextPageUrl() }}" class="page-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="page-btn disabled">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            @endif
        @else
            <!-- حالة عدم وجود بيانات -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <h2 class="empty-title">
                    @if ($search)
                        No Results Found
                    @else
                        No Activities Yet
                    @endif
                </h2>
                <p class="empty-description">
                    @if ($search)
                        We couldn't find any activities matching "{{ $search }}". Try a different search term.
                    @else
                        Start building your fitness program by adding activities. Click the button below to create your
                        first activity.
                    @endif
                </p>
                <div class="buttons-container" style="justify-content: center; margin-top: 20px;">
                    @if ($search)
                        <a href="{{ route('activities.index') }}" class="btn btn-primary">
                            <i class="fas fa-times"></i>
                            Clear Search
                        </a>
                    @endif
                    <a href="{{ route('activities.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Add First Activity
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- نافذة تأكيد الحذف -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-content">
            <div class="modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="modal-title">Confirm Deletion</h3>
            <p class="modal-message" id="deleteMessage">
                Are you sure you want to delete this activity?
            </p>

            <form id="deleteForm" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

            <div class="modal-actions">
                <button type="button" class="modal-btn modal-btn-confirm" id="confirmDelete">
                    <i class="fas fa-trash"></i>
                    Delete Activity
                </button>
                <button type="button" class="modal-btn modal-btn-cancel" id="cancelDelete">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/activity.js') }}"></script>
</body>

</html>
