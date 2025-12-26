<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/showBooking.css') }}">
    <title>Booking Details - Fitness Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">
        <!-- Main Content -->
        <main>
            <div class="container">
                <!-- Page Header -->
                <header class="page-header">
                    <div class="header-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h1 class="page-title gradient-text">BOOKING DETAILS</h1>
                    <p class="page-subtitle">
                        View complete information about this fitness club booking
                    </p>
                </header>

                <!-- Booking ID Card -->
                <div class="booking-id-card">
                    <div class="booking-id-content">
                        <div class="booking-id-info">
                            <h3 class="booking-id-title">
                                <i class="fas fa-hashtag"></i>
                                BOOKING REFERENCE
                            </h3>
                            <p class="booking-id-description">
                                Unique identifier for this booking session
                            </p>
                        </div>
                        <div class="booking-id-display">
                            <div class="booking-id">#{{ $booking->id }}</div>
                            <div class="booking-date">
                                Created: {{ $booking->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details Container -->
                <div class="details-container">
                    <!-- Details Header -->
                    <div class="details-header">
                        <div class="details-header-content">
                            <div class="details-header-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h2 class="details-header-title">BOOKING INFORMATION</h2>
                        </div>
                    </div>

                    <!-- Details Body -->
                    <div class="details-body">
                        <!-- User Information Section -->
                        <div class="details-section">
                            <h3 class="section-header">
                                <i class="fas fa-user"></i>
                                USER INFORMATION
                            </h3>

                            <div class="details-grid">
                                <!-- User Avatar Card -->
                                <div class="user-avatar-card">
                                    <div class="user-avatar">
                                        @php
                                            $user = $booking->user;
                                            $imagePath = null;

                                            if ($user && $user->image) {
                                                // تحقق من جميع الاحتمالات
                                                $possiblePaths = [
                                                    'images/users/' . $user->image,
                                                    'images/' . $user->image,
                                                    'storage/images/users/' . $user->image,
                                                    $user->image, // إذا كان المسار كامل
                                                ];

                                                foreach ($possiblePaths as $path) {
                                                    if (file_exists(public_path($path))) {
                                                        $imagePath = asset($path);
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp

                                        @if ($imagePath)
                                            <img style="width: 120px; hei" src="{{ $imagePath }}" alt="{{ $user->name ?? 'User' }}"
                                                class="avatar-image">
                                        @else
                                            {{ substr($user->name ?? 'U', 0, 1) }}
                                        @endif
                                    </div>
                                    <h3 class="user-name">{{ $booking->user->name }}</h3>
                                    <div class="user-email">
                                        <i class="fas fa-envelope"></i>
                                        {{ $booking->user->email }}
                                    </div>
                                    <div class="user-contact">
                                        @if ($booking->user->phone)
                                            <div class="contact-item">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $booking->user->phone }}</span>
                                            </div>
                                        @endif
                                        <div class="contact-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Member since {{ $booking->user->created_at->format('M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- User Details Card -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <h4 class="info-card-title">USER DETAILS</h4>
                                    </div>
                                    <div class="info-card-body">
                                        <div class="info-item">
                                            <span class="info-label">Full Name:</span>
                                            <span class="info-value highlight">{{ $booking->user->name }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Email:</span>
                                            <span class="info-value">{{ $booking->user->email }}</span>
                                        </div>
                                        @if ($booking->user->phone)
                                            <div class="info-item">
                                                <span class="info-label">Phone:</span>
                                                <span class="info-value">{{ $booking->user->phone }}</span>
                                            </div>
                                        @endif
                                        <div class="info-item">
                                            <span class="info-label">Birth Date:</span>
                                            <span class="info-value">
                                                @if ($booking->user->birth_date)
                                                    {{ \Carbon\Carbon::parse($booking->user->birth_date)->format('F d, Y') }}
                                                    <span
                                                        style="color: var(--text-muted); font-size: 12px; margin-left: 8px;">
                                                        ({{ \Carbon\Carbon::parse($booking->user->birth_date)->age }}
                                                        years old)
                                                    </span>
                                                @else
                                                    <span style="color: var(--text-muted); font-style: italic;">Not
                                                        specified</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Total Bookings:</span>
                                            <span class="info-value">
                                                {{ $booking->user->bookings->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity & Coach Section -->
                        <div class="details-section">
                            <h3 class="section-header">
                                <i class="fas fa-dumbbell"></i>
                                ACTIVITY & COACH DETAILS
                            </h3>

                            <div class="details-grid">
                                <!-- Activity Information -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-running"></i>
                                        </div>
                                        <h4 class="info-card-title">ACTIVITY</h4>
                                    </div>
                                    <div class="info-card-body">
                                        <div class="info-item">
                                            <span class="info-label">Activity:</span>
                                            <span class="info-value highlight">{{ $booking->activity->name }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Category:</span>
                                            <span class="info-value">
                                                @php
                                                    $activityName = strtolower($booking->activity->name);
                                                    if (str_contains($activityName, 'swim')) {
                                                        echo 'Aquatic';
                                                    } elseif (str_contains($activityName, 'yoga')) {
                                                        echo 'Mind & Body';
                                                    } elseif (str_contains($activityName, 'gym')) {
                                                        echo 'Fitness';
                                                    } else {
                                                        echo 'General';
                                                    }
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Activity ID:</span>
                                            <span class="info-value">#{{ $booking->activity->id }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Duration:</span>
                                            <span class="info-value">60 minutes</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Difficulty:</span>
                                            <span class="info-value">Intermediate</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Coach Information -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <h4 class="info-card-title">COACH</h4>
                                    </div>
                                    <div class="info-card-body">
                                        <div class="info-item">
                                            <span class="info-label">Coach Name:</span>
                                            <span class="info-value highlight">{{ $booking->employee->name }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Position:</span>
                                            <span class="info-value">{{ $booking->employee->position }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Coach ID:</span>
                                            <span class="info-value">#{{ $booking->employee->id }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Experience:</span>
                                            <span class="info-value">5+ years</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Specialization:</span>
                                            <span class="info-value">
                                                @php
                                                    $position = strtolower($booking->employee->position);
                                                    if (str_contains($position, 'swim')) {
                                                        echo 'Swimming';
                                                    } elseif (str_contains($position, 'yoga')) {
                                                        echo 'Yoga & Meditation';
                                                    } elseif (str_contains($position, 'gym')) {
                                                        echo 'Fitness Training';
                                                    } else {
                                                        echo 'General Training';
                                                    }
                                                @endphp
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Compatibility Info -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-handshake"></i>
                                        </div>
                                        <h4 class="info-card-title">COMPATIBILITY</h4>
                                    </div>
                                    <div class="info-card-body">
                                        @php
                                            $activityName = strtolower($booking->activity->name);
                                            $position = strtolower($booking->employee->position);
                                            $isMatch = false;

                                            // Check for matching keywords
                                            $keywords = [
                                                'swim',
                                                'yoga',
                                                'gym',
                                                'fitness',
                                                'train',
                                                'cardio',
                                                'box',
                                                'dance',
                                            ];
                                            foreach ($keywords as $keyword) {
                                                if (
                                                    str_contains($activityName, $keyword) &&
                                                    str_contains($position, $keyword)
                                                ) {
                                                    $isMatch = true;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        <div class="info-item">
                                            <span class="info-label">Match Status:</span>
                                            <span class="info-value {{ $isMatch ? 'success' : 'warning' }}">
                                                {{ $isMatch ? 'Perfect Match' : 'General Match' }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Activity:</span>
                                            <span class="info-value">{{ $booking->activity->name }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Coach Specialty:</span>
                                            <span class="info-value">{{ $booking->employee->position }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Match Score:</span>
                                            <span class="info-value {{ $isMatch ? 'success' : 'warning' }}">
                                                {{ $isMatch ? '100%' : '75%' }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Recommendation:</span>
                                            <span class="info-value {{ $isMatch ? 'success' : 'warning' }}">
                                                {{ $isMatch ? 'Highly Recommended' : 'Suitable' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Details Section -->
                        <div class="details-section">
                            <h3 class="section-header">
                                <i class="fas fa-clock"></i>
                                BOOKING & PAYMENT DETAILS
                            </h3>

                            <div class="details-grid">
                                <!-- Time & Date -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <h4 class="info-card-title">TIME & DATE</h4>
                                    </div>
                                    <div class="info-card-body">
                                        <div class="info-item">
                                            <span class="info-label">Booking Date:</span>
                                            <span class="info-value highlight">
                                                {{ $booking->created_at->format('F d, Y') }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Booking Time:</span>
                                            <span class="info-value">
                                                {{ $booking->created_at->format('h:i A') }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Day of Week:</span>
                                            <span class="info-value">
                                                {{ $booking->created_at->format('l') }}
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Session Time:</span>
                                            <span class="info-value">10:00 AM - 11:00 AM</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Duration:</span>
                                            <span class="info-value">60 minutes</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Information -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <h4 class="info-card-title">PAYMENT</h4>
                                    </div>
                                    <div class="info-card-body">
                                        @php
                                            $bookingPrice = $booking->employee->salary * 0.1;
                                        @endphp
                                        <div class="info-item">
                                            <span class="info-label">Status:</span>
                                            <span class="info-value">
                                                @if ($booking->paid)
                                                    <span class="status-badge paid">
                                                        <i class="fas fa-check-circle"></i> PAID
                                                    </span>
                                                @else
                                                    <span class="status-badge unpaid">
                                                        <i class="fas fa-clock"></i> UNPAID
                                                    </span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Amount:</span>
                                            <span
                                                class="info-value highlight">${{ number_format($bookingPrice, 2) }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Calculation:</span>
                                            <span class="info-value">10% of coach salary</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Coach Salary:</span>
                                            <span
                                                class="info-value">${{ number_format($booking->employee->salary, 2) }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Payment Method:</span>
                                            <span class="info-value">Credit Card</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- System Information -->
                                <div class="info-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon">
                                            <i class="fas fa-cogs"></i>
                                        </div>
                                        <h4 class="info-card-title">SYSTEM INFO</h4>
                                    </div>
                                    <div class="info-card-body">
                                        <div class="info-item">
                                            <span class="info-label">Booking ID:</span>
                                            <span class="info-value">#{{ $booking->id }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Created:</span>
                                            <span
                                                class="info-value">{{ $booking->created_at->format('M d, Y h:i A') }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Last Updated:</span>
                                            <span
                                                class="info-value">{{ $booking->updated_at->format('M d, Y h:i A') }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Status:</span>
                                            <span class="info-value">
                                                <span class="status-badge active">
                                                    <i class="fas fa-circle"></i> ACTIVE
                                                </span>
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Reference:</span>
                                            <span
                                                class="info-value">BK-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <div class="action-group">
                                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i>
                                    Back to List
                                </a>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit Booking
                                </a>
                            </div>
                            <div class="action-group">
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                    id="deleteForm" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete()" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Delete Booking
                                    </button>
                                </form>
                                <a href="{{ route('bookings.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    New Booking
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="stats-section">
                    <div class="stats-content">
                        <div class="stats-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stats-info">
                            <h3 class="stats-title">BOOKING STATISTICS</h3>
                            <div class="stats-grid">
                                <div class="stats-item">
                                    <div class="stats-item-icon">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                    <div class="stats-item-content">
                                        <div class="stats-item-title">User's Total Bookings</div>
                                        <div class="stats-item-value">{{ $booking->user->bookings->count() }}</div>
                                    </div>
                                </div>
                                <div class="stats-item">
                                    <div class="stats-item-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="stats-item-content">
                                        <div class="stats-item-title">This Month</div>
                                        <div class="stats-item-value">
                                            {{ $booking->user->bookings->where('created_at', '>=', now()->startOfMonth())->count() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="stats-item">
                                    <div class="stats-item-icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="stats-item-content">
                                        <div class="stats-item-title">Coach's Rate</div>
                                        <div class="stats-item-value">${{ number_format($bookingPrice, 2) }}</div>
                                    </div>
                                </div>
                                <div class="stats-item">
                                    <div class="stats-item-icon">
                                        <i class="fas fa-percentage"></i>
                                    </div>
                                    <div class="stats-item-content">
                                        <div class="stats-item-title">Commission Rate</div>
                                        <div class="stats-item-value">10%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="page-footer">
            <div class="container">
                <div class="footer-content">
                    <p>All Rights Reserved &copy; 2025 Fitness Club Management System</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
          // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Escape key to go back
            if (e.key === 'Escape') {
                window.location.href = '{{ route('bookings.index') }}';
            }

            // Ctrl+E to edit
            if (e.ctrlKey && e.key === 'e') {
                e.preventDefault();
                window.location.href = '{{ route('bookings.edit', $booking->id) }}';
            }

            // Ctrl+N for new booking
            if (e.ctrlKey && e.key === 'n') {
                e.preventDefault();
                window.location.href = '{{ route('bookings.create') }}';
            }
        });
    </script>
</body>

</html>
