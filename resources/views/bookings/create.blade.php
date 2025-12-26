<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Booking</title>
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

        /* ====== Time Display Card ====== */
        .time-card {
            background: rgba(5, 193, 247, 0.05);
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 32px;
            transition: all 0.3s ease;
        }

        .time-card:hover {
            border-color: rgba(5, 193, 247, 0.3);
            box-shadow: var(--shadow-md);
        }

        .time-card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .time-card-content {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .time-card-info {
            flex: 1;
        }

        .time-card-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .time-card-title i {
            color: var(--cyan);
        }

        .time-card-description {
            color: var(--text-muted);
            font-size: 16px;
        }

        .time-display {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 20px 32px;
            text-align: center;
            border: 2px solid rgba(5, 193, 247, 0.2);
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .time-display.active {
            border-color: var(--cyan);
            box-shadow: 0 0 20px rgba(5, 193, 247, 0.4);
            background: linear-gradient(135deg, rgba(5, 193, 247, 0.1), rgba(0, 255, 136, 0.1));
        }

        .current-time {
            font-size: 32px;
            font-weight: 800;
            color: var(--cyan);
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .current-date {
            color: var(--text-muted);
            font-size: 16px;
        }

        /* ====== Form Container ====== */
        .form-container {
            background: var(--card-bg);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--card-border);
            margin-bottom: 32px;
            overflow: hidden;
        }

        .form-header {
            padding: 24px 32px;
            border-bottom: 1px solid var(--card-border);
            background: linear-gradient(90deg, var(--card-bg), var(--light-card));
        }

        .form-header-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .form-header-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-lg);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-header-icon i {
            font-size: 24px;
            color: var(--dark-bg);
        }

        .form-header-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .form-body {
            padding: 32px;
        }

        /* ====== Form Sections ====== */
        .form-section {
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

        .section-header i.fa-clock {
            color: var(--warning);
        }

        .section-header i.fa-sticky-note {
            color: #a855f7;
        }

        /* ====== Form Grid ====== */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 1024px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* ====== Form Groups ====== */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .form-label .required {
            color: var(--danger);
            margin-left: 4px;
        }

        .form-label .subtext {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 400;
            margin-left: 8px;
        }

        /* ====== Form Controls ====== */
        .form-control {
            position: relative;
            width: 100%;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            background: var(--light-card);
            border: 2px solid rgba(5, 193, 247, 0.2);
            color: var(--text-primary);
            border-radius: var(--radius-md);
            padding: 16px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(5, 193, 247, 0.2);
            background: var(--card-bg);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: var(--text-muted);
        }

        .form-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--cyan);
            pointer-events: none;
        }

        .form-input.with-icon,
        .form-select.with-icon {
            padding-left: 48px;
        }

        .form-select {
            appearance: none;
            cursor: pointer;
        }

        .select-arrow {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* ====== Autocomplete ====== */
        .autocomplete-container {
            position: relative;
            z-index: 10;
        }

        .autocomplete-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--card-bg);
            border: 1px solid rgba(5, 193, 247, 0.3);
            border-top: none;
            border-radius: 0 0 var(--radius-md) var(--radius-md);
            max-height: 300px;
            overflow-y: auto;
            z-index: 9999;
            display: none;
            box-shadow: var(--shadow-lg);
        }

        .autocomplete-result {
            padding: 12px 16px;
            cursor: pointer;
            transition: all 0.2s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .autocomplete-result:last-child {
            border-bottom: none;
        }

        .autocomplete-result:hover {
            background: rgba(5, 193, 247, 0.1);
        }

        .autocomplete-result-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .autocomplete-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-weight: 700;
            color: var(--dark-bg);
            font-size: 14px;
        }

        .autocomplete-info {
            flex: 1;
        }

        .autocomplete-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .autocomplete-email {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* ====== Selected User Display ====== */
        .selected-user {
            background: linear-gradient(90deg, var(--light-card), var(--card-bg));
            border-radius: var(--radius-md);
            padding: 16px;
            border: 1px solid var(--card-border);
            margin-top: 16px;
            display: none;
        }

        .selected-user-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .selected-user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .selected-user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--dark-bg);
            font-size: 18px;
        }

        .selected-user-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .selected-user-name {
            font-weight: 700;
            color: var(--text-primary);
            font-size: 18px;
        }

        .selected-user-email {
            font-size: 14px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .selected-user-email i {
            color: var(--cyan);
        }

        .clear-user-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 8px;
            border-radius: var(--radius-sm);
            transition: all 0.2s;
        }

        .clear-user-btn:hover {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        /* ====== Checkbox ====== */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .checkbox-container {
            position: relative;
            cursor: pointer;
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            width: 24px;
            height: 24px;
            border: 2px solid var(--cyan);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .checkbox-container input:checked+.checkmark {
            background: var(--cyan);
            border-color: var(--cyan);
        }

        .checkbox-container input:checked+.checkmark:after {
            content: '✓';
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        .checkbox-label {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .checkbox-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .checkbox-description {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* ====== Form Actions ====== */
        .form-actions {
            margin-top: 48px;
            padding-top: 32px;
            border-top: 1px solid var(--card-border);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        @media (min-width: 640px) {
            .form-actions {
                flex-direction: row;
                justify-content: flex-end;
                gap: 16px;
            }
        }

        /* ====== Help Section ====== */
        .help-section {
            background: rgba(5, 193, 247, 0.05);
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 32px;
        }

        .help-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .help-content {
                flex-direction: row;
                align-items: flex-start;
            }
        }

        .help-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-lg);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .help-icon i {
            font-size: 24px;
            color: var(--dark-bg);
        }

        .help-info {
            flex: 1;
        }

        .help-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .help-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .help-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .help-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .help-item-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--cyan), var(--emerald));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .help-item-icon i {
            font-size: 14px;
            color: var(--dark-bg);
        }

        .help-item-content {
            flex: 1;
        }

        .help-item-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .help-item-description {
            font-size: 14px;
            color: var(--text-muted);
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

        /* ====== Error Messages ====== */
        .error-message {
            color: var(--danger);
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .error-message i {
            font-size: 16px;
        }

        /* ====== Animations ====== */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 0.5s ease-in-out;
        }

        /* ====== New Styles for Coach Filtering ====== */
        .coach-filter-info {
            background: rgba(0, 255, 136, 0.05);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: var(--radius-md);
            padding: 12px 16px;
            margin-top: 8px;
            display: none;
        }

        .coach-filter-info.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        .coach-filter-info i {
            color: var(--emerald);
            margin-right: 8px;
        }

        .coach-filter-info .highlight {
            color: var(--emerald);
            font-weight: 600;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 10px;
            color: var(--cyan);
        }

        .loading-spinner i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ====== Responsive Design ====== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .form-body {
                padding: 24px;
            }

            .form-header {
                padding: 20px 24px;
            }

            .time-display {
                padding: 16px 24px;
            }

            .current-time {
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

            .form-body {
                padding: 20px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .form-actions {
                gap: 12px;
            }
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
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h1 class="page-title gradient-text">CREATE NEW BOOKING</h1>
                    <p class="page-subtitle">
                        Add a new booking to your fitness club schedule. All fields marked with
                        <span style="color: var(--danger); font-weight: bold;">*</span> are required.
                    </p>
                </header>

                <!-- Current Time Display -->
                <div class="time-card">
                    <div class="time-card-content">
                        <div class="time-card-info">
                            <h3 class="time-card-title">
                                <i class="fas fa-clock"></i>
                                CURRENT DATE & TIME
                            </h3>
                            <p class="time-card-description">
                                Booking time will be automatically set to current time
                            </p>
                        </div>
                        <div class="time-display" id="currentTimeDisplay">
                            <div class="current-time" id="currentTime">00:00:00</div>
                            <div class="current-date" id="currentDate">January 1, 2024</div>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <div class="form-container">
                    <!-- Form Header -->
                    <div class="form-header">
                        <div class="form-header-content">
                            <div class="form-header-icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h2 class="form-header-title">BOOKING INFORMATION</h2>
                        </div>
                    </div>

                    <!-- Form Body -->
                    <form action="{{ route('bookings.store') }}" method="POST" class="form-body" id="bookingForm">
                        @csrf

                        <!-- User Information Section -->
                        <div class="form-section">
                            <h3 class="section-header">
                                <i class="fas fa-user"></i>
                                USER INFORMATION
                            </h3>

                            <div class="form-grid">
                                <!-- User Selection -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">SELECT USER</span>
                                        <span class="required">*</span>
                                    </label>
                                    <div class="autocomplete-container">
                                        <div class="form-control">
                                            <i class="fas fa-search form-icon"></i>
                                            <input type="text" id="user_search" name="user_search" autocomplete="off"
                                                placeholder="Type user name or email..." class="form-input with-icon">
                                        </div>
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <div id="user_results" class="autocomplete-results"></div>
                                    </div>
                                    <div id="selected_user_display" class="selected-user">
                                        <div class="selected-user-content">
                                            <div class="selected-user-info">
                                                <div class="selected-user-avatar" id="selected_user_initials">U</div>
                                                <div class="selected-user-details">
                                                    <div class="selected-user-name" id="selected_user_name"></div>
                                                    <div class="selected-user-email">
                                                        <i class="fas fa-envelope"></i>
                                                        <span id="selected_user_email"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="clear_user" class="clear-user-btn">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('user_id')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Activity Selection -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">SELECT ACTIVITY</span>
                                        <span class="required">*</span>
                                    </label>
                                    <div class="form-control">
                                        <i class="fas fa-running form-icon"></i>
                                        <select name="activity_id" id="activity_id" required
                                            class="form-select with-icon">
                                            <option value="">-- Select an activity --</option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ $activity->id }}" data-name="{{ $activity->name }}">
                                                    {{ $activity->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down select-arrow"></i>
                                    </div>
                                    <div id="coach_filter_info" class="coach-filter-info">
                                        <i class="fas fa-info-circle"></i>
                                        <span>Only showing coaches with positions matching "<span class="highlight" id="activity_name_display"></span>"</span>
                                    </div>
                                    @error('activity_id')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Activity Information Section -->
                        <div class="form-section">
                            <h3 class="section-header">
                                <i class="fas fa-dumbbell"></i>
                                COACH & PAYMENT DETAILS
                            </h3>

                            <div class="form-grid">
                                <!-- Coach Selection -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">SELECT COACH</span>
                                        <span class="required">*</span>
                                        <span class="subtext">(Filtered by selected activity)</span>
                                    </label>
                                    <div id="coach_loading" class="loading-spinner">
                                        <i class="fas fa-spinner"></i> Loading matching coaches...
                                    </div>
                                    <div class="form-control">
                                        <i class="fas fa-user-tie form-icon"></i>
                                        <select name="employee_id" id="employee_id" required
                                            class="form-select with-icon">
                                            <option value="">-- Select an activity first --</option>
                                            <!-- Coaches will be loaded dynamically -->
                                        </select>
                                        <i class="fas fa-chevron-down select-arrow"></i>
                                    </div>
                                    @error('employee_id')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Booking Price -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">BOOKING PRICE</span>
                                        <span class="subtext">(10% of coach's salary)</span>
                                    </label>
                                    <div class="time-display" id="priceDisplay" style="margin: 0;">
                                        <div class="current-time" id="bookingPrice">$0.00</div>
                                        <div class="current-date" id="priceDescription">Select a coach to see price</div>
                                    </div>
                                    <input type="hidden" name="booking_price" id="booking_price" value="0">
                                </div>
                            </div>
                        </div>

                        <!-- Time and Payment Section -->
                        <div class="form-section">
                            <h3 class="section-header">
                                <i class="fas fa-clock"></i>
                                TIME & PAYMENT
                            </h3>

                            <div class="form-grid">
                                <!-- Booking Date -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">BOOKING DATE</span>
                                        <span class="required">*</span>
                                    </label>
                                    <div class="form-control">
                                        <i class="fas fa-calendar-day form-icon"></i>
                                        <input type="date" name="booking_date" id="booking_date" required
                                            class="form-input with-icon">
                                    </div>
                                    @error('booking_date')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Payment Status -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <span class="gradient-text" style="font-weight: 700;">PAYMENT STATUS</span>
                                    </label>
                                    <div class="checkbox-group">
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="paid" id="paid" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="checkbox-label">
                                            <span class="checkbox-title">Booking Paid</span>
                                            <span class="checkbox-description">Check if payment has been
                                                received</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i>
                                Create Booking
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Help Section -->
                <div class="help-section">
                    <div class="help-content">
                        <div class="help-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="help-info">
                            <h3 class="help-title">Booking Guidelines & Tips</h3>
                            <div class="help-grid">
                                <div class="help-item">
                                    <div class="help-item-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="help-item-content">
                                        <h4 class="help-item-title">Smart Coach Filtering</h4>
                                        <p class="help-item-description">
                                            Coaches are automatically filtered based on the selected activity
                                        </p>
                                    </div>
                                </div>
                                <div class="help-item">
                                    <div class="help-item-icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="help-item-content">
                                        <h4 class="help-item-title">Automatic Pricing</h4>
                                        <p class="help-item-description">
                                            Price is calculated as 10% of the coach's salary
                                        </p>
                                    </div>
                                </div>
                                <div class="help-item">
                                    <div class="help-item-icon">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                    <div class="help-item-content">
                                        <h4 class="help-item-title">Qualified Coaches</h4>
                                        <p class="help-item-description">
                                            Only coaches specialized in the selected activity are shown
                                        </p>
                                    </div>
                                </div>
                                <div class="help-item">
                                    <div class="help-item-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="help-item-content">
                                        <h4 class="help-item-title">Payment Status</h4>
                                        <p class="help-item-description">
                                            Mark as paid when payment is received
                                        </p>
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
        // User data from backend
        const users = [
            @foreach ($users as $user)
                {
                    id: "{{ $user->id }}",
                    name: "{{ $user->name }}",
                    email: "{{ $user->email }}",
                    phone: "{{ $user->phone ?? '' }}",
                    initials: "{{ substr($user->name, 0, 1) }}"
                },
            @endforeach
        ];

        // Coach data from backend (for initial load)
        const allCoaches = [
            @foreach ($employees as $employee)
                {
                    id: "{{ $employee->id }}",
                    name: "{{ $employee->name }}",
                    position: "{{ $employee->position }}",
                    salary: {{ $employee->salary ?? 0 }},
                    email: "{{ $employee->email ?? '' }}",
                    phone: "{{ $employee->phone ?? '' }}"
                },
            @endforeach
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Real-time clock update
            function updateCurrentTime() {
                const now = new Date();
                const timeElement = document.getElementById('currentTime');
                const dateElement = document.getElementById('currentDate');

                // Format time
                const timeString = now.toLocaleTimeString('en-US', {
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });

                // Format date
                const dateString = now.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    weekday: 'long'
                });

                // Update display
                timeElement.textContent = timeString;
                dateElement.textContent = dateString;

                // Visual feedback
                const timeDisplay = document.getElementById('currentTimeDisplay');
                timeDisplay.classList.add('pulse');
                setTimeout(() => {
                    timeDisplay.classList.remove('pulse');
                }, 500);
            }

            // Initialize time
            updateCurrentTime();
            setInterval(updateCurrentTime, 1000);

            // Enhanced autocomplete for user search
            const userSearchInput = document.getElementById('user_search');
            const userResultsContainer = document.getElementById('user_results');
            const userIdInput = document.getElementById('user_id');
            const selectedUserDisplay = document.getElementById('selected_user_display');
            const selectedUserName = document.getElementById('selected_user_name');
            const selectedUserEmail = document.getElementById('selected_user_email');
            const selectedUserInitials = document.getElementById('selected_user_initials');
            const clearUserButton = document.getElementById('clear_user');

            let searchTimeout;

            userSearchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 200);
            });

            function performSearch() {
                const query = userSearchInput.value.trim().toLowerCase();
                userResultsContainer.innerHTML = '';

                if (query.length === 0) {
                    userResultsContainer.style.display = 'none';
                    return;
                }

                // Filter users
                const filteredUsers = users.filter(user =>
                    user.name.toLowerCase().includes(query) ||
                    user.email.toLowerCase().includes(query)
                );

                if (filteredUsers.length > 0) {
                    filteredUsers.forEach(user => {
                        const resultItem = document.createElement('div');
                        resultItem.className = 'autocomplete-result';
                        resultItem.innerHTML = `
                            <div class="autocomplete-result-content">
                                <div class="autocomplete-avatar">${user.initials}</div>
                                <div class="autocomplete-info">
                                    <div class="autocomplete-name">${user.name}</div>
                                    <div class="autocomplete-email">${user.email}</div>
                                </div>
                            </div>
                        `;

                        resultItem.addEventListener('click', function() {
                            // Set selected user
                            userIdInput.value = user.id;
                            selectedUserName.textContent = user.name;
                            selectedUserEmail.textContent = user.email;
                            selectedUserInitials.textContent = user.initials;
                            selectedUserDisplay.style.display = 'block';

                            // Clear search input and hide results
                            userSearchInput.value = '';
                            userResultsContainer.style.display = 'none';

                            // Focus on next field
                            document.getElementById('activity_id').focus();
                        });

                        userResultsContainer.appendChild(resultItem);
                    });

                    userResultsContainer.style.display = 'block';
                } else {
                    const noResults = document.createElement('div');
                    noResults.className = 'autocomplete-result';
                    noResults.innerHTML = `
                        <div style="text-align: center; padding: 20px; color: var(--text-muted); font-style: italic;">
                            <i class="fas fa-search" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                            No users found matching your search
                        </div>
                    `;
                    userResultsContainer.appendChild(noResults);
                    userResultsContainer.style.display = 'block';
                }
            }

            // Clear selected user
            clearUserButton.addEventListener('click', function() {
                userIdInput.value = '';
                selectedUserDisplay.style.display = 'none';
                userSearchInput.focus();
            });

            // Close autocomplete when clicking outside
            document.addEventListener('click', function(event) {
                if (!userSearchInput.contains(event.target) && !userResultsContainer.contains(event.target)) {
                    userResultsContainer.style.display = 'none';
                }
            });

            // Activity change event - load matching coaches
            const activitySelect = document.getElementById('activity_id');
            const coachSelect = document.getElementById('employee_id');
            const coachFilterInfo = document.getElementById('coach_filter_info');
            const activityNameDisplay = document.getElementById('activity_name_display');
            const coachLoading = document.getElementById('coach_loading');
            const bookingPriceElement = document.getElementById('bookingPrice');
            const priceDescriptionElement = document.getElementById('priceDescription');
            const bookingPriceInput = document.getElementById('booking_price');

            activitySelect.addEventListener('change', function() {
                const activityId = this.value;
                const activityName = this.options[this.selectedIndex]?.dataset.name || '';
                
                // Clear previous selection
                coachSelect.innerHTML = '<option value="">-- Select a coach --</option>';
                bookingPriceElement.textContent = '$0.00';
                priceDescriptionElement.textContent = 'Select a coach to see price';
                bookingPriceInput.value = '0';
                
                if (!activityId) {
                    coachFilterInfo.classList.remove('show');
                    return;
                }

                // Show loading and filter info
                coachLoading.style.display = 'block';
                activityNameDisplay.textContent = activityName;
                coachFilterInfo.classList.add('show');

                // AJAX request to get matching coaches
                fetch(`{{ route('bookings.getCoaches') }}?activity_id=${activityId}`)
                    .then(response => response.json())
                    .then(coaches => {
                        coachLoading.style.display = 'none';
                        
                        if (coaches.length === 0) {
                            coachSelect.innerHTML = '<option value="">No matching coaches found</option>';
                            return;
                        }

                        // Populate coach select
                        coaches.forEach(coach => {
                            const option = document.createElement('option');
                            option.value = coach.id;
                            option.textContent = `${coach.name} - ${coach.position}`;
                            option.dataset.salary = coach.salary || 0;
                            coachSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        coachLoading.style.display = 'none';
                        console.error('Error loading coaches:', error);
                        coachSelect.innerHTML = '<option value="">Error loading coaches</option>';
                    });
            });

            // Coach change event - update price
            coachSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const salary = parseFloat(selectedOption?.dataset.salary) || 0;
                
                if (salary > 0) {
                    const price = salary * 0.1; // 10% of salary
                    bookingPriceElement.textContent = `$${price.toFixed(2)}`;
                    priceDescriptionElement.textContent = `10% of ${selectedOption.textContent.split(' - ')[0]}'s salary`;
                    bookingPriceInput.value = price.toFixed(2);
                    
                    // Visual feedback
                    const priceDisplay = document.getElementById('priceDisplay');
                    priceDisplay.classList.add('active');
                    setTimeout(() => {
                        priceDisplay.classList.remove('active');
                    }, 1000);
                } else {
                    bookingPriceElement.textContent = '$0.00';
                    priceDescriptionElement.textContent = 'Select a coach to see price';
                    bookingPriceInput.value = '0';
                }
            });

            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            const bookingDateInput = document.getElementById('booking_date');
            if (bookingDateInput) {
                bookingDateInput.min = today;
                bookingDateInput.value = today;
            }

            // Form validation
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function(event) {
                // Validate user selection
                if (!userIdInput.value) {
                    event.preventDefault();
                    showError('Please select a user from the list', userSearchInput);
                    return false;
                }

                // Validate activity selection
                if (!activitySelect.value) {
                    event.preventDefault();
                    showError('Please select an activity', activitySelect);
                    return false;
                }

                // Validate coach selection
                if (!coachSelect.value) {
                    event.preventDefault();
                    showError('Please select a coach', coachSelect);
                    return false;
                }

                return true;
            });

            function showError(message, element) {
                // Create temporary error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i>${message}`;

                element.parentElement.appendChild(errorDiv);

                // Remove error after 3 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 3000);
            }

            // Prevent confirmation on form submission
            let formChanged = false;
            const formInputs = document.querySelectorAll(
                '#bookingForm input, #bookingForm select, #bookingForm textarea');

            formInputs.forEach(input => {
                input.addEventListener('change', () => {
                    formChanged = true;
                });
            });

            window.addEventListener('beforeunload', function(e) {
                if (formChanged) {
                    e.preventDefault();
                    e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
                }
            });

            bookingForm.addEventListener('submit', function() {
                formChanged = false;
            });
        });

        // Activity change event - load matching coaches
// Activity change event - load matching coaches
const activitySelect = document.getElementById('activity_id');
const coachSelect = document.getElementById('employee_id');
const coachFilterInfo = document.getElementById('coach_filter_info');
const activityNameDisplay = document.getElementById('activity_name_display');
const coachLoading = document.getElementById('coach_loading');
const bookingPriceElement = document.getElementById('bookingPrice');
const priceDescriptionElement = document.getElementById('priceDescription');
const bookingPriceInput = document.getElementById('booking_price');

activitySelect.addEventListener('change', function() {
    const activityId = this.value;
    const activityName = this.options[this.selectedIndex]?.dataset.name || this.options[this.selectedIndex]?.text || '';
    
    console.log('Activity selected - ID:', activityId, 'Name:', activityName);
    
    // Clear previous selection
    coachSelect.innerHTML = '<option value="">-- Select a coach --</option>';
    bookingPriceElement.textContent = '$0.00';
    priceDescriptionElement.textContent = 'Select a coach to see price';
    bookingPriceInput.value = '0';
    
    if (!activityId) {
        coachFilterInfo.classList.remove('show');
        return;
    }

    // Show loading and filter info
    coachLoading.style.display = 'block';
    activityNameDisplay.textContent = activityName;
    coachFilterInfo.classList.add('show');
    coachFilterInfo.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Searching for matching coaches...`;

    // AJAX request to get matching coaches
    // جرب المسارات المختلفة
    const urls = [
        `{{ route('bookings.getCoaches') }}?activity_id=${activityId}`,
        `/bookings/get-coaches?activity_id=${activityId}`,
        `${window.location.origin}/bookings/get-coaches?activity_id=${activityId}`
    ];

    function tryFetch(urlIndex) {
        if (urlIndex >= urls.length) {
            // جميع المحاولات فشلت، استخدم الكوتشات المحلية
            handleFallbackCoaches(activityName);
            return;
        }

        fetch(urls[urlIndex])
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Coaches data received:', data);
                coachLoading.style.display = 'none';
                
                // معالجة البيانات
                let coaches = [];
                
                if (Array.isArray(data)) {
                    coaches = data;
                } else if (data && data.coaches) {
                    coaches = Array.isArray(data.coaches) ? data.coaches : [];
                }
                
                if (coaches.length === 0) {
                    coachSelect.innerHTML = '<option value="">No matching coaches found</option>';
                    coachFilterInfo.innerHTML = `
                        <i class="fas fa-info-circle"></i>
                        <span>No coaches found for "<span class="highlight">${activityName}</span>"</span>
                    `;
                    return;
                }

                // Populate coach select
                coaches.forEach(coach => {
                    const option = document.createElement('option');
                    option.value = coach.id;
                    const salary = coach.salary || 0;
                    const position = coach.position || 'Coach';
                    option.textContent = `${coach.name} - ${position}`;
                    option.dataset.salary = salary;
                    coachSelect.appendChild(option);
                });
                
                // Update filter info
                coachFilterInfo.innerHTML = `
                    <i class="fas fa-check-circle"></i>
                    <span>Found <span class="highlight">${coaches.length}</span> coach(es) for "<span class="highlight">${activityName}</span>"</span>
                `;
            })
            .catch(error => {
                console.error(`Error with URL ${urls[urlIndex]}:`, error);
                // جرب المسار التالي
                tryFetch(urlIndex + 1);
            });
    }

    // بدأ المحاولة الأولى
    tryFetch(0);
});

// دالة لاستخدام الكوتشات المحلية كبديل
function handleFallbackCoaches(activityName) {
    console.log('Using fallback coaches');
    coachLoading.style.display = 'none';
    
    // فلترة الكوتشات محلياً بناءً على النشاط
    const activityLower = activityName.toLowerCase();
    const filteredCoaches = allCoaches.filter(coach => {
        const position = coach.position ? coach.position.toLowerCase() : '';
        
        // تحقق من وجود كلمات النشاط في الـ position
        const activityWords = activityLower.split(' ');
        for (const word of activityWords) {
            if (word.length > 3 && position.includes(word)) {
                return true;
            }
        }
        
        // تحقق من المرادفات
        if (activityLower.includes('swim') && (position.includes('swim') || position.includes('aqua') || position.includes('water'))) {
            return true;
        }
        
        if ((activityLower.includes('gym') || activityLower.includes('fitness')) && 
            (position.includes('gym') || position.includes('fitness') || position.includes('trainer'))) {
            return true;
        }
        
        if (activityLower.includes('yoga') && (position.includes('yoga') || position.includes('meditation'))) {
            return true;
        }
        
        return false;
    });
    
    const coachesToShow = filteredCoaches.length > 0 ? filteredCoaches : allCoaches;
    
    // تعبئة القائمة
    coachesToShow.forEach(coach => {
        const option = document.createElement('option');
        option.value = coach.id;
        const salary = coach.salary || 0;
        const position = coach.position || 'Coach';
        option.textContent = `${coach.name} - ${position}`;
        option.dataset.salary = salary;
        coachSelect.appendChild(option);
    });
    
    // تحديث معلومات الفلترة
    if (filteredCoaches.length > 0) {
        coachFilterInfo.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>Found <span class="highlight">${filteredCoaches.length}</span> coach(es) for "<span class="highlight">${activityName}</span>"</span>
        `;
    } else {
        coachFilterInfo.innerHTML = `
            <i class="fas fa-info-circle"></i>
            <span>Showing all <span class="highlight">${allCoaches.length}</span> available coaches</span>
        `;
    }
}

// Coach change event - update price
coachSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const salary = parseFloat(selectedOption?.dataset.salary) || 0;
    
    if (salary > 0) {
        const price = salary * 0.1; // 10% of salary
        bookingPriceElement.textContent = `$${price.toFixed(2)}`;
        const coachName = selectedOption.textContent.split(' - ')[0];
        priceDescriptionElement.textContent = `10% of ${coachName}'s salary`;
        bookingPriceInput.value = price.toFixed(2);
        
        // Visual feedback
        const priceDisplay = document.getElementById('priceDisplay');
        priceDisplay.classList.add('active');
        setTimeout(() => {
            priceDisplay.classList.remove('active');
        }, 1000);
    } else {
        bookingPriceElement.textContent = '$0.00';
        priceDescriptionElement.textContent = 'Select a coach to see price';
        bookingPriceInput.value = '0';
    }
});

// بقية الكود كما هو تماماً...
    </script>
</body>

</html>