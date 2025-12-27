<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Details - {{ $activity->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #11182a;
            --primary-dark-light: #1a2442;
            --primary-dark-lighter: #243055;
            --accent-gradient: linear-gradient(135deg, #05C1F7, #00ff88);
            --text-primary: #ffffff;
            --text-secondary: #b0b7d0;
            --card-bg: rgba(23, 30, 50, 0.9);
            --border-color: rgba(5, 193, 247, 0.2);
            --success-color: #00ff88;
            --danger-color: #ff4757;
            --warning-color: #ffc107;
            --card-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #10182a !important;
            min-height: 100vh;
            padding: 20px;
            color: var(--text-primary);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: var(--card-bg);
            border-radius: 15px;
            border: 1px solid var(--border-color);
            box-shadow: var(--card-shadow);
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .h1 {
            background: var(--accent-gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            font-size: 2rem;
            font-weight: 700;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: var(--accent-gradient);
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(5, 193, 247, 0.3);
        }

        .alert {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--success-color);
            color: var(--success-color);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid var(--border-color);
            text-align: center;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.present {
            border-top: 4px solid var(--success-color);
        }

        .stat-card.absent {
            border-top: 4px solid var(--danger-color);
        }

        .stat-card.total {
            border-top: 4px solid #05C1F7;
        }

        .stat-card.not-registered {
            border-top: 4px solid var(--warning-color);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
        }

        .present .stat-number {
            color: var(--success-color);
        }

        .absent .stat-number {
            color: var(--danger-color);
        }

        .total .stat-number {
            color: #05C1F7;
        }

        .not-registered .stat-number {
            color: var(--warning-color);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .tabs-container {
            background: var(--card-bg);
            border-radius: 15px;
            border: 1px solid var(--border-color);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .tabs-header {
            display: flex;
            background: rgba(5, 193, 247, 0.1);
            border-bottom: 1px solid var(--border-color);
        }

        .tab-btn {
            flex: 1;
            padding: 20px;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .tab-btn:hover {
            background: rgba(5, 193, 247, 0.2);
            color: var(--text-primary);
        }

        .tab-btn.active {
            background: var(--accent-gradient);
            color: var(--primary-dark);
        }

        .tab-content {
            padding: 30px;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .attendance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }

        .attendance-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
        }

        .attendance-card:hover {
            border-color: var(--border-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .attendance-card.present {
            border-left: 4px solid var(--success-color);
        }

        .attendance-card.absent {
            border-left: 4px solid var(--danger-color);
        }

        .attendance-card.not-registered {
            border-left: 4px solid var(--warning-color);
            opacity: 0.7;
        }

        .user-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: var(--accent-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
            font-size: 1.2rem;
        }

        .user-info h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .user-info p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .present .status-badge {
            background: rgba(0, 255, 136, 0.2);
            color: var(--success-color);
        }

        .absent .status-badge {
            background: rgba(255, 71, 87, 0.2);
            color: var(--danger-color);
        }

        .not-registered .status-badge {
            background: rgba(255, 193, 7, 0.2);
            color: var(--warning-color);
        }

        .attendance-details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .detail-label {
            color: var(--text-secondary);
        }

        .detail-value {
            color: var(--text-primary);
            font-weight: 500;
        }

        .status-toggle {
            position: relative;
            width: 60px;
            height: 30px;
            background: rgba(255, 71, 87, 0.2);
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 71, 87, 0.3);
        }

        .status-toggle.present {
            background: rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .status-toggle::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: var(--danger-color);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .status-toggle.present::after {
            left: calc(100% - 23px);
            background: var(--success-color);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-update {
            background: rgba(5, 193, 247, 0.2);
            color: #05C1F7;
            border: 1px solid rgba(5, 193, 247, 0.3);
        }

        .btn-update:hover {
            background: rgba(5, 193, 247, 0.3);
        }

        .btn-add {
            background: rgba(0, 255, 136, 0.2);
            color: var(--success-color);
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        .btn-add:hover {
            background: rgba(0, 255, 136, 0.3);
        }

        .btn-delete {
            background: rgba(255, 71, 87, 0.2);
            color: var(--danger-color);
            border: 1px solid rgba(255, 71, 87, 0.3);
        }

        .btn-delete:hover {
            background: rgba(255, 71, 87, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--border-color);
        }

        .day-section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .day-section:last-child {
            border-bottom: none;
        }

        .day-header {
            background: rgba(5, 193, 247, 0.1);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .day-header h3 {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .day-count {
            background: var(--accent-gradient);
            color: var(--primary-dark);
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .tabs-header {
                flex-direction: column;
            }

            .tab-btn {
                width: 100%;
            }

            .attendance-grid {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <i class="fas fa-calendar-check fa-2x"
                    style="background: var(--accent-gradient); -webkit-background-clip: text; background-clip: text; color: transparent;"></i>
                <div>
                    <h1 class="h1">Attendance Details</h1>
                    <p style="color: var(--text-secondary);">{{ $activity->name }}</p>
                </div>
            </div>
            <a href="{{ route('attendees.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to List
            </a>
        </div>

        @if (session('success'))
            <div class="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="stats-container">
            <div class="stat-card present">
                <i class="fas fa-check-circle fa-2x" style="color: var(--success-color);"></i>
                <div class="stat-number">{{ $presentCount }}</div>
                <div class="stat-label">Present</div>
            </div>
            <div class="stat-card absent">
                <i class="fas fa-times-circle fa-2x" style="color: var(--danger-color);"></i>
                <div class="stat-number">{{ $absentCount }}</div>
                <div class="stat-label">Absent</div>
            </div>
            <div class="stat-card total">
                <i class="fas fa-users fa-2x" style="color: #05C1F7;"></i>
                <div class="stat-number">{{ $presentCount + $absentCount }}</div>
                <div class="stat-label">Total Attendance</div>
            </div>
            <div class="stat-card not-registered">
                <i class="fas fa-user-clock fa-2x" style="color: var(--warning-color);"></i>
                <div class="stat-number">{{ $notRegisteredCount ?? 0 }}</div>
                <div class="stat-label">Not Registered</div>
            </div>
        </div>

        <!-- Tabs for Different Views -->
        <div class="tabs-container">
            <div class="tabs-header">
                <button class="tab-btn active" onclick="switchTab('all-participants')">
                    <i class="fas fa-users"></i>
                    All Participants
                </button>
                <button class="tab-btn" onclick="switchTab('attendance-by-date')">
                    <i class="fas fa-calendar-day"></i>
                    By Date
                </button>
                <button class="tab-btn" onclick="switchTab('not-registered')">
                    <i class="fas fa-user-plus"></i>
                    Add Missing
                </button>
            </div>

            <div class="tab-content">
                <!-- Tab 1: All Participants -->
                <div id="all-participants" class="tab-pane active">
                    <div class="attendance-grid">
                        @php
                            $today = now()->format('Y-m-d');
                            $todayAttendances = \App\Models\Attendee::whereHas('booking', function ($query) use (
                                $activity,
                            ) {
                                $query->where('activity_id', $activity->id);
                            })
                                ->whereDate('created_at', $today)
                                ->with('booking.user')
                                ->get();

                            $allParticipants = collect();
                            $registeredUserIds = $todayAttendances->pluck('booking.user_id')->unique();

                            foreach ($todayAttendances as $attendance) {
                                $allParticipants->push([
                                    'type' => 'attendance',
                                    'data' => $attendance,
                                    'user' => $attendance->booking->user,
                                    'status' => $attendance->status,
                                    'date' => $attendance->created_at->format('Y-m-d'),
                                    'unique_key' => $attendance->booking->user_id . '_' . $today,
                                    'attendee_id' => $attendance->id,
                                    'created_at' => $attendance->created_at,
                                    'updated_at' => $attendance->updated_at,
                                ]);
                            }

                            foreach ($activity->bookings as $booking) {
                                if (!$registeredUserIds->contains($booking->user_id)) {
                                    $allParticipants->push([
                                        'type' => 'not_registered',
                                        'user' => $booking->user,
                                        'booking' => $booking,
                                        'status' => null,
                                        'unique_key' => $booking->user_id . '_' . $today,
                                        'booking_id' => $booking->id,
                                    ]);
                                }
                            }

                            $allParticipants = $allParticipants->unique('unique_key');
                        @endphp

                        @foreach ($allParticipants as $participant)
                            <div class="attendance-card {{ $participant['status'] ? 'present' : ($participant['status'] === 0 ? 'absent' : 'not-registered') }}"
                                id="card-{{ $participant['type'] === 'attendance' ? 'att-' . $participant['attendee_id'] : 'book-' . $participant['booking_id'] }}">
                                <div class="status-badge"
                                    id="badge-{{ $participant['type'] === 'attendance' ? 'att-' . $participant['attendee_id'] : 'book-' . $participant['booking_id'] }}">
                                    @if ($participant['type'] === 'attendance')
                                        {{ $participant['status'] ? 'Present' : 'Absent' }}
                                    @else
                                        Not Registered
                                    @endif
                                </div>

                                <div class="user-header">
                                    <div class="user-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="user-info">
                                        <h3>{{ $participant['user']->name }}</h3>
                                        <p>{{ $participant['user']->email }}</p>
                                        @if ($participant['user']->phone)
                                            <p><i class="fas fa-phone"></i> {{ $participant['user']->phone }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="attendance-details">
                                    @if ($participant['type'] === 'attendance')
                                        <div class="detail-row">
                                            <span class="detail-label">Date:</span>
                                            <span
                                                class="detail-value">{{ \Carbon\Carbon::parse($participant['date'])->format('M d, Y') }}</span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">Last Updated:</span>
                                            <span class="detail-value" id="time-{{ $participant['attendee_id'] }}">
                                                {{ \Carbon\Carbon::parse($participant['updated_at'])->format('h:i A') }}
                                            </span>
                                        </div>

                                        <div class="action-buttons">
                                            <button class="btn btn-update"
                                                onclick="updateStatus({{ $participant['attendee_id'] }}, {{ $participant['status'] ? 0 : 1 }}, this)"
                                                id="btn-{{ $participant['attendee_id'] }}">
                                                <i class="fas fa-sync"></i>
                                                Change to {{ $participant['status'] ? 'Absent' : 'Present' }}
                                            </button>
                                        </div>
                                    @else
                                        <div class="detail-row">
                                            <span class="detail-label">Status:</span>
                                            <span class="detail-value">No attendance recorded</span>
                                        </div>

                                        <div class="action-buttons">
                                            <button class="btn btn-add"
                                                onclick="registerAttendance({{ $participant['booking_id'] }})">
                                                <i class="fas fa-plus"></i>
                                                Register Attendance
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tab 2: Attendance by Date -->
                <div id="attendance-by-date" class="tab-pane">
                    @if ($attendances->count() > 0)
                        @foreach ($attendances as $date => $dayAttendances)
                            <div class="day-section">
                                <div class="day-header">
                                    <h3>
                                        <i class="fas fa-calendar-day"></i>
                                        {{ \Carbon\Carbon::parse($date)->format('l, F d, Y') }}
                                    </h3>
                                    <span
                                        class="day-count">{{ count(collect($dayAttendances)->unique('booking.user_id')) }}
                                        unique records</span>
                                </div>

                                <div class="attendance-grid">
                                    @php
                                        $uniqueAttendances = collect($dayAttendances)->unique('booking.user_id');
                                    @endphp

                                    @foreach ($uniqueAttendances as $attendance)
                                        <div class="attendance-card {{ $attendance->status ? 'present' : 'absent' }}"
                                            id="date-card-{{ $attendance->id }}">
                                            <div class="status-badge" id="date-badge-{{ $attendance->id }}">
                                                {{ $attendance->status ? 'Present' : 'Absent' }}
                                            </div>

                                            <div class="user-header">
                                                <div class="user-avatar">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="user-info">
                                                    <h3>{{ $attendance->booking->user->name }}</h3>
                                                    <p>{{ $attendance->booking->user->email }}</p>
                                                </div>
                                            </div>

                                            <div class="attendance-details">
                                                <div class="detail-row">
                                                    <span class="detail-label">Registered at:</span>
                                                    <span
                                                        class="detail-value">{{ $attendance->created_at->format('h:i A') }}</span>
                                                </div>
                                                <div class="detail-row">
                                                    <span class="detail-label">Last updated:</span>
                                                    <span class="detail-value" id="date-time-{{ $attendance->id }}">
                                                        {{ $attendance->updated_at->format('h:i A') }}
                                                    </span>
                                                </div>

                                                <div class="action-buttons">
                                                    <button class="btn btn-update"
                                                        onclick="updateStatus({{ $attendance->id }}, {{ $attendance->status ? 0 : 1 }}, this)"
                                                        id="date-btn-{{ $attendance->id }}">
                                                        <i class="fas fa-sync"></i>
                                                        Change to {{ $attendance->status ? 'Absent' : 'Present' }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <h3>No Attendance Records</h3>
                            <p>No attendance has been recorded for this activity yet.</p>
                        </div>
                    @endif
                </div>

                <!-- Tab 3: Not Registered Participants -->
                <div id="not-registered" class="tab-pane">
                    <div class="attendance-grid">
                        @php
                            $today = now()->format('Y-m-d');
                            $todayRegisteredUserIds = \App\Models\Attendee::whereHas('booking', function ($query) use (
                                $activity,
                            ) {
                                $query->where('activity_id', $activity->id);
                            })
                                ->whereDate('created_at', $today)
                                ->get()
                                ->pluck('booking.user_id')
                                ->unique();

                            $notRegistered = $activity->bookings->filter(function ($booking) use (
                                $todayRegisteredUserIds,
                            ) {
                                return !$todayRegisteredUserIds->contains($booking->user_id);
                            });
                        @endphp

                        @if ($notRegistered->count() > 0)
                            @foreach ($notRegistered as $booking)
                                <div class="attendance-card not-registered">
                                    <div class="status-badge">Not Registered</div>

                                    <div class="user-header">
                                        <div class="user-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="user-info">
                                            <h3>{{ $booking->user->name }}</h3>
                                            <p>{{ $booking->user->email }}</p>
                                            @if ($booking->user->phone)
                                                <p><i class="fas fa-phone"></i> {{ $booking->user->phone }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="attendance-details">
                                        <div class="detail-row">
                                            <span class="detail-label">Booking Date:</span>
                                            <span
                                                class="detail-value">{{ $booking->created_at->format('M d, Y') }}</span>
                                        </div>

                                        <div class="action-buttons">
                                            <button class="btn btn-add"
                                                onclick="registerAttendance({{ $booking->id }})">
                                                <i class="fas fa-plus"></i>
                                                Register as Present
                                            </button>
                                            <button class="btn btn-add"
                                                onclick="registerAttendance({{ $booking->id }}, 0)"
                                                style="background: rgba(255, 71, 87, 0.2); color: var(--danger-color); border-color: rgba(255, 71, 87, 0.3);">
                                                <i class="fas fa-minus"></i>
                                                Register as Absent
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="empty-state">
                                <i class="fas fa-check-circle"></i>
                                <h3>All Participants Registered</h3>
                                <p>All participants who have bookings are already registered for attendance.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });

            document.querySelector(`button[onclick="switchTab('${tabId}')"]`).classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        async function updateStatus(attendeeId, newStatus, buttonElement) {
            try {
                // إضافة loading indicator
                const swalInstance = Swal.fire({
                    title: 'Updating Status...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                const response = await fetch(`/attendees/${attendeeId}/update-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                });

                const data = await response.json();

                await swalInstance.close();

                if (data.success) {
                    // استخدم الوقت من الخادم بدلاً من الوقت المحلي
                    const serverTime = data.updated_time || new Date().toLocaleTimeString('en-US', {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    });

                    // تحديث كل العناصر ذات الصلة
                    // 1. تحديث الوقت في قسم All Participants
                    const timeElement = document.getElementById(`time-${attendeeId}`);
                    if (timeElement) {
                        timeElement.textContent = serverTime;
                    }

                    // 2. تحديث الوقت في قسم By Date
                    const dateTimeElement = document.getElementById(`date-time-${attendeeId}`);
                    if (dateTimeElement) {
                        dateTimeElement.textContent = serverTime;
                    }

                    // 3. تحديث النص على الزر
                    if (buttonElement) {
                        const buttonText = newStatus ? 'Absent' : 'Present';
                        buttonElement.innerHTML = `<i class="fas fa-sync"></i> Change to ${buttonText}`;
                        // تحديث event handler للزر
                        buttonElement.setAttribute('onclick',
                        `updateStatus(${attendeeId}, ${newStatus ? 0 : 1}, this)`);
                    }

                    // 4. تحديث الـ badges
                    const badge = document.getElementById(`badge-att-${attendeeId}`);
                    const dateBadge = document.getElementById(`date-badge-${attendeeId}`);

                    if (badge) {
                        badge.textContent = newStatus ? 'Present' : 'Absent';
                        badge.style.background = newStatus ? 'rgba(0, 255, 136, 0.2)' : 'rgba(255, 71, 87, 0.2)';
                        badge.style.color = newStatus ? 'var(--success-color)' : 'var(--danger-color)';
                    }

                    if (dateBadge) {
                        dateBadge.textContent = newStatus ? 'Present' : 'Absent';
                        dateBadge.style.background = newStatus ? 'rgba(0, 255, 136, 0.2)' : 'rgba(255, 71, 87, 0.2)';
                        dateBadge.style.color = newStatus ? 'var(--success-color)' : 'var(--danger-color)';
                    }

                    // 5. تحديث الكاردات
                    const card = document.getElementById(`card-att-${attendeeId}`);
                    const dateCard = document.getElementById(`date-card-${attendeeId}`);

                    if (card) {
                        card.classList.remove('present', 'absent');
                        card.classList.add(newStatus ? 'present' : 'absent');
                        card.style.borderLeftColor = newStatus ? 'var(--success-color)' : 'var(--danger-color)';
                    }

                    if (dateCard) {
                        dateCard.classList.remove('present', 'absent');
                        dateCard.classList.add(newStatus ? 'present' : 'absent');
                        dateCard.style.borderLeftColor = newStatus ? 'var(--success-color)' : 'var(--danger-color)';
                    }

                    // 6. إظهار رسالة النجاح
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                        background: 'var(--card-bg)',
                        color: 'var(--text-primary)',
                        iconColor: '#00ff88'
                    });

                    // 7. لا تقم بعمل reload - كل شيء تم تحديثه ديناميكياً
                    // إزالة هذا السطر
                    // setTimeout(() => {
                    //     window.location.reload();
                    // }, 2000);

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message || 'Failed to update attendance status',
                        background: 'var(--card-bg)',
                        color: 'var(--text-primary)',
                        iconColor: '#ff4757'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update attendance status. Please try again.',
                    background: 'var(--card-bg)',
                    color: 'var(--text-primary)',
                    iconColor: '#ff4757'
                });
            }
        }

        async function registerAttendance(bookingId, status = 1) {
            try {
                const swalInstance = Swal.fire({
                    title: 'Registering Attendance...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                const response = await fetch(`/attendees/register-attendance`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        booking_id: bookingId,
                        status: status,
                        activity_id: {{ $activity->id }}
                    })
                });

                const data = await response.json();

                await swalInstance.close();

                if (data.success) {
                    let title = data.action === 'created' ? 'Attendance Registered!' : 'Attendance Updated!';
                    let iconColor = data.action === 'created' ? '#00ff88' : '#05C1F7';

                    Swal.fire({
                        icon: 'success',
                        title: title,
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                        background: 'var(--card-bg)',
                        color: 'var(--text-primary)',
                        iconColor: iconColor
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message || 'Failed to register attendance',
                        background: 'var(--card-bg)',
                        color: 'var(--text-primary)',
                        iconColor: '#ff4757'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to register attendance',
                    background: 'var(--card-bg)',
                    color: 'var(--text-primary)',
                    iconColor: '#ff4757'
                });
            }
        }
    </script>
</body>

</html>
