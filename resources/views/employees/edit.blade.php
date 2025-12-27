<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Employee - Fitness Club</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* تنسيقات إضافية للصفحة */
        :root {
            --color-primary: #05C1F7;
            --color-secondary: #00ff88;
            --color-dark: #0a0a0a;
            --color-light: #FDFDFC;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background: #0a0a0a;
            color: #EDEDEC;
            margin: 0;
            padding: 0;
        }

        .edit-employee-container {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #EDEDEC;
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            margin: 35px auto;
            z-index: 2;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 15px 40px;
            border: 1px solid rgba(5, 193, 247, 0.3);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 2.5rem;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-subtitle {
            color: #A1A09A;
            font-size: 1.1rem;
        }

        .current-image-container {
            text-align: center;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: 1px solid rgba(5, 193, 247, 0.3);
        }

        .current-image-title {
            color: var(--color-primary);
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .current-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            border: 3px solid var(--color-primary);
            box-shadow: 0 8px 25px rgba(5, 193, 247, 0.3);
        }

        .image-note {
            color: #A1A09A;
            font-size: 0.85rem;
            margin-top: 10px;
            font-style: italic;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: var(--color-primary);
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-control {
            width: 90%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(5, 193, 247, 0.3);
            border-radius: 10px;
            color: #EDEDEC;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 15px rgba(5, 193, 247, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-control::placeholder {
            color: #A1A09A;
        }

        select.form-control {
            width: 100%;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2305C1F7' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }



        /* تنسيق الـ options */
        .form-control option {
            background-color: #2d3748;
            /* خلفية داكنة */
            color: #e2e8f0;
            /* نص فاتح */
            padding: 12px;
            font-size: 15px;
        }

        /* hover على option */
        .form-control option:hover {
            background-color: #4a5568 !important;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: rgba(5, 193, 247, 0.1);
            border: 2px dashed rgba(5, 193, 247, 0.5);
            border-radius: 10px;
            color: var(--color-primary);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-btn:hover {
            background: rgba(5, 193, 247, 0.2);
            border-color: var(--color-primary);
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-update,
        .btn-cancel,
        .btn-delete {
            padding: 12px 35px;
            border-radius: 25px;
            font-weight: 700;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-update {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            color: var(--color-dark);
        }

        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(5, 193, 247, 0.4);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            color: #EDEDEC;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--color-primary);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ff3333, #cc0000);
            color: white;
            border: 1px solid rgba(255, 51, 51, 0.3);
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #cc0000, #990000);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 51, 51, 0.4);
        }

        .required-star {
            color: #ff4444;
            margin-left: 3px;
        }

        .form-help {
            color: #A1A09A;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .image-preview {
            margin-top: 10px;
            text-align: center;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 10px;
            border: 2px solid var(--color-primary);
            display: none;
        }

        .error-message {
            color: #ff4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .has-error .form-control {
            border-color: #ff4444;
        }

        .form-section {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .section-title {
            background: linear-gradient(160deg, #05C1F7, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
            display: inline-block;
            font-size: 1.2rem;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 255, 136, 0.3);
        }

        /* تنسيقات Toggle المتميزة */
        .toggle-container {
            margin: 10px 0;
        }

        .toggle-card {
            background: rgba(26, 26, 26, 0.8);
            border: 1px solid rgba(5, 193, 247, 0.2);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .toggle-card:hover {
            border-color: rgba(5, 193, 247, 0.4);
            box-shadow: 0 5px 15px rgba(5, 193, 247, 0.1);
        }

        .toggle-wrapper {
            padding: 20px;
        }

        .toggle-content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .admin-toggle {
            display: none;
        }

        .toggle-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .toggle-title {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            flex: 1;
        }

        .toggle-title h4 {
            color: #EDEDEC;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 0 4px 0;
        }

        .toggle-title p {
            color: #A1A09A;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.4;
        }

        .toggle-icon {
            color: #05C1F7;
            font-size: 1.3rem;
            margin-top: 2px;
        }

        .toggle-switch {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
            position: relative;
            padding: 5px 0;
        }

        .toggle-slider {
            width: 50px;
            height: 26px;
            background: rgba(161, 160, 154, 0.2);
            border-radius: 13px;
            position: relative;
            transition: all 0.3s ease;
        }

        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #A1A09A;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .admin-toggle:checked+.toggle-content .toggle-slider {
            background: linear-gradient(135deg, #05C1F7, rgba(0, 255, 136, 0.8));
        }

        .admin-toggle:checked+.toggle-content .toggle-slider::before {
            transform: translateX(24px);
            background: #EDEDEC;
        }

        .toggle-status {
            display: flex;
            flex-direction: column;
            gap: 2px;
            font-size: 0.8rem;
            font-weight: 600;
            text-align: center;
            min-width: 30px;
        }

        .status-off {
            color: #ff4444;
        }

        .status-on {
            color: #00ff88;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .status-off {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .admin-toggle:checked+.toggle-content .status-on {
            opacity: 1;
            transform: translateY(0);
        }

        .admin-toggle:checked+.toggle-content .status-off {
            opacity: 0;
            transform: translateY(10px);
        }

        .toggle-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .permission-level {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .level-badge {
            background: rgba(138, 43, 226, 0.1);
            color: #8a2be2;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            border: 1px solid rgba(138, 43, 226, 0.3);
            width: fit-content;
        }

        .level-indicator {
            display: flex;
            gap: 6px;
        }

        .level-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .level-dot.active {
            background: #05C1F7;
        }

        .admin-toggle:checked+.toggle-content .level-dot.active {
            background: #00ff88;
        }

        .permission-summary {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .permission-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #A1A09A;
            font-size: 0.9rem;
        }

        .permission-item i {
            color: #05C1F7;
            font-size: 0.8rem;
        }

        .admin-toggle:checked+.toggle-content .permission-item i {
            color: #00ff88;
        }

        .toggle-error {
            background: rgba(255, 68, 68, 0.1);
            border-top: 1px solid rgba(255, 68, 68, 0.2);
            padding: 12px 20px;
            color: #ff4444;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toggle-error i {
            font-size: 1rem;
        }

        /* تأثيرات تفاعلية */
        .admin-toggle:checked+.toggle-content .toggle-card {
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 0 0 1px rgba(0, 255, 136, 0.1);
        }

        .admin-toggle:checked+.toggle-content .toggle-icon {
            color: #00ff88;
        }

        .admin-toggle:checked+.toggle-content .level-badge {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border-color: rgba(0, 255, 136, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .toggle-header {
                flex-direction: column;
                gap: 15px;
            }

            .toggle-switch {
                align-self: flex-start;
            }

            .toggle-details {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .permission-level,
            .permission-summary {
                width: 100%;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
                gap: 15px;
            }

            .btn-update,
            .btn-cancel,
            .btn-delete {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .edit-employee-container {
                padding: 80px 15px 30px;
            }

            .form-container {
                padding: 20px;
            }

            .form-title {
                font-size: 1.8rem;
            }

            .current-image {
                max-width: 150px;
                max-height: 150px;
            }
        }
    </style>
</head>

<body>

    <div class="edit-employee-container">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Edit Employee</h1>
                <p class="form-subtitle">Update employee information</p>
            </div>

            @if ($employee->image)
                <div class="current-image-container">
                    <div class="current-image-title">Current Profile Image</div>

                    <img src="{{ asset($employee->image) }}" alt="{{ $employee->full_name }}"
                        class="current-image">
                    <div class="image-note">Upload a new image below to replace this one</div>
                </div>
            @endif

            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data"
                id="employeeForm">
                @csrf
                @method('PUT')

                <div class="form-section">
                    <h3 class="section-title">Basic Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="full_name" class="form-label">
                                Full Name <span class="required-star">*</span>
                            </label>
                            <input type="text" id="full_name" name="full_name" class="form-control"
                                placeholder="Enter full name" value="{{ old('full_name', $employee->full_name) }}"
                                required>
                            @error('full_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                Email Address <span class="required-star">*</span>
                            </label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="employee@example.com" value="{{ old('email', $employee->email) }}"
                                required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="position" class="form-label">
                                Position <span class="required-star">*</span>
                            </label>
                            <input type="text" id="position" name="position" class="form-control"
                                placeholder="e.g., Senior Coach, HR Manager"
                                value="{{ old('position', $employee->position) }}" required>
                            @error('position')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="form-label">
                                Phone Number <span class="required-star">*</span>
                            </label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control"
                                placeholder="+1234567890" value="{{ old('phone_number', $employee->phone_number) }}"
                                required>
                            @error('phone_number')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Employment Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="mgr_id" class="form-label">
                                Manager <span class="required-star">*</span>
                            </label>
                            <select id="mgr_id" name="mgr_id" class="form-control">
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}"
                                        {{ old('mgr_id', $employee->mgr_id) == $manager->id ? 'selected' : '' }}>
                                        {{ $manager->full_name }} ({{ $manager->position }})
                                    </option>
                                @endforeach
                            </select>
                            @error('mgr_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="salary" class="form-label">
                                Salary ($) <span class="required-star">*</span>
                            </label>
                            <input type="number" id="salary" name="salary" class="form-control"
                                placeholder="3000$" value="{{ old('salary', $employee->salary) }}" min="0"
                                step="0.01" required>
                            @error('salary')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="hire_date" class="form-label">
                                Hire Date <span class="required-star">*</span>
                            </label>
                            <input type="date" id="hire_date" name="hire_date" class="form-control"
                                value="{{ old('hire_date', \Carbon\Carbon::parse($employee->hire_date)->format('Y-m-d')) }}"
                                required>
                            @error('hire_date')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">
                                Role <span class="required-star">*</span>
                            </label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="coach"
                                    {{ old('role', $employee->role) == 'coach' ? 'selected' : '' }}>Coach</option>
                                <option value="employee"
                                    {{ old('role', $employee->role) == 'employee' ? 'selected' : '' }}>Employee
                                </option>
                            </select>
                            @error('role')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Professional Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" id="specialization" name="specialization" class="form-control"
                                placeholder="e.g., Fitness Training, Nutrition"
                                value="{{ old('specialization', $employee->specialization) }}">
                            @error('specialization')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="years_of_experience" class="form-label">
                                Years of Experience <span class="required-star">*</span>
                            </label>
                            <input type="number" id="years_of_experience" name="years_of_experience"
                                class="form-control" placeholder="e.g., 5"
                                value="{{ old('years_of_experience', $employee->years_of_experience) }}"
                                min="0" required>
                            @error('years_of_experience')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="working_hours_start" class="form-label">
                                Working Hours Start <span class="required-star">*</span>
                            </label>
                            <input type="time" id="working_hours_start" name="working_hours_start"
                                class="form-control"
                                value="{{ old('working_hours_start', \Carbon\Carbon::parse($employee->working_hours_start)->format('H:i')) }}"
                                required>
                            @error('working_hours_start')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="working_hours_end" class="form-label">
                                Working Hours End <span class="required-star">*</span>
                            </label>
                            <input type="time" id="working_hours_end" name="working_hours_end"
                                class="form-control"
                                value="{{ old('working_hours_end', \Carbon\Carbon::parse($employee->working_hours_end)->format('H:i')) }}"
                                required>
                            @error('working_hours_end')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <h3 class="section-title">User Account Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter password" autocomplete="new-password">
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                Confirm Password
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Confirm password"
                                autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="birth_date" class="form-label">
                                Birth Date
                            </label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control"
                                value="{{ old('birth_date', \Carbon\Carbon::parse($employee->birth_date)->format('Y-m-d')) }}"
                                required>
                            @error('birth_date')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender" class="form-label">
                                Gender
                            </label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male"
                                    {{ old('gender', optional($user)->gender) === 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female"
                                    {{ old('gender', optional($user)->gender) === 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                            @error('gender')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{--  --}}
                    <div class="form-grid">
                        <div class="form-group">
                            <div class="toggle-container">
                                <div class="toggle-card">
                                    <div class="toggle-wrapper">
                                        <input type="checkbox" id="is_admin" name="is_admin" value="1"
                                            {{ old('is_admin', optional($user)->is_admin) ? 'checked' : '' }}
                                            class="admin-toggle">

                                        <div class="toggle-content">
                                            <div class="toggle-header">
                                                <div class="toggle-title">
                                                    <i class="fas fa-user-shield toggle-icon"></i>
                                                    <div>
                                                        <h4>Administrator Privileges</h4>
                                                        <p>Grant full system access and control</p>
                                                    </div>
                                                </div>

                                                <label for="is_admin" class="toggle-switch">
                                                    <span class="toggle-slider"></span>
                                                    <span class="toggle-status">
                                                        <span class="status-off">OFF</span>
                                                        <span class="status-on">ON</span>
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="toggle-details">
                                                <div class="permission-level">
                                                    <span class="level-badge">Admin Level</span>
                                                    <div class="level-indicator">
                                                        <span class="level-dot active"></span>
                                                        <span class="level-dot"></span>
                                                        <span class="level-dot"></span>
                                                        <span class="level-dot"></span>
                                                    </div>
                                                </div>

                                                <div class="permission-summary">
                                                    <div class="permission-item">
                                                        <i class="fas fa-check-circle"></i>
                                                        <span>Full system access</span>
                                                    </div>
                                                    <div class="permission-item">
                                                        <i class="fas fa-check-circle"></i>
                                                        <span>Manage all users</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('is_admin')
                                        <div class="toggle-error">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Profile Image</h3>
                    <div class="form-group">
                        <label class="form-label">
                            Update Employee Photo
                            <span class="form-help">(Leave empty to keep current image. JPEG, PNG, JPG, GIF - Max
                                2MB)</span>
                        </label>

                        <div class="file-upload">
                            <button type="button" class="file-upload-btn">
                                <span id="fileName">Click to upload new image</span>
                            </button>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif"
                                onchange="document.getElementById('fileName').textContent = this.files[0] ? this.files[0].name : 'Click to upload new image'">
                        </div>

                        <div class="image-preview">
                            <img id="imagePreview" alt="Image Preview">
                        </div>

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-update">
                        <i class="fas fa-save"></i>
                        Update Employee
                    </button>

                    <a href="{{ route('employees.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>

            </form>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;"
                onsubmit="return confirm('Are you sure you want to delete this employee? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">
                    <i class="fas fa-trash"></i>
                    Delete Employee
                </button>
            </form>
        </div>
    </div>
    </div>

    <!-- JavaScript إضافي -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');

            // معاينة الصورة الجديدة قبل الرفع
            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.style.display = 'none';
                    }
                });
            }

            // تحديث اسم الملف عند الاختيار
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const fileName = e.target.files[0] ? e.target.files[0].name :
                        'Click to upload new image';
                    document.getElementById('fileName').textContent = fileName;
                });
            }

            // التحقق من أن وقت النهاية بعد وقت البداية
            document.getElementById('employeeForm').addEventListener('submit', function(e) {
                const start = document.getElementById('working_hours_start').value;
                const end = document.getElementById('working_hours_end').value;

                if (start && end && start >= end) {
                    e.preventDefault();
                    alert('Working hours end must be after working hours start!');
                    document.getElementById('working_hours_end').focus();
                }
            });

            // عرض رسائل الخطأ
            @if ($errors->any())
                let errorMessage = "Please fix the following errors:\n";
                @foreach ($errors->all() as $error)
                    errorMessage += "• {{ $error }}\n";
                @endforeach
                alert(errorMessage);
            @endif

            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>
</body>

</html>
