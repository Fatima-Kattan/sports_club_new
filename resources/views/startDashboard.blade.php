<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/css/startdash.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
    <title>Dashboard Club</title>
</head>

<body>
    <div class="dashboard-container">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-content">
                <div class="user-info">
                    <div class="avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="user-details">
                        <h1 class="greeting">Welcome back, <span class="highlight">Manager</span>! 👋</h1>
                        <p class="subtitle">Here's what's happening with your team today</p>
                    </div>
                </div>
                <div class="header-stats">
                    <div class="stat-item">
                        <i class="fas fa-calendar-day"></i>
                        <span id="current-date">{{ date('F j, Y') }}</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-clock"></i>
                        <span id="current-time">{{ date('h:i A') }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="dashboard-content">
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card"
                    data-employee-count="{{ \DB::table('employees')->whereNull('deleted_at')->count() }}">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Active Employees</h3>
                        <p class="stat-number" id="total-employees">0</p>
                        <p class="stat-change"><i class="fas fa-user-check"></i> Active employees</p>
                    </div>
                </div>

                <div class="stat-card" id="activities-card"
                    data-activities-count="{{ \DB::table('activities')->where('is_active', true)->count() }}">
                    <div class="stat-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Active Tasks</h3>
                        <p class="stat-number" id="active-tasks">0</p>
                        <p class="stat-change"><i class="fas fa-clock"></i> In progress</p>
                    </div>
                </div>

                <div class="stat-card" id="attendancePercentage">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Today's Attendance</h3>
                        <p class="stat-number" id="attendance">0%</p>
                        <p class="stat-change"><i class="fas fa-check-circle"></i> On time</p>
                    </div>
                </div>

                <div class="stat-card" id="todayBookings">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-info">
                        <h3>bookings</h3>
                        <p class="stat-number" id="performance">0</p>
                        <p class="stat-change"><i class="fas fa-trend-up"></i> This week</p>
                    </div>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="section-header">
                <h2><i class="fas fa-bolt"></i> Quick Actions</h2>
                <p>Frequently used functions</p>
            </div>

            <div class="actions-grid">
                <a href="{{ route('employees.create') }}">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Add Employee</h3>
                        <p>Register new team member</p>
                    </div>
                </a>

                <a href="{{ route('bookings.create') }}">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <h3>Add booking</h3>
                        <p>reserve your place</p>
                    </div>
                </a>

                <a href="{{ route('activities.create') }}">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Create Activity</h3>
                        <p>Create your activity now</p>
                    </div>
                </a>

                <a href="{{ route('facilities.create') }}">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Add Facilities</h3>
                        <p>Your new place</p>
                    </div>
                </a>
            </div>


            <!-- Welcome Message -->
            <div class="welcome-section">
                <div class="welcome-content">
                    <h2><i class="fas fa-rocket"></i> Get Started</h2>
                    <p class="welcome-text">
                        Select from the side menu to begin managing your team efficiently.
                        Track performance, manage schedules, and generate reports all in one place. 🚀
                    </p>
                    <div class="welcome-tips">
                        <div class="tip">
                            <i class="fas fa-lightbulb"></i>
                            <span><strong>Tip:</strong> Use Quick Actions for faster navigation</span>
                        </div>
                        <div class="tip">
                            <i class="fas fa-bell"></i>
                            <span><strong>Reminder:</strong> Check pending approvals daily</span>
                        </div>
                    </div>
                </div>
                <div class="welcome-illustration">
                    <div class="illustration">
                        <i class="fas fa-chart-pie"></i>
                        <i class="fas fa-user-friends"></i>
                        <i class="fas fa-tasks"></i>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="dashboard-footer">
            <p>All Rights Reserved &copy; 2025 Fitness Club</p>
        </footer>
    </div>

    <!-- JavaScript -->
    <script>
        // Update time in real-time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
            document.getElementById('current-time').textContent = timeString;
        }

        // Initialize with random stats (replace with real data)
        function initializeStats() {
            document.getElementById('total-employees').textContent = Math.floor(Math.random() * 50) + 50;
            document.getElementById('active-tasks').textContent = Math.floor(Math.random() * 20) + 5;
            document.getElementById('attendance').textContent = Math.floor(Math.random() * 20) + 80 + '%';
            document.getElementById('performance').textContent = Math.floor(Math.random() * 15) + 85 + '%';
        }

        // Add hover effects to cards
        function setupCardInteractions() {
            const cards = document.querySelectorAll('.stat-card, .action-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        }

        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateTime();
            setInterval(updateTime, 60000); // Update every minute

            initializeStats();
            setupCardInteractions();

            // Add click effects to action cards
            document.querySelectorAll('.action-card').forEach(card => {
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        });

        /////// count Active employees ////////
        document.addEventListener('DOMContentLoaded', function() {
            const statCard = document.querySelector('.stat-card');
            const employeeCount = statCard.getAttribute('data-employee-count');

            if (employeeCount) {
                const formattedNumber = new Intl.NumberFormat('en-US').format(employeeCount);
                document.getElementById('total-employees').textContent = formattedNumber;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const activitiesCard = document.getElementById('activities-card');

            if (activitiesCard) {
                const activitiesCount = activitiesCard.getAttribute('data-activities-count');

                if (activitiesCount) {
                    const formattedNumber = new Intl.NumberFormat('en-US').format(activitiesCount);

                    const activeTasksElement = document.getElementById('active-tasks');
                    if (activeTasksElement) {
                        activeTasksElement.textContent = formattedNumber;
                    }
                }
            }
        });
    </script>
</body>

</html>
