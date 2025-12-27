<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-dark: #10182a;
            --secondary-dark: #1e293b;
            --accent-start: #05C1F7;
            --accent-end: #00ff88;
            --text-primary: #e6f1ff;
            --text-secondary: #8892b0;
            --card-bg: #1e293b;
            --border-color: rgba(5, 193, 247, 0.2);
            --table-header: rgba(5, 193, 247, 0.05);
            --success-color: #00ff88;
            --danger-color: #ff4757;
            --warning-color: #ff9f43;
            --info-color: #2e86de;
        }

        body {
            background: var(--primary-dark);
            min-height: 100vh;
            padding: 20px;
            color: var(--text-primary);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .header-top {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .h1 {
            background: linear-gradient(135deg, #05C1F7, #00ff88) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            font-size: 2.4rem;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .stats-summary {
            display: flex;
            gap: 40px;
            justify-content: center;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-present .stat-icon {
            background: rgba(0, 255, 136, 0.2);
            color: var(--success-color);
        }

        .stat-absent .stat-icon {
            background: rgba(255, 71, 87, 0.2);
            color: var(--danger-color);
        }

        .stat-total .stat-icon {
            background: rgba(5, 193, 247, 0.2);
            color: var(--accent-start);
        }

        .stat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* تنسيقات جديدة لشريط البحث والأزرار */
        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .search-container {
            position: relative;
            flex: 1;
            min-width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 16px 25px 16px 55px;
            background: #121a2e;
            border: 2px solid rgba(5, 193, 247, 0.2);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-input::placeholder {
            color: var(--text-secondary);
            opacity: 0.8;
        }

        .search-input:focus {
            border-color: var(--accent-start);
            box-shadow: 0 0 0 3px rgba(5, 193, 247, 0.2);
            background: #0e1525;
        }

        .search-icon {
            position: absolute;
            left: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-start);
            font-size: 18px;
            z-index: 2;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 30px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 0.3px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-start), var(--accent-end));
            color: white;
            border: 1px solid rgba(5, 193, 247, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(5, 193, 247, 0.4);
        }

        .btn-secondary {
            background: rgba(5, 193, 247, 0.1);
            color: var(--accent-start);
            border: 1px solid rgba(5, 193, 247, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(5, 193, 247, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(5, 193, 247, 0.2);
        }

        .table-container {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-color);
        }

        .section-header {
            margin-bottom: 30px;
        }

        .section-header h2 {
            font-size: 1.8rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header h2 i {
            color: var(--accent-start);
        }

        /* التنسيق الجديد للجدول */
        .attendance-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* رأس الجدول الجديد */
        .attendance-table thead {
            background: var(--table-header) !important;
        }

        .attendance-table thead tr {
            background: linear-gradient(135deg,
                    rgba(5, 193, 247, 0.05),
                    rgba(5, 193, 247, 0.1));
        }

        .attendance-table th {
            padding: 22px 20px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            color: #05c1f7;
            border: none;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            background: #1c3145;
        }

        .attendance-table th::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -1px;
            width: 50%;
            height: 2px;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #05C1F7, #00ff88);
            border-radius: 2px;
            z-index: 1;
        }

        /* خلايا الجدول الجديدة */
        .attendance-table td {
            padding: 25px 20px;
            text-align: center;
            color: var(--text-primary);
            border-bottom: 1px solid rgba(5, 193, 247, 0.08);
            transition: all 0.3s ease;
        }

        /* صفوف الجدول الجديدة */
        .attendance-table tbody tr {
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.01);
        }

        /* تناوب ألوان الصفوف */
        .attendance-table tbody tr:nth-child(even) {
            background: rgba(5, 193, 247, 0.02);
        }

        .attendance-table tbody tr:hover {
            background: rgba(5, 193, 247, 0.08) !important;
            transform: translateX(-3px);
            box-shadow: 5px 0 15px rgba(5, 193, 247, 0.1);
        }

        /* إطار زاوية الجدول */
        .attendance-table {
            border: 1px solid rgba(5, 193, 247, 0.1);
        }

        /* إطار رأس الجدول */
        .attendance-table thead th:first-child {
            border-top-left-radius: 15px;
        }

        .attendance-table thead th:last-child {
            border-top-right-radius: 15px;
        }

        /* إطار آخر صف */
        .attendance-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 15px;
        }

        .attendance-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 15px;
        }

        .activity-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 5px;
        }

        .activity-description {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .attendance-stats {
            display: flex;
            gap: 15px;
            margin-top: 10px;
            align-items: center;
            justify-content: center;
        }

        .stat-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 15px;
            border-radius: 10px;
            min-width: 100px;
            background: rgba(5, 193, 247, 0.08);
            border: 1px solid rgba(5, 193, 247, 0.15);
            transition: all 0.3s ease;
        }

        .attendance-table tbody tr:hover .stat-badge {
            background: rgba(5, 193, 247, 0.15);
            border-color: rgba(5, 193, 247, 0.3);
            transform: translateY(-2px);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .present-count .stat-number {
            color: var(--success-color);
        }

        .absent-count .stat-number {
            color: var(--danger-color);
        }

        .total-count .stat-number {
            color: var(--accent-start);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .view-link {
            color: var(--accent-start);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 8px;
            background: rgba(5, 193, 247, 0.1);
            border: 1px solid rgba(5, 193, 247, 0.2);
        }

        .view-link:hover {
            color: var(--accent-end);
            background: rgba(5, 193, 247, 0.2);
            border-color: rgba(5, 193, 247, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(5, 193, 247, 0.2);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
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

        .alert-success {
            background: linear-gradient(135deg, rgba(0, 255, 136, 0.2), rgba(5, 193, 247, 0.2));
            border-color: rgba(0, 255, 136, 0.3);
            color: var(--success-color);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(255, 71, 87, 0.2), rgba(255, 56, 56, 0.2));
            border-color: rgba(255, 71, 87, 0.3);
            color: var(--danger-color);
        }

        /* رسالة عندما لا توجد نتائج */
        .no-results {
            text-align: center;
            padding: 50px 20px;
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: rgba(5, 193, 247, 0.3);
        }

        @media (max-width: 768px) {
            .header-top {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .stats-summary {
                flex-direction: column;
                gap: 20px;
            }

            .table-controls {
                flex-direction: column;
            }

            .search-container {
                min-width: 100%;
            }

            .btn-group {
                width: 100%;
                justify-content: center;
            }

            .btn {
                flex: 1;
                justify-content: center;
                min-width: 200px;
            }

            .attendance-stats {
                flex-direction: column;
                gap: 10px;
            }

            .stat-badge {
                min-width: auto;
                width: 100%;
            }

            .attendance-table th,
            .attendance-table td {
                padding: 15px 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-top">
            <h1 class="h1"><i class="fas fa-user-clock"></i> Attendance Management System</h1>
        </div>
        <div class="header">
            <div class="stats-summary">
                <div class="stat-item stat-present">
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="totalPresent">{{ $totalPresent ?? 0 }}</h3>
                        <p>Present</p>
                    </div>
                </div>

                <div class="stat-item stat-absent">
                    <div class="stat-icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="totalAbsent">{{ $totalAbsent ?? 0 }}</h3>
                        <p>Absent</p>
                    </div>
                </div>

                <div class="stat-item stat-total">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <!-- إجمالي الحجوزات -->
                        <h3 id="totalBookings">{{ $totalBookings ?? 0 }}</h3>
                        <p>All registered</p>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif


        <div class="table-controls table-container">
                
            <div class="search-container">
                
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="searchInput" class="search-input"
                    placeholder="Search bookings by activity name..." autocomplete="off">
            </div>

            <div class="btn-group">
                <a href="{{ route('attendees.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> New Attendance Record
                </a>
            </div>
        </div>
        <div class="table-container">
            <div class="section-header">
                <h2><i class="fas fa-list-alt"></i> Attendance Statistics by Activity</h2>
            </div>

            <!-- الجدول -->
            <table class="attendance-table" id="activitiesTable">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Attendance Statistics</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($activities as $activity)
                        @php
                            // حساب الغياب بشكل صحيح لكل نشاط
                            $total_bookings = $activity->bookings_count ?? 0;
                            $present_count = $activity->present_count ?? 0;
                            $absent_count = $total_bookings - $present_count;
                        @endphp
                        <tr onclick="window.location='{{ route('attendees.show', $activity->id) }}'"
                            style="cursor: pointer;" data-activity-name="{{ strtolower($activity->name) }}">
                            <td>
                                <div class="activity-name">{{ $activity->name }}</div>
                                <div class="activity-description">{{ $activity->description ?? 'No description' }}
                                </div>
                            </td>
                            <td>
                                <div class="attendance-stats">
                                    <div class="stat-badge present-count">
                                        <div class="stat-number">{{ $present_count }}</div>
                                        <div class="stat-label">Present</div>
                                    </div>
                                    <div class="stat-badge absent-count">
                                        <div class="stat-number">{{ $absent_count }}</div>
                                        <div class="stat-label">Absent</div>
                                    </div>
                                    <div class="stat-badge total-count">
                                        <div class="stat-number">{{ $total_bookings }}</div>
                                        <div class="stat-label">Total Bookings</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('attendees.show', $activity->id) }}" class="view-link">
                                    <i class="fas fa-eye"></i>
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- رسالة عندما لا توجد نتائج -->
            <div id="noResults" class="no-results" style="display: none;">
                <i class="fas fa-search"></i>
                <h3>No activities found</h3>
                <p>Try a different search term</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Update statistics
        function updateStatistics() {
            fetch('/attendees/statistics')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalPresent').textContent = data.totalPresent;
                    document.getElementById('totalAbsent').textContent = data.totalAbsent;
                    document.getElementById('totalAttendees').textContent = data.total;
                });
        }

        // Refresh page every 30 seconds
        setInterval(updateStatistics, 30000);

        // البحث في اسم النشاط
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#tableBody tr');
            let visibleRows = 0;

            rows.forEach(row => {
                const activityName = row.getAttribute('data-activity-name');
                if (activityName.includes(searchTerm) || searchTerm === '') {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });

            // إظهار أو إخفاء رسالة "لا توجد نتائج"
            const noResults = document.getElementById('noResults');
            const table = document.getElementById('activitiesTable');

            if (visibleRows === 0 && searchTerm !== '') {
                noResults.style.display = 'block';
                table.style.display = 'none';
            } else {
                noResults.style.display = 'none';
                table.style.display = 'table';
            }
        });

        // مسح البحث بالضغط على زر Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('searchInput').value = '';
                document.getElementById('searchInput').dispatchEvent(new Event('input'));
            }
        });
    </script>
</body>

</html>
