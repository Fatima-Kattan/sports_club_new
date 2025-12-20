<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/employees.css') }}">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
    <title>Fitness Club - {{ $employee->full_name }}</title>
    <style>
        .deleted-employee {
            /* النص */
            font-size: 2.75rem;
            font-weight: 800;
            color: #dc2626;
            text-align: center;

            /* التخطيط */
            margin: 3rem 0;
            padding: 2rem;
            position: relative;

            /* التأثيرات */
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-family: 'Segoe UI', system-ui, sans-serif;

            /* خلفية */
            background: linear-gradient(135deg,
                    rgba(220, 38, 38, 0.1) 0%,
                    rgba(185, 28, 28, 0.05) 100%);
            border-radius: 16px;
            border: 2px solid rgba(220, 38, 38, 0.3);

            /* تأثير النص المحذوف */
            text-decoration: line-through;
            text-decoration-color: #ef4444;
            text-decoration-thickness: 3px;

            /* ظل للنص */
            text-shadow:
                0 2px 4px rgba(0, 0, 0, 0.1),
                0 4px 8px rgba(220, 38, 38, 0.15);
        }

        /* خلفية خطوط متقطعة */
        .deleted-employee::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 10px,
                    rgba(220, 38, 38, 0.05) 10px,
                    rgba(220, 38, 38, 0.05) 20px);
            border-radius: 14px;
            pointer-events: none;
        }

        /* خط ساطع تحته */
        .deleted-employee::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg,
                    transparent 0%,
                    #ef4444 50%,
                    transparent 100%);
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.5);
        }

        /* علامة مائية خلفية */
        .deleted-employee {
            position: relative;
            overflow: hidden;
        }

        .deleted-employee::after {
            content: 'DELETED';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 8rem;
            font-weight: 900;
            color: rgba(220, 38, 38, 0.08);
            z-index: -1;
            letter-spacing: 1rem;
            white-space: nowrap;
            pointer-events: none;
        }

        /* تأثير اهتزاز خفيف */
        @keyframes shakeDeleted {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-3px);
            }

            75% {
                transform: translateX(3px);
            }
        }

        .deleted-employee {
            animation: shakeDeleted 0.5s ease-in-out 0.3s;
        }

        /* تأثير وميض للخط */
        @keyframes blinkLine {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .deleted-employee {
            text-decoration-line: line-through;
            animation: blinkLine 2s infinite;
        }
    </style>
</head>

<body>
    <div class="employee-detail-container">
        @if ($employee->trashed())
                    <h1 class=" deleted-employee">
                            Deleted Employee </h1>
                        @endif
                        <h1>
        <!-- الهيدر مع صورة الموظف -->
        <div class="employee-header">
            <div class="header-content">
                {{-- تعديل لازم --}}
                @if ($employee->image)
                    <img src="{{ asset('images/employees/' . $employee->image) }}" alt="{{ $employee->full_name }}"
                        class="employee-avatar pulse-animation">
                @else
                    <div class="employee-avatar pulse-animation"
                        style="background: linear-gradient(135deg, #05C1F7, #00ff88); 
                                display: flex; align-items: center; justify-content: center;
                                font-size: 3rem; color: white;">
                        {{ substr($employee->full_name, 0, 1) }}
                    </div>
                @endif

                <div class="employee-title">
                    <h1>
                        <span class="employee-name">{{ $employee->full_name }}</span>
                    </h1>

                    <span class="position">{{ $employee->position }}</span>

                    <div class="header-actions">
                        @if ($employee->trashed())
                        <a href="{{ route('employees.trashed') }}" class="btn btn-secondary">
                            ← Back to Deleted Employees
                        </a>
                        @else
                        <a href="{{ route('employees.trashed') }}" class="btn btn-secondary">
                            ← Back to  Employees
                        </a>
                        @endif
                        @if (Auth::user()->is_admin)

                            <form action="{{ route('employees.force-delete', $employee->id) }}" method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    🗑️ Permanently delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="employee-content">
            <!-- القسم الأول: المعلومات الأساسية -->
            <div class="info-section">
                <h3 class="section-title">
                    <svg class="info-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    Basic Information
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Position</span>
                        <div class="info-value">{{ $employee->position }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Specialization</span>
                        <div class="info-value">{{ $employee->specialization ?? 'N/A' }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Role</span>
                        <div class="info-value">
                            @if ($employee->role == 'coach')
                                <span class="department-badge">Training</span>
                            @elseif($employee->role == 'manager')
                                <span class="department-badge">Management</span>
                            @elseif($employee->role == 'hr')
                                <span class="department-badge">HR</span>
                            @else
                                <span class="department-badge">{{ $employee->role }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Years of Experience</span>
                        <div class="info-value">
                            <span class="experience-badge">
                                {{ $employee->years_of_experience }} Years
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Hire Date</span>
                        <div class="info-value">
                            {{ \Carbon\Carbon::parse($employee->hire_date)->format('M d, Y') }}
                            <small style="color: #A1A09A; display: block; margin-top: 5px;">
                                ({{ \Carbon\Carbon::parse($employee->hire_date)->diffForHumans() }})
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- القسم الثاني: معلومات الراتب -->
            <div class="info-section">
                <h3 class="section-title">
                    <svg class="info-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                            clip-rule="evenodd" />
                    </svg>
                    Salary Information
                </h3>

                <div class="salary-display">
                    ${{ number_format($employee->salary, 2) }}
                </div>
                <div class="salary-period">Annual Salary</div>

                <div class="info-grid" style="margin-top: 20px;">
                    <div class="info-item">
                        <span class="info-label">Monthly</span>
                        <div class="info-value">${{ number_format($employee->salary / 12, 2) }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Weekly</span>
                        <div class="info-value">${{ number_format($employee->salary / 52, 2) }}</div>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Daily (8hrs)</span>
                        <div class="info-value">${{ number_format($employee->salary / 260, 2) }}</div>
                    </div>
                </div>
            </div>

            <!-- القسم الثالث: ساعات العمل -->
            <div class="info-section">
                <h3 class="section-title">
                    <svg class="info-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    Working Hours
                </h3>

                <div class="hours-display">
                    <span class="time">
                        {{ \Carbon\Carbon::parse($employee->working_hours_start)->format('h:i A') }}
                    </span>
                    <span class="separator">→</span>
                    <span class="time">
                        {{ \Carbon\Carbon::parse($employee->working_hours_end)->format('h:i A') }}
                    </span>
                </div>

                @php
                    $start = \Carbon\Carbon::parse($employee->working_hours_start);
                    $end = \Carbon\Carbon::parse($employee->working_hours_end);
                    $hours = $start->diffInHours($end);
                @endphp

                <div style="text-align: center; margin-top: 15px; color: #A1A09A; font-size: 0.9rem;">
                    Total: {{ $hours }} hours per day
                </div>
            </div>

            <!-- القسم الرابع: المدير -->
            @if ($employee->manager)
                <div class="info-section">
                    <h3 class="section-title">
                        <svg class="info-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        Reports To
                    </h3>

                    <div class="manager-display">
                        @if ($employee->manager->image)
                            <img src="{{ asset('storage/' . $employee->manager->image) }}"
                                alt="{{ $employee->manager->full_name }}" class="manager-avatar">
                        @else
                            <div class="manager-avatar"
                                style="background: linear-gradient(135deg, #8a2be2, #4B0082);
                                        display: flex; align-items: center; justify-content: center;
                                        color: white; font-size: 1.2rem;">
                                {{ substr($employee->manager->full_name, 0, 1) }}
                            </div>
                        @endif

                        <div class="manager-details">
                            <h4>{{ $employee->manager->full_name }}</h4>
                            <p>{{ $employee->manager->position }}</p>
                            <a href="{{ route('employees.show', $employee->manager->id) }}" class="edit-link">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- القسم الخامس: معلومات التواصل -->
            <div class="info-section">
                <h3 class="section-title">
                    <svg class="info-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    Contact Information
                </h3>

                <div class="contact-info-grid">
                    <div class="contact-item">
                        <svg class="contact-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>{{ $employee->email }}</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <svg class="contact-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>{{ $employee->phone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // إضافة تفاعلات بسيطة
        document.addEventListener('DOMContentLoaded', function() {
            // تأثير عند تحميل الصفحة
            const sections = document.querySelectorAll('.info-section');
            sections.forEach((section, index) => {
                section.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>
