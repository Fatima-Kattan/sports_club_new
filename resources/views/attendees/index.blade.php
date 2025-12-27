<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendees System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/indexAttendee.css') }}">
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
