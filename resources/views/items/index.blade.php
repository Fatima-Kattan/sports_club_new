<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Items Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZGUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

    <style>
        :root {
            --color-primary: #05C1F7;
            --color-secondary: #00ff88;
            --color-dark: #0a0a0a;
            --color-darker: #050505;
            --color-light: #EDEDEC;
            --color-gray: #A1A09A;
            --gradient-primary: linear-gradient(135deg, #05C1F7, #00ff88);
            --gradient-dark: linear-gradient(135deg, #0a0a0a, #1a1a1a);
            --glass-bg: rgba(20, 20, 30, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #050505 0%, #0a0a0a 100%);
            color: var(--color-light);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 400px;
            background: radial-gradient(circle at 50% -100%, rgba(5, 193, 247, 0.15), transparent 70%);
            z-index: -1;
        }

        /* حاوية رئيسية مع تباعد */
        .dashboard-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px 40px;
            position: relative;
        }

        /* إحصائيات متميزة */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .stat-card {
            background: rgba(25, 25, 35, 0.8);
            border-radius: 25px;
            padding: 35px 30px;
            backdrop-filter: blur(20px);
            border: 2px solid rgba(5, 193, 247, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            min-height: 175px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-primary);
            border-radius: 25px 25px 0 0;
            opacity: 0.8;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at top right,
                    rgba(5, 193, 247, 0.1),
                    transparent 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: rgba(5, 193, 247, 0.5);
            box-shadow:
                0 25px 60px rgba(5, 193, 247, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(5, 193, 247, 0.15);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-bottom: 5px;
            margin-top: 5px;
            border: 2px solid rgba(5, 193, 247, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover .stat-icon {
            background: rgba(5, 193, 247, 0.25);
            border-color: var(--color-primary);
            transform: rotateY(180deg) scale(1.1);
        }

        .stat-icon i {
            color: var(--color-primary);
            transition: all 0.4s ease;
        }

        .stat-card:hover .stat-icon i {
            color: var(--color-secondary);
        }

        .stat-content {
            flex: 1;
        }

        .stat-value {
            font-size: 5rem;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 10px;
            text-shadow: 0 0 30px rgba(5, 193, 247, 0.3);
            transition: all 0.4s ease;
        }

        .stat-card:hover .stat-value {
            transform: scale(1.1);
            text-shadow: 0 0 50px rgba(5, 193, 247, 0.5);
        }

        .stat-label {
            color: var(--color-gray);
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-label::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg,
                    rgba(5, 193, 247, 0.3),
                    transparent);
            margin-left: 10px;
        }

        /* شريط التحكم */
        .table-controls {
            background: rgba(26, 26, 26, 0.8);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid rgba(5, 193, 247, 0.2);
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 3px 8px rgba(5, 193, 247, 0.25);

        }

        .btn-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }



        /* زر العودة لصفحة النشاطات */
        /* ========== نسخة أبسط وأنظف ========== */
        .dark-actions-bar {
            padding: 20px 0;
        }

        .dark-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: rgba(30, 30, 40, 0.8);
            color: #05C1F7;
            text-decoration: none;
            border-radius: 8px;
            border: 1px solid rgba(5, 193, 247, 0.3);
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .dark-btn:hover {
            background: rgba(35, 35, 45, 0.9);
            color: #00ff88;
            border-color: rgba(0, 255, 136, 0.5);
            transform: translateX(-3px);
            box-shadow: 0 6px 20px rgba(5, 193, 247, 0.25);
        }

        .dark-btn i {
            transition: transform 0.3s ease;
        }

        .dark-btn:hover i {
            transform: translateX(-3px);
            color: #00ff88;
        }

        /* البحث */
        .search-container {
            position: relative;
            flex-grow: 1;
            max-width: 500px;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #05C1F7;
            font-size: 18px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 14px 20px 14px 50px;
            background: rgba(40, 40, 40, 0.8);
            border: 2px solid rgba(5, 193, 247, 0.3);
            color: #EDEDEC;
            font-size: 16px;
            border-radius: 10px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #05C1F7;
            box-shadow: 0 0 0 3px rgba(5, 193, 247, 0.2);
        }

        .search-input::placeholder {
            color: #A1A09A;
        }

        /* الفلترة */
        .filter-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #EDEDEC;
            background: linear-gradient(349deg, #2dbe71, #00b7ff96);
            box-sizing: border-box;
            border: none;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(5, 193, 247, 0.3);
            min-width: 140px;
        }

        .filter-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 195, 247, 0.405);
            background: linear-gradient(130deg, #2dbe71, #00b7ff96)
        }

        .filter-icon {
            width: 18px;
            height: 18px;
        }

        .chevron-icon {
            width: 18px;
            height: 18px;
        }



        .no-results-message {
            background: rgba(26, 26, 26, 0.8);
            border: 2px solid rgba(5, 193, 247, 0.3);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            margin: 30px auto;
            max-width: 500px;
            backdrop-filter: blur(10px);
        }

        .no-results-message i {
            font-size: 3rem;
            color: #05C1F7;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .no-results-message h3 {
            color: #EDEDEC;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .no-results-message p {
            color: #A1A09A;
            margin-bottom: 25px;
        }

        .btn-clear-filter {
            background: rgba(5, 193, 247, 0.1);
            color: #05C1F7;
            border: 1px solid rgba(5, 193, 247, 0.3);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-clear-filter:hover {
            background: rgba(5, 193, 247, 0.2);
            transform: translateY(-2px);
        }

        /* حاوية الفلترة */
        .filter-container {
            position: relative;
        }


        .filter-icon {
            width: 18px;
            height: 18px;
            stroke: #05C1F7;
        }

        .chevron-icon {
            width: 16px;
            height: 16px;
            stroke: #A1A09A;
            transition: transform 0.3s ease;
        }

        .filter-button:hover .chevron-icon {
            stroke: #05C1F7;
        }

        /* القائمة المنسدلة */
        .filter-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: rgba(26, 26, 26, 0.95);
            border: 1px solid rgba(5, 193, 247, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(15px);
            width: 280px;
            z-index: 1000;
            box-shadow: 0 10px 40px rgba(5, 193, 247, 0.2);
            overflow: hidden;
            animation: dropdownFade 0.3s ease;
        }

        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(5, 193, 247, 0.05);
        }

        .filter-header span {
            color: #EDEDEC;
            font-weight: 600;
            font-size: 14px;
        }

        .clear-filter-btn {
            background: none;
            border: none;
            color: #05C1F7;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .clear-filter-btn:hover {
            background: rgba(5, 193, 247, 0.1);
        }

        /* خيارات الفلترة */
        .filter-options {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px 0;
        }

        .filter-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 12px 20px;
            background: transparent;
            border: none;
            color: #A1A09A;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .filter-option:hover {
            background: rgba(5, 193, 247, 0.1);
            color: #EDEDEC;
            border-left-color: rgba(5, 193, 247, 0.5);
        }

        .filter-option.active {
            background: rgba(5, 193, 247, 0.15);
            color: #05C1F7;
            border-left-color: #05C1F7;
        }

        .filter-option-text {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-option-text i {
            font-size: 12px;
            width: 20px;
        }

        .filter-option-count {
            background: rgba(255, 255, 255, 0.1);
            color: #A1A09A;
            font-size: 12px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 10px;
            min-width: 30px;
            text-align: center;
        }

        .filter-option.active .filter-option-count {
            background: rgba(5, 193, 247, 0.3);
            color: #05C1F7;
        }

        .filter-option:hover .filter-option-count {
            background: rgba(5, 193, 247, 0.2);
            color: #EDEDEC;
        }

        /* شريط التمرير */
        .filter-options::-webkit-scrollbar {
            width: 6px;
        }

        .filter-options::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }

        .filter-options::-webkit-scrollbar-thumb {
            background: rgba(5, 193, 247, 0.3);
            border-radius: 3px;
        }

        .filter-options::-webkit-scrollbar-thumb:hover {
            background: rgba(5, 193, 247, 0.5);
        }

        /* متجاوبية */
        @media (max-width: 768px) {
            .filter-button {
                min-width: 160px;
                padding: 10px 15px;
                font-size: 13px;
            }

            .filter-dropdown {
                width: 250px;
                right: 0;
                left: 0;
                margin: 0 auto;
            }
        }

        /* تصميم الكاردات */
        /* حاوية العناصر */
        .items-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        /* بطاقة العنصر */
        .item-card {
            background: rgba(26, 26, 26, 0.8);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(5, 193, 247, 0.15);
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 3px 5px rgba(5, 193, 247, 0.1)
        }

        .item-card:hover {
            border-color: rgba(5, 193, 247, 0.3);
            box-shadow: 0 5px 10px rgba(5, 193, 247, 0.25)
        }

        /* صورة العنصر */
        .item-image {
            height: 150px;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .item-card:hover .item-image img {
            transform: scale(1.05);
        }

        .item-image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(5, 193, 247, 0.1), rgba(0, 255, 136, 0.05));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-image-placeholder i {
            font-size: 3rem;
            color: #05C1F7;
            opacity: 0.5;
        }

        /* معلومات العنصر */
        .item-info {
            padding: 15px;
        }

        .item-title {
            color: #EDEDEC;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .item-category {
            color: #05C1F7;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .item-category i {
            font-size: 0.8rem;
        }

        /* الحالة والكمية */
        .item-status-quantity {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 8px;
            background: rgba(40, 40, 40, 0.6);
            border-radius: 8px;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-indicator.active {
            color: #00ff88;
        }

        .status-indicator.inactive {
            color: #ff3333;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-indicator.active .status-dot {
            background: #00ff88;
            box-shadow: 0 0 5px rgba(0, 255, 136, 0.5);
        }

        .status-indicator.inactive .status-dot {
            background: #ff3333;
            box-shadow: 0 0 5px rgba(255, 51, 51, 0.5);
        }

        .quantity {
            color: #A1A09A;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity i {
            color: #05C1F7;
        }

        .hidden-by-filter {
            display: none !important;
        }

        /* قسم الإضافة */
        .add-to-cart-section {
            display: flex;
            gap: 8px;
        }

        .quantity-control {
            display: flex;
            flex: 1;
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            background: rgba(5, 193, 247, 0.1);
            border: none;
            color: #05C1F7;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: rgba(5, 193, 247, 0.2);
        }

        .qty-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .qty-input {
            width: 50px;
            height: 35px;
            border: none;
            background: rgba(255, 255, 255, 0.05);
            color: #EDEDEC;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 600;
            -moz-appearance: textfield;
            /* Firefox */
        }

        .qty-input::-webkit-outer-spin-button,
        .qty-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            /* Chrome, Safari, Edge */
            margin: 0;
        }

        .qty-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
        }

        /* زر الإضافة */
        .add-btn {
            flex: 1;
            height: 35px;
            background: linear-gradient(135deg, #05C1F7, #00ff88);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .add-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(5, 193, 247, 0.3);
        }

        .add-btn.disabled,
        .add-btn:disabled {
            background: #444;
            color: #777;
            cursor: not-allowed;
            opacity: 0.6;
        }

        /* رسالة التنبيه */
        .alert-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 255, 136, 0.9);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            display: none;
            align-items: center;
            gap: 10px;
            z-index: 1000;
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
            animation: slideIn 0.3s ease;
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

        /* متجاوبية */
        @media (max-width: 768px) {
            .items-container {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: 15px;
                padding: 15px;
            }

            .item-image {
                height: 120px;
            }

            .item-info {
                padding: 12px;
            }

            .item-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .items-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .item-image {
                height: 100px;
            }

            .item-status-quantity {
                flex-direction: column;
                gap: 5px;
                align-items: flex-start;
            }

            .add-to-cart-section {
                flex-direction: column;
            }
        }


        /* إصلاحات عامة للفورم داخل item-card */
        .item-card form {
            margin: 0;
            padding: 0;
            width: 100%;
            border: none;
            background: transparent;
        }

        .item-card form .add-to-cart-section {
            display: flex;
            gap: 8px;
            width: 100%;
        }

        .item-card form .quantity-control {
            display: flex;
            flex: 1;
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: 8px;
            overflow: hidden;
            background: transparent;
        }

        .item-card form .qty-btn {
            width: 35px;
            height: 35px;
            background: rgba(5, 193, 247, 0.1);
            border: none;
            color: #05C1F7;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .item-card form .qty-input {
            width: 50px;
            height: 35px;
            border: none;
            background: rgba(255, 255, 255, 0.05);
            color: #EDEDEC;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0;
        }

        .item-card form .add-btn {
            flex: 1;
            height: 35px;
            background: linear-gradient(135deg, #05C1F7, #00ff88);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 0;
        }

        /* إزالة الأنماط الافتراضية للفورم */
        .item-card form input,
        .item-card form button {
            margin: 0;
            line-height: normal;
        }

        .item-card form button[type="submit"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }




        /* العنوان */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .page-title {
            font-size: 2.5rem;
            color: #05C1F7;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(5, 193, 247, 0.5);
            background: linear-gradient(135deg, #05C1F7, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-subtitle {
            color: #A1A09A;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* ========== بطاقات الإحصائيات ========== */
        /* إحصائيات بسيطة وأنيقة */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(30, 30, 30, 0.8);
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            background: rgba(35, 35, 35, 0.9);
            border-color: rgba(5, 193, 247, 0.2);
        }

        .stat-icon {
            font-size: 26px;
            color: #05C1F7;
        }

        .stat-card:nth-child(2) .stat-icon {
            color: #00ff88;
        }

        .stat-card:nth-child(3) .stat-icon {
            color: #3aa9a3;
        }

        .stat-card:nth-child(4) .stat-icon {
            color: #0246ff;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #A1A09A;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">

        <!-- العنوان -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-boxes"></i>

                Items Management
            </h1>
            <p class="page-subtitle">
                Manage your inventory with precision and style. Track items, monitor stock levels, and keep everything
                organized.
            </p>
        </div>

        <!-- إحصائيات متميزة -->
        <div class="stats-grid">
            <!-- Total Items -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Items</div>
                </div>
            </div>

            <!-- Active Items -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">0</div>
                    <div class="stat-label">Active Items</div>
                </div>
            </div>

            <!-- Low Stock -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">1</div>
                    <div class="stat-label">Low Stock</div>
                </div>
            </div>

            <!-- High Stock -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">0</div>
                    <div class="stat-label">High Stock</div>
                </div>
            </div>
        </div>

        <div class="table-controls">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <div style="display: contents;">
                    <input type="text" name="search" class="search-input" placeholder="Search items by name..."
                        value="{{ request('search') ?? '' }}" autocomplete="off" id="searchInput">
                </div>
            </div>
            <div class="btn-container">
                <div class="dark-actions-bar">
                    <a href="{{ route('activities.index') }}" class="dark-btn dark-btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Back to Activities
                    </a>
                </div>
                <!-- زر الفلترة -->
                <div class="filter-container">
                    <button class="filter-button">
                        <svg class="filter-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                        </svg>
                        <span class="filter-text">All Categories</span>
                        <svg class="chevron-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- القائمة المنسدلة للفلترة -->
                    <div class="filter-dropdown" style="display: none;">
                        <div class="filter-header">
                            <span>Filter by Category</span>
                            <button class="clear-filter-btn">Clear</button>
                        </div>

                        <div class="filter-options">
                            <!-- خيار "جميع الفئات" -->
                            <button class="filter-option active" data-category="all">
                                <span class="filter-option-text">📦 All Categories</span>
                                <span class="filter-option-count">{{ $items->count() }}</span>
                            </button>

                            <!-- الفئات الديناميكية -->
                            @foreach ($categories as $category)
                                <button class="filter-option" data-category="{{ $category->id }}">
                                    <span class="filter-option-text">
                                        <i class="fas fa-tag me-2"></i>{{ $category->name }}
                                    </span>
                                    <span class="filter-option-count">
                                        {{ $items->where('category_id', $category->id)->count() }}
                                    </span>
                                </button>
                            @endforeach

                            <!-- العناصر بدون فئة -->
                            <button class="filter-option" data-category="uncategorized">
                                <span class="filter-option-text">
                                    <i class="fas fa-question-circle me-2"></i>Uncategorized
                                </span>
                                <span class="filter-option-count">
                                    {{ $items->whereNull('category_id')->count() }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- عرض العناصر -->
        <div class="items-container">
            @foreach ($items as $item)
                <div class="item-card" data-category-id="{{ $item->category_id }}"
                    data-uncategorized="{{ $item->category_id ? 'false' : 'true' }}">
                    <!-- صورة العنصر -->
                    <div class="item-image">
                        @if ($item->image)
                            <img src="{{ asset('images/items/' . $item->image) }}" alt="{{ $item->name }}">
                        @else
                            <div class="item-image-placeholder">
                                <i class="fas fa-box"></i>
                            </div>
                        @endif
                    </div>

                    <!-- معلومات العنصر -->
                    <div class="item-info">
                        <!-- الاسم -->
                        <h3 class="item-title">{{ $item->name }}</h3>

                        <!-- الصنف -->
                        <div class="item-category">
                            <i class="fas fa-tag"></i>
                            {{ $item->category->name ?? 'No Category' }}
                        </div>

                        <!-- الحالة والمخزون -->
                        <div class="item-status-quantity">
                            <div class="status-indicator {{ $item->status ? 'active' : 'inactive' }}">
                                <span class="status-dot"></span>
                                {{ $item->status ? 'Available' : 'Unavailable' }}
                            </div>
                            <div class="quantity">
                                <i class="fas fa-cubes"></i>
                                Quantity: {{ $item->quantity }}
                            </div>
                        </div>

                        <!-- حقل الإضافة -->
                        <form action="{{ route('activities.attachItems', ['activity' => $activity->id]) }}"
                            method="POST" class="cart-form">
                            @csrf
                            <div class="add-to-cart-section">
                                <div class="quantity-control">
                                    <button type="button" class="qty-btn minus"
                                        onclick="decrementQty({{ $item->id }})">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" id="qty-{{ $item->id }}"
                                        name="items[{{ $item->id }}][quantity]" class="qty-input" value="1"
                                        min="1" max="{{ $item->quantity }}"
                                        onchange="validateQty({{ $item->id }})">
                                    <button type="button" class="qty-btn plus"
                                        onclick="incrementQty({{ $item->id }}, {{ $item->quantity }})">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <button type="submit"
                                    class="add-btn {{ $item->status && $item->quantity > 0 ? '' : 'disabled' }}"
                                    {{ $item->status && $item->quantity > 0 ? '' : 'disabled' }}>
                                    <i class="fas fa-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- حالة عدم وجود عناصر -->
        @if ($items->count() == 0)
            <div class="no-items">
                <div class="no-items-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 style="color: var(--color-light); font-size: 2rem; margin-bottom: 20px;">
                    No Items Found
                </h3>
                <p style="color: var(--color-gray); font-size: 1.1rem; max-width: 500px; margin: 0 auto 40px;">
                    Start building your inventory by adding your first item to the system.
                </p>
                <a href="#" class="add-item-btn">
                    <i class="fas fa-plus-circle"></i>
                    Add Your First Item
                </a>
            </div>
        @endif

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // === 1. تحديث بيانات الإحصائيات من PHP ===
            const totalItems = {{ $items->count() }};
            const activeItems = {{ $items->where('status', true)->count() }};
            const lowStockItems = {{ $items->where('quantity', '<', 10)->count() }};
            const highStockItems = {{ $items->where('quantity', '>=', 50)->count() }};

            // تحديث القيم في واجهة المستخدم
            document.querySelectorAll('.stat-value')[0].textContent = totalItems;
            document.querySelectorAll('.stat-value')[1].textContent = activeItems;
            document.querySelectorAll('.stat-value')[2].textContent = lowStockItems;
            document.querySelectorAll('.stat-value')[3].textContent = highStockItems;

            // === 2. تأثيرات بصرية للإحصائيات ===
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                // تأخير ظهور البطاقات
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);

                // تأثير عند التمرير
                card.addEventListener('mouseenter', function() {
                    const value = this.querySelector('.stat-value');
                    if (value) {
                        value.style.transform = 'scale(1.15)';
                    }
                });

                card.addEventListener('mouseleave', function() {
                    const value = this.querySelector('.stat-value');
                    if (value) {
                        value.style.transform = 'scale(1)';
                    }
                });
            });

            // === 3. إنشاء رسالة التنبيه ===
            const alertMessage = document.createElement('div');
            alertMessage.className = 'alert-message';
            alertMessage.style.display = 'none';
            document.body.appendChild(alertMessage);

            // === 4. وظائف التحكم بالكمية (القديمة) ===
            // تقليل الكمية
            function decrementQty(itemId) {
                const input = document.getElementById(`qty-${itemId}`);
                if (!input) return;

                const currentValue = parseInt(input.value) || 1;
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            }

            // زيادة الكمية
            function incrementQty(itemId, maxQty) {
                const input = document.getElementById(`qty-${itemId}`);
                if (!input) return;

                const currentValue = parseInt(input.value) || 1;
                if (currentValue < maxQty) {
                    input.value = currentValue + 1;
                }
            }

            // التحقق من الكمية
            function validateQty(itemId) {
                const input = document.getElementById(`qty-${itemId}`);
                if (!input) return;

                const maxQty = parseInt(input.max) || 1;
                const value = parseInt(input.value) || 1;

                if (value < 1) {
                    input.value = 1;
                } else if (value > maxQty) {
                    input.value = maxQty;
                    showAlert(`Maximum available: ${maxQty}`, 'warning');
                }
            }

            // === 5. عرض رسالة التنبيه ===
            function showAlert(message, type = 'success') {
                alertMessage.innerHTML = `
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                    <span>${message}</span>
                `;

                alertMessage.style.background = type === 'success' ?
                    'rgba(0, 255, 136, 0.9)' :
                    'rgba(255, 51, 51, 0.9)';

                alertMessage.style.display = 'flex';

                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 3000);
            }

            // === 6. نظام الفلترة ===
            const filterButton = document.querySelector('.filter-button');
            const filterDropdown = document.querySelector('.filter-dropdown');
            const filterText = document.querySelector('.filter-text');
            const clearFilterBtn = document.querySelector('.clear-filter-btn');
            const filterOptions = document.querySelectorAll('.filter-option');
            const itemCards = document.querySelectorAll('.item-card');
            const searchInput = document.getElementById('searchInput');

            // فتح/إغلاق القائمة المنسدلة
            if (filterButton && filterDropdown) {
                filterButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isVisible = filterDropdown.style.display === 'block';

                    if (isVisible) {
                        hideFilterDropdown();
                    } else {
                        showFilterDropdown();
                    }
                });

                function showFilterDropdown() {
                    filterDropdown.style.display = 'block';
                    const chevron = filterButton.querySelector('.chevron-icon');
                    if (chevron) chevron.style.transform = 'rotate(180deg)';
                }

                function hideFilterDropdown() {
                    filterDropdown.style.display = 'none';
                    const chevron = filterButton.querySelector('.chevron-icon');
                    if (chevron) chevron.style.transform = 'rotate(0deg)';
                }

                // إغلاق القائمة عند النقر خارجها
                document.addEventListener('click', function(e) {
                    if (filterButton && !filterButton.contains(e.target) &&
                        filterDropdown && !filterDropdown.contains(e.target)) {
                        hideFilterDropdown();
                    }
                });
            }

            // تطبيق الفلترة حسب الكاتيجوري
            if (filterOptions.length > 0) {
                filterOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        const categoryId = this.getAttribute('data-category');
                        const categoryName = this.querySelector('.filter-option-text')?.textContent
                            ?.trim() || 'All Categories';

                        // تحديث النشط
                        filterOptions.forEach(opt => opt.classList.remove('active'));
                        this.classList.add('active');

                        // تطبيق الفلترة
                        filterByCategory(categoryId);

                        // تحديث نص الزر
                        if (filterText) {
                            filterText.textContent = categoryName.replace(/📦|🏷️|❓/g, '').trim();
                        }

                        // إغلاق القائمة
                        hideFilterDropdown();

                        // تحديث العدد
                        updateItemsCount();
                    });
                });
            }

            // مسح الفلترة
            if (clearFilterBtn) {
                clearFilterBtn.addEventListener('click', function() {
                    // إعادة تعيين لجميع الفئات
                    filterOptions.forEach(opt => opt.classList.remove('active'));
                    if (filterOptions[0]) {
                        filterOptions[0].classList.add('active'); // تحديد "All Categories"
                    }

                    // إعادة تعيين النص
                    if (filterText) {
                        filterText.textContent = 'All Categories';
                    }

                    // إظهار جميع العناصر
                    itemCards.forEach(card => {
                        card.style.display = 'block';
                        card.classList.remove('hidden-by-filter');
                    });

                    // تحديث العدد
                    updateItemsCount();

                    // إغلاق القائمة
                    hideFilterDropdown();
                });
            }

            // وظيفة الفلترة
            function filterByCategory(categoryId) {
                itemCards.forEach(card => {
                    const itemCategoryId = card.getAttribute('data-category-id');
                    const isUncategorized = card.getAttribute('data-uncategorized') === 'true';

                    let shouldShow = false;

                    switch (categoryId) {
                        case 'all':
                            shouldShow = true;
                            break;
                        case 'uncategorized':
                            shouldShow = isUncategorized;
                            break;
                        default:
                            shouldShow = itemCategoryId == categoryId;
                    }

                    if (shouldShow) {
                        card.style.display = 'block';
                        card.classList.remove('hidden-by-filter');
                    } else {
                        card.style.display = 'none';
                        card.classList.add('hidden-by-filter');
                    }
                });
            }

            // === 7. تحديث عدد العناصر المرئية ===
            function updateItemsCount() {
                const visibleItems = Array.from(itemCards).filter(card =>
                    card.style.display !== 'none'
                ).length;

                const totalItems = itemCards.length;

                // تحديث العنصر الموجود
                let countElement = document.getElementById('items-count');
                if (!countElement) {
                    // إنشاء العنصر إذا لم يكن موجوداً
                    countElement = document.createElement('div');
                    countElement.id = 'items-count';
                    countElement.style.cssText =
                        'color: #A1A09A; font-size: 0.9rem; margin-bottom: 15px; padding: 0 20px;';
                    const itemsContainer = document.querySelector('.items-container');
                    if (itemsContainer && itemsContainer.parentNode) {
                        itemsContainer.parentNode.insertBefore(countElement, itemsContainer);
                    }
                }

                countElement.textContent = `Showing ${visibleItems} of ${totalItems} items`;

                // رسالة إذا لم توجد نتائج
                const noResults = document.getElementById('no-filter-results');
                if (visibleItems === 0) {
                    if (!noResults) {
                        createNoResultsMessage();
                    }
                } else if (noResults) {
                    noResults.remove();
                }
            }

            // إنشاء رسالة عدم وجود نتائج
            function createNoResultsMessage() {
                const message = document.createElement('div');
                message.id = 'no-filter-results';
                message.className = 'no-results-message';
                message.innerHTML = `
                    <i class="fas fa-filter"></i>
                    <h3>No items found</h3>
                    <p>Try selecting a different category or clear the filter</p>
                    <button class="btn-clear-filter" id="clear-filter-btn">
                        <i class="fas fa-times"></i>
                        Clear Filter
                    </button>
                `;

                const itemsContainer = document.querySelector('.items-container');
                if (itemsContainer && itemsContainer.parentNode) {
                    itemsContainer.parentNode.insertBefore(message, itemsContainer);

                    // إضافة حدث للزر الجديد
                    const newClearBtn = document.getElementById('clear-filter-btn');
                    if (newClearBtn) {
                        newClearBtn.addEventListener('click', function() {
                            if (clearFilterBtn) {
                                clearFilterBtn.click();
                            }
                        });
                    }
                }
            }

            // بحث تفاعلي مع الفلترة
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();
                    const activeCategory = document.querySelector('.filter-option.active');
                    const categoryId = activeCategory ? activeCategory.getAttribute('data-category') :
                        'all';

                    itemCards.forEach(card => {
                        // التحقق من الفلترة أولاً
                        const itemCategoryId = card.getAttribute('data-category-id');
                        const isUncategorized = card.getAttribute('data-uncategorized') === 'true';

                        let categoryMatch = false;

                        switch (categoryId) {
                            case 'all':
                                categoryMatch = true;
                                break;
                            case 'uncategorized':
                                categoryMatch = isUncategorized;
                                break;
                            default:
                                categoryMatch = itemCategoryId == categoryId;
                        }

                        // التحقق من البحث
                        const itemTitle = card.querySelector('.item-title');
                        const itemCategory = card.querySelector('.item-category');

                        const itemName = itemTitle ? itemTitle.textContent.toLowerCase() : '';
                        const itemCat = itemCategory ? itemCategory.textContent.toLowerCase() : '';

                        const searchMatch = searchTerm === '' ||
                            itemName.includes(searchTerm) ||
                            itemCat.includes(searchTerm);

                        // عرض/إخفاء بناء على الفلترة والبحث
                        if (categoryMatch && searchMatch) {
                            card.style.display = 'block';
                            card.classList.remove('hidden-by-filter');
                        } else {
                            card.style.display = 'none';
                            card.classList.add('hidden-by-filter');
                        }
                    });

                    updateItemsCount();
                });
            }

            // === 8. جعل الدوال متاحة عالمياً ===
            window.decrementQty = decrementQty;
            window.incrementQty = incrementQty;
            window.validateQty = validateQty;
            window.showAlert = showAlert;
            window.clearFilter = function() {
                if (clearFilterBtn) {
                    clearFilterBtn.click();
                }
            };

            // === 9. التهيئة النهائية ===
            // تحديث أرقام الفلترة
            filterOptions.forEach(option => {
                const countElement = option.querySelector('.filter-option-count');
                if (countElement) {
                    const currentCount = parseInt(countElement.textContent) || 0;
                    countElement.textContent = currentCount;
                }
            });

            // تأثيرات لبطاقات العناصر
            const allItemCards = document.querySelectorAll('.item-card');
            allItemCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease-out';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 800 + (index * 100));
            });

            // التهيئة الأولية للفلترة
            updateItemsCount();
        });
    </script>
</body>

</html>
