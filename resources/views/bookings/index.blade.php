<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cyan: #05C1F7;
            --emerald: #00ff88;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
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
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.8);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-full: 9999px;
            --gradient-primary: linear-gradient(135deg, var(--cyan), var(--emerald));
            --gradient-dark: linear-gradient(135deg, #0f172a, #1e293b);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gradient-dark);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.5;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header - Simplified */
        .main-header {
            padding: 32px 0 24px;
            position: relative;
        }

        .header-content {
            text-align: center;
            margin-bottom: 32px;
        }

        .main-title {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 16px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .title-icon {
            display: inline-block;
            margin-right: 16px;
            vertical-align: middle;
        }

        .subtitle {
            font-size: 18px;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        .subtitle_1 {
            font-size: 18px;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Search and Create Section */
        .search-create-section {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--card-border);
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--cyan);
        }

        .search-create-container {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        @media (max-width: 768px) {
            .search-create-container {
                flex-direction: column;
                gap: 16px;
            }
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-input {
            width: 85%;
            padding: 16px 24px 16px 52px;
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid rgba(5, 193, 247, 0.3);
            border-radius: var(--radius-lg);
            font-size: 16px;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(5, 193, 247, 0.2);
            background: rgba(15, 23, 42, 0.9);
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--cyan);
            font-size: 18px;
            pointer-events: none;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: var(--radius-lg);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: #0f172a;
            font-weight: 700;
            box-shadow: 0 4px 20px rgba(5, 193, 247, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(5, 193, 247, 0.6);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Stats Card */
        .stats-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--card-border);
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .stats-content {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .stats-icon {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-lg);
            background: rgba(5, 193, 247, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cyan);
            font-size: 28px;
            border: 1px solid rgba(5, 193, 247, 0.2);
        }

        /* .stats-text {
            flex: 1;
        } */
        .stats-text {
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: center;
            align-items: center;
            gap: 5px
        }


        .stats-label {
            font-size: 15px;
            font-weight: 500px color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stats-value {
            font-size: 17px;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Table Section */
        .table-section {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--card-border);
            margin-bottom: 40px;
        }

        .table-header {
            padding: 24px;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-header h2 i {
            color: var(--cyan);
        }

        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-table thead {
            background: rgba(5, 193, 247, 0.05);
        }

        .booking-table th {
            padding: 20px 24px;
            text-align: left;
            font-weight: 600;
            font-size: 17px;
            color: var(--cyan);
            border-bottom: 1px solid var(--card-border);
            white-space: nowrap;
            position: relative;
            padding-bottom: 24px;
            text-align: center;
        }

        .booking-table th::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -1px;
            width: 60%;
            height: 2px;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #05C1F7, #00ff88);
            border-radius: 2px;
            z-index: 1;

        }

        .booking-table th i {
            margin-right: 10px;
        }

        .booking-table tbody tr {
            border-bottom: 1px solid var(--card-border);
            transition: all 0.3s ease;
            background: var(--card-bg);
        }

        .booking-table tbody tr:hover {
            background: rgba(5, 193, 247, 0.03);
        }

        .booking-table td {
            padding: 24px;
            vertical-align: middle;
        }

        /* User Profile Cell */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-avatar {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-bg);
            font-weight: 800;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(5, 193, 247, 0.3);
        }

        .user-details {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
            font-size: 16px;
        }

        .user-email {
            font-size: 14px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-email i {
            color: var(--cyan);
        }

        /* Activity Cell */
        .activity-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            background: rgba(5, 193, 247, 0.1);
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            border: 1px solid rgba(5, 193, 247, 0.2);
        }

        .activity-tag i {
            color: var(--cyan);
        }

        /* Employee Cell */
        .employee-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .employee-avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(5, 193, 247, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cyan);
            font-size: 20px;
            border: 1px solid rgba(5, 193, 247, 0.2);
        }

        .employee-details {
            flex: 1;
            min-width: 0;
        }

        .employee-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 14px;
            margin-bottom: 4px;
        }

        .employee-position {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: var(--radius-full);
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-paid {
            background: rgba(0, 255, 136, 0.1);
            color: var(--emerald);
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .status-paid i {
            color: var(--emerald);
        }

        .status-unpaid {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .status-unpaid i {
            color: #ef4444;
        }

        /* Date Cell */
        .date-cell {
            text-align: center;
            min-width: 100px;
        }

        .date-day {
            font-size: 28px;
            font-weight: 800;
            color: var(--cyan);
            line-height: 1;
            margin-bottom: 6px;
        }

        .date-month {
            font-size: 14px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            color: var(--text-primary);
            text-decoration: none;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-icon:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-view {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        .btn-view:hover {
            color: var(--cyan);
            border-color: rgba(5, 193, 247, 0.3);
        }

        .btn-edit {
            background: rgba(245, 159, 11, 0.132);
            color: var(--warning);
            border: 1px solid rgba(245, 159, 11, 0.311);
        }

        .btn-edit:hover {
            color: var(--warning);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: rgba(255, 68, 68, 0.1);
            color: #ff4444;
            border: 1px solid rgba(255, 68, 68, 0.3);
            cursor: pointer;
            border: none;
            font-family: inherit;
        }

        .btn-delete:hover {
            color: var(--danger);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }


        /* Empty State */
        .empty-state {
            padding: 80px 40px;
            text-align: center;
            background: rgba(15, 23, 42, 0.5);
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            color: var(--dark-bg);
            font-size: 48px;
            box-shadow: 0 10px 30px rgba(5, 193, 247, 0.4);
        }

        .empty-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .empty-description {
            color: var(--text-muted);
            margin-bottom: 32px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            font-size: 16px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 24px;
            background: var(--card-bg);
            border-top: 1px solid var(--card-border);
        }

        .pagination-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid var(--card-border);
            background: var(--card-bg);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .pagination-btn:hover:not(.disabled) {
            border-color: var(--cyan);
            color: var(--cyan);
            background: rgba(5, 193, 247, 0.1);
        }

        .pagination-btn.active {
            background: var(--gradient-primary);
            color: var(--dark-bg);
            border-color: transparent;
            font-weight: 700;
        }

        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Success Toast */
        .toast {
            position: fixed;
            top: 32px;
            right: 32px;
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-xl);
            display: flex;
            align-items: center;
            gap: 16px;
            z-index: 1000;
            animation: slideIn 0.3s ease;
            border-left: 4px solid var(--emerald);
            border: 1px solid var(--card-border);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .toast-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-bg);
            font-size: 20px;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .toast-message {
            font-size: 14px;
            color: var(--text-secondary);
        }

        .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 4px;
            transition: color 0.3s ease;
            font-size: 18px;
        }

        .toast-close:hover {
            color: var(--text-primary);
        }

        /* Footer */
        .main-footer {
            background-color: var(--gradient-dark);
            border-top: 1px solid var(--card-border);
            padding: 10px 0;
            margin-top: 40px;
        }

        .footer-content {
            text-align: center;
            color: var(--text-muted);
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                padding: 0 20px;
            }

            .main-title {
                font-size: 36px;
            }

            .booking-table th,
            .booking-table td {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 32px;
            }

            .subtitle {
                font-size: 16px;
            }

            .search-create-container {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .booking-table {
                font-size: 14px;
            }

            .booking-table th,
            .booking-table td {
                padding: 16px;
            }

            .action-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 28px;
            }

            .search-create-section,
            .stats-card,
            .table-section {
                padding: 20px;
            }

            .stats-content {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .user-profile,
            .employee-info {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }

            .user-details,
            .employee-details {
                text-align: center;
            }
        }
    </style>
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

    <script>
        // Real-time search functionality
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.booking-table tbody tr');

        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            let hasVisibleRows = false;

            tableRows.forEach(row => {
                if (row.querySelector('.empty-state')) return;

                const text = row.textContent.toLowerCase();
                if (searchTerm === '' || text.includes(searchTerm)) {
                    row.style.display = '';
                    hasVisibleRows = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show no results message if needed
            showNoResultsMessage(!hasVisibleRows && searchTerm !== '');
        }

        function showNoResultsMessage(show) {
            // Remove existing no results message
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) {
                existingMessage.remove();
            }

            if (show) {
                const firstRow = tableRows[0];
                if (firstRow && !firstRow.querySelector('.empty-state')) {
                    const noResultsRow = document.createElement('tr');
                    noResultsRow.className = 'no-results-message';
                    noResultsRow.innerHTML = `
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h3 class="empty-title">No Results Found</h3>
                                <p class="empty-description">No bookings match your search criteria</p>
                            </div>
                        </td>
                    `;

                    // Find the table body
                    const tbody = document.querySelector('.booking-table tbody');
                    // Clear existing rows except the no results message
                    tableRows.forEach(row => {
                        if (!row.classList.contains('no-results-message')) {
                            tbody.appendChild(row);
                        }
                    });
                    tbody.appendChild(noResultsRow);
                }
            }
        }

        // Add debounce for better performance
        let searchTimeout;
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 300);
            });

            // Clear search on Escape key
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    this.value = '';
                    performSearch();
                }
            });
        }

        // Auto-hide success toast
        const successToast = document.getElementById('successToast');
        if (successToast) {
            setTimeout(() => {
                successToast.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => successToast.remove(), 300);
            }, 5000);
        }

        // Add row click functionality (for view)
        tableRows.forEach(row => {
            if (!row.querySelector('.empty-state') && !row.classList.contains('no-results-message')) {
                row.addEventListener('click', function(e) {
                    // Don't trigger if clicking on buttons, links, or form elements
                    if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest(
                            'form') && e.target.tagName !== 'INPUT') {
                        const viewBtn = this.querySelector('.btn-view');
                        if (viewBtn) {
                            viewBtn.click();
                        }
                    }
                });

                // Add cursor pointer
                row.style.cursor = 'pointer';
            }
        });

        // Add loading animation for buttons
        document.querySelectorAll('.btn-primary, .btn-icon[type="submit"]').forEach(button => {
            button.addEventListener('click', function(e) {
                // Don't interfere with links
                if (this.tagName === 'A' || this.type === 'submit') {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    this.style.pointerEvents = 'none';

                    // Reset after 2 seconds (in case of error)
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                        this.style.pointerEvents = '';
                    }, 2000);
                }
            });
        });

        // Add focus effect to search input
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        }

        // Initialize search on page load
        document.addEventListener('DOMContentLoaded', function() {
            performSearch();
        });

        /////
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to all buttons
            const buttons = document.querySelectorAll('.btn-icon');

            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Form submission handling
            const deleteForms = document.querySelectorAll('form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Are you sure you want to delete this booking?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>
