<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <title>Booking Management</title>
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <h1 class="main-title">
                    <span class="title-icon">
                        <i class="fas fa-calendar-check"></i>
                    </span>
                    Booking Manager
                </h1>
                <p class="subtitle">Professional Fitness Club Booking Management System</p>
                <p class="subtitle_1">Join us now, we are waiting for you.</p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Search and Create Section -->
        <div class="search-create-section">
            {{--  <h2 class="section-title">
                <i class="fas fa-search"></i>
                Manage Bookings
            </h2> --}}
            <div class="search-create-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" class="search-input"
                        placeholder="Search bookings by name, activity, trainer, or email...">
                </div>
                <a href="{{ route('bookings.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Create Booking
                </a>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            <div class="table-header">
                <h2>
                    <i class="fas fa-list"></i>
                    Recent Bookings
                </h2>
                <div class="stats-text">
                    <div class="stats-label">Total Active Bookings : </div>
                    <div class="stats-value">{{ $totalBookings }}</div>
                </div>
            </div>
            <div class="table-container">
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user"></i> Client</th>
                            <th><i class="fas fa-dumbbell"></i> Activity</th>
                            <th><i class="fas fa-user-tie"></i> Trainer</th>
                            <th><i class="fas fa-credit-card"></i> Payment</th>
                            <th><i class="fas fa-calendar-alt"></i> Date</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            {{ substr($booking->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div class="user-details">
                                            <div class="user-name">{{ $booking->user->name ?? 'Client' }}</div>
                                            <div class="user-email">
                                                <i class="fas fa-envelope"></i>
                                                {{ $booking->user->email ?? 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="activity-tag">
                                        <i class="fas fa-running"></i>
                                        {{ $booking->activity->name ?? 'Activity' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="employee-info">
                                        <div class="employee-avatar">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <div class="employee-details">
                                            <div class="employee-name">{{ $booking->employee->name ?? 'Trainer' }}</div>
                                            <div class="employee-position">
                                                {{ $booking->employee->position ?? 'Fitness Trainer' }}</div>
                                        </div>
                                    </div>
                                </td>
                               <td>
    @if($booking->employee && $booking->employee->salary)
        @php
            $commission = $booking->employee->salary * 0.10;
        @endphp
        
        <div class="payment-cell" style="
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        ">
            <!-- حالة الدفع مع السعر -->
            <div style="
                display: flex;
                align-items: center;
                gap: 12px;
                width: 100%;
                justify-content: center;
            ">
                @if ($booking->paid)
                    <span class="status-badge status-paid" style="margin: 0;">
                        <i class="fas fa-check-circle"></i> PAID
                        <div style="
                    font-weight: 800;
                    font-size: 18px;
                    color: {{ $booking->paid ? '#00ff88' : '#ef4444' }};
                    padding: 8px 16px;
                        border:none;
                    {{ $booking->paid ? 'rgba(0, 255, 136, 0.2)' : 'rgba(239, 68, 68, 0.2)' }};
                ">
                    {{ number_format($commission, 2) }}$ 
                </div>
                    </span>
                @else
                    <span class="status-badge status-unpaid" style="margin: 0;">
                        <i class="fas fa-times-circle"></i> UNPAID
                    </span>
                @endif
                
                {{-- <div style="
                    font-weight: 800;
                    font-size: 18px;
                    color: {{ $booking->paid ? '#00ff88' : '#ef4444' }};
                    padding: 8px 16px;
                    background: {{ $booking->paid ? 'rgba(0, 255, 136, 0.1)' : 'rgba(239, 68, 68, 0.1)' }};
                    border-radius: 10px;
                    border: 1px solid {{ $booking->paid ? 'rgba(0, 255, 136, 0.2)' : 'rgba(239, 68, 68, 0.2)' }};
                ">
                    {{ number_format($commission, 2)$ }} 
                </div> --}}
            </div>
        </div>
    @else
        <!-- إذا لم يكن هناك راتب -->
        @if ($booking->paid)
            <span class="status-badge status-paid">
                <i class="fas fa-check-circle"></i> PAID
            </span>
        @else
            <span class="status-badge status-unpaid">
                <i class="fas fa-times-circle"></i> UNPAID
            </span>
        @endif
    @endif
</td>
                                <td class="date-cell">
                                    <div class="date-day">{{ $booking->created_at->format('d') }}</div>
                                    <div class="date-month">{{ $booking->created_at->format('M Y') }}</div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('bookings.show', $booking) }}" class="btn-icon btn-view"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('bookings.edit', $booking) }}" class="btn-icon btn-edit"
                                            title="Edit Booking">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this booking?')"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-icon btn-delete" title="Delete Booking">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-calendar-times"></i>
                                        </div>
                                        <h3 class="empty-title">No Bookings Found</h3>
                                        <p class="empty-description">Create your first booking to get started with the
                                            system.</p>
                                        <a href="{{ route('bookings.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>
                                            Create First Booking
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($bookings->hasPages())
                <div class="pagination">
                    @if ($bookings->onFirstPage())
                        <span class="pagination-btn disabled">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $bookings->previousPageUrl() }}" class="pagination-btn">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @for ($i = 1; $i <= $bookings->lastPage(); $i++)
                        <a href="{{ $bookings->url($i) }}"
                            class="pagination-btn {{ $bookings->currentPage() == $i ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($bookings->hasMorePages())
                        <a href="{{ $bookings->nextPageUrl() }}" class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="pagination-btn disabled">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            @endif
        </div>

        <!-- Success Toast -->
        @if (session('success'))
            <div class="toast" id="successToast">
                <div class="toast-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="toast-content">
                    <div class="toast-title">Success!</div>
                    <div class="toast-message">The mission was successfully completed</div>
                    {{-- <div class="toast-message">{{ session('success') }}</div> --}}
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <p>All Rights Reserved &copy; 2025 Fitness Club</p>
            </div>
        </div>
    </footer>

    <script  src="{{ asset('js/booking.js')}}" >
    </script>
</body>

</html>
