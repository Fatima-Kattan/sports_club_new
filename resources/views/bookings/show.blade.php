<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - Fitness Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ====== CSS Variables ====== */
        :root {
            --cyan: #05C1F7;
            --emerald: #00ff88;
            --gradient-primary: linear-gradient(135deg, var(--cyan), var(--emerald));
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --light-card: #2d3748;
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
            --danger: #ef4444;
            --warning: #f59e0b;
            --success: #10b981;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.4);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.6);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.7);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
        }

        /* ====== Reset & Base Styles ====== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, #1a202c 100%);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ====== Utility Classes ====== */
        .gradient-bg {
            background: var(--gradient-primary);
        }

        .gradient-text {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: var(--radius-lg);
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--dark-bg);
            box-shadow: 0 4px 20px rgba(5, 193, 247, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(5, 193, 247, 0.4);
        }

        .btn-secondary {
            background: var(--light-card);
            color: var(--text-primary);
            border: 1px solid var(--card-border);
        }

        .btn-secondary:hover {
            background: #374151;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        /* ====== Layout ====== */
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 32px 0;
        }

        /* ====== Header Section ====== */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: var(--radius-xl);
            background: var(--gradient-primary);
            margin-bottom: 24px;
            box-shadow: var(--shadow-lg);
        }

        .header-icon i {
            font-size: 32px;
            color: var(--dark-bg);
        }

        .page-title {
            font-size: 42px;
            font-weight: 900;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 18px;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ====== Booking ID Card ====== */
        .booking-id-card {
            background: rgba(5, 193, 247, 0.05);
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 32px;
            transition: all 0.3s ease;
        }

        .booking-id-card:hover {
            border-color: rgba(5, 193, 247, 0.3);
            box-shadow: var(--shadow-md);
        }

        .booking-id-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .booking-id-content {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .booking-id-info {
            flex: 1;
        }

        .booking-id-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .booking-id-title i {
            color: var(--cyan);
        }

        .booking-id-description {
            color: var(--text-muted);
            font-size: 16px;
        }

        .booking-id-display {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 20px 32px;
            text-align: center;
            border: 2px solid rgba(5, 193, 247, 0.2);
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .booking-id-display:hover {
            border-color: var(--cyan);
            box-shadow: 0 0 20px rgba(5, 193, 247, 0.4);
            background: linear-gradient(135deg, rgba(5, 193, 247, 0.1), rgba(0, 255, 136, 0.1));
        }

        .booking-id {
            font-size: 32px;
            font-weight: 800;
            color: var(--cyan);
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .booking-date {
            color: var(--text-muted);
            font-size: 16px;
        }

        /* ====== Details Container ====== */
        .details-container {
            background: var(--card-bg);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--card-border);
            margin-bottom: 32px;
            overflow: hidden;
        }

        .details-header {
            padding: 24px 32px;
            border-bottom: 1px solid var(--card-border);
            background: linear-gradient(90deg, var(--card-bg), var(--light-card));
        }

        .details-header-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .details-header-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-lg);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .details-header-icon i {
            font-size: 24px;
            color: var(--dark-bg);
        }

        .details-header-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .details-body {
            padding: 32px;
        }

        /* ====== Details Sections ====== */
        .details-section {
            margin-bottom: 48px;
        }

        .section-header {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-header i {
            font-size: 20px;
        }

        .section-header i.fa-user {
            color: var(--cyan);
        }

        .section-header i.fa-dumbbell {
            color: var(--emerald);
        }

        .section-header i.fa-user-tie {
            color: #a855f7;
        }

        .section-header i.fa-clock {
            color: var(--warning);
        }

        .section-header i.fa-dollar-sign {
            color: #10b981;
        }

        /* ====== Details Grid ====== */
        .details-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .details-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (min-width: 1024px) {
            .details-grid {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        /* ====== Info Card ====== */
        .info-card {
            background: var(--light-card);
            border-radius: var(--radius-lg);
            padding: 24px;
            border: 1px solid var(--card-border);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            border-color: var(--cyan);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-card-icon i {
            font-size: 20px;
            color: var(--dark-bg);
        }

        .info-card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .info-card-body {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: var(--text-secondary);
            min-width: 120px;
        }

        .info-value {
            color: var(--text-primary);
            text-align: right;
            flex: 1;
        }

        .info-value.highlight {
            color: var(--cyan);
            font-weight: 700;
        }

        .info-value.success {
            color: var(--success);
            font-weight: 700;
        }

        .info-value.warning {
            color: var(--warning);
            font-weight: 700;
        }

        .info-value.danger {
            color: var(--danger);
            font-weight: 700;
        }

        /* ====== User Avatar Card ====== */
        .user-avatar-card {
            background: linear-gradient(135deg, rgba(5, 193, 247, 0.1), rgba(0, 255, 136, 0.1));
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: var(--radius-lg);
            padding: 32px;
            text-align: center;
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 48px;
            font-weight: 700;
            color: var(--dark-bg);
            box-shadow: var(--shadow-lg);
        }

        .user-name {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .user-email {
            color: var(--text-muted);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .user-email i {
            color: var(--cyan);
        }

        .user-contact {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-secondary);
        }

        .contact-item i {
            color: var(--cyan);
            width: 20px;
        }

        /* ====== Status Badges ====== */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-badge.paid {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-badge.unpaid {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .status-badge.active {
            background: rgba(5, 193, 247, 0.1);
            color: var(--cyan);
            border: 1px solid rgba(5, 193, 247, 0.3);
        }

        .status-badge.completed {
            background: rgba(148, 163, 184, 0.1);
            color: var(--text-muted);
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        /* ====== Action Buttons ====== */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 48px;
            padding-top: 32px;
            border-top: 1px solid var(--card-border);
        }

        @media (min-width: 640px) {
            .action-buttons {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .action-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        @media (min-width: 640px) {
            .action-group {
                flex-direction: row;
                gap: 16px;
            }
        }

        /* ====== Stats Section ====== */
        .stats-section {
            background: rgba(5, 193, 247, 0.05);
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 32px;
        }

        .stats-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .stats-content {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-lg);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stats-icon i {
            font-size: 24px;
            color: var(--dark-bg);
        }

        .stats-info {
            flex: 1;
        }

        .stats-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .stats-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stats-item-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--cyan), var(--emerald));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stats-item-icon i {
            font-size: 14px;
            color: var(--dark-bg);
        }

        .stats-item-content {
            flex: 1;
        }

        .stats-item-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .stats-item-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--cyan);
        }

        /* ====== Footer ====== */
        .page-footer {
            background: var(--card-bg);
            border-top: 1px solid var(--card-border);
            padding: 24px 0;
            margin-top: 48px;
        }

        .footer-content {
            text-align: center;
            color: var(--text-muted);
            font-size: 14px;
        }

        /* ====== Responsive Design ====== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .details-body {
                padding: 24px;
            }

            .details-header {
                padding: 20px 24px;
            }

            .booking-id-display {
                padding: 16px 24px;
            }

            .booking-id {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 16px;
            }

            .page-title {
                font-size: 28px;
            }

            .details-body {
                padding: 20px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .action-buttons {
                gap: 12px;
            }
        }

        /* ====== User Avatar Image Styles ====== */
        .user-avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 48px;
            font-weight: 700;
            color: var(--dark-bg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            /* Important for image */
            position: relative;
        }

        /* Fallback for broken images */
        .user-avatar::after {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-primary);
            color: var(--dark-bg);
            font-size: 48px;
            font-weight: 700;
        }
    </style>
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
        // Delete confirmation
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this booking?\nThis action cannot be undone.')) {
                document.getElementById('deleteForm').submit();
            }
        }

        // Real-time clock update
        function updateCurrentTime() {
            const now = new Date();
            const bookingTime = new Date('{{ $booking->created_at }}');
            const timeDiff = now - bookingTime;
            const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));

            // Update time since booking
            const timeSinceElement = document.getElementById('timeSince');
            if (timeSinceElement) {
                if (daysDiff === 0) {
                    timeSinceElement.textContent = 'Today';
                } else if (daysDiff === 1) {
                    timeSinceElement.textContent = 'Yesterday';
                } else {
                    timeSinceElement.textContent = `${daysDiff} days ago`;
                }
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentTime();

            // Add hover effects to cards
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                    this.style.boxShadow = 'var(--shadow-lg)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });

            // Add click animation to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.classList.contains('btn-danger')) return;

                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });

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
