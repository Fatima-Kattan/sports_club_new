<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/employees.css') }}">
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42Mi02OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjQ2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">
    <title>Fitness Club - Employees</title>
    <style>
        /* .page-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin: 1rem 0;
            margin-bottom: 2rem;
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg,
                    rgba(220, 38, 38, 0.1) 0%,
                    rgba(185, 28, 28, 0.05) 100%);
            border-left: 4px solid #b91c1c;
            border-right: 4px solid #b91c1c;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            color: #05C1F7;
            letter-spacing: 2px;
        }
        .page-title::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 10px,
                    rgba(185, 28, 28, 0.07) 10px,
                    rgba(185, 28, 28, 0.03) 20px);
            z-index: -1;
        }

        .page-title::after {
            content: '⚠️';
            font-size: 2rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .page-title span {
            position: relative;
            padding: 0 0.5rem;
        }

        .page-title span::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 3px;
            background: #b91c1c;
            transform: rotate(-3deg);
            opacity: 0.6;
        }
        */
        .table-container {
            box-shadow: 0px 2px 15px 3px #b91c1c41
        }

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
    <div class="container">
        <h1 class="deleted-employee">Deleted Employees </h1>

        <div class="table-container">
            <div class="table-controls">
                <div class="search-container">
                    <svg class="search-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                    <input type="text" class="search-input" placeholder="Search employees...">
                </div>
                @if (Auth::check() &&Auth::user()->is_admin)
                    <div class="buttons-container">
                        <a href="{{ route('employees.index') }}" class="svg-button" title="back to employee page">
                            <svg xmlns="http://www.w3.org/2000/svg" height="27px" viewBox="0 -960 960 960"
                                width="27px" fill="#0099cc">
                                <path d="M360-200 80-480l280-280 56 56-183 184h647v80H233l184 184-57 56Z" />
                            </svg> </a>
                        <button class="filter-button">
                            <svg class="filter-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                            </svg>
                            Filter by Role
                            <svg class="chevron-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            @if ($employees->isEmpty())
                <div class="no-data-message">
                    <p>No employees found.</p>
                </div>
            @else
                <table class="data-table">
                    <thead>
                        <tr>
                            <th scope="col" class="font-medium text-heading">#</th>
                            <th scope="col" class="font-medium text-heading">Employee Name</th>
                            <th scope="col" class="font-medium text-heading">Specialization</th>
                            <th scope="col" class="font-medium text-heading">Position</th>
                            <th scope="col" class="font-medium text-heading">Role</th>
                            <th scope="col" class="font-medium text-heading">Contact</th>
                            <th scope="col" class="font-medium text-heading">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $index => $employee)
                            <tr>
                                <td class="row-number">{{ $loop->iteration }}</td>
                                <th scope="row" class="text-heading whitespace-nowrap font-medium">
                                    {{ $employee->full_name }}
                                    @if ($employee->manager && $employee->manager->id != $employee->id)
                                        <div class="manager-info">
                                            <small>Reports to: {{ $employee->manager->full_name }}</small>
                                        </div>
                                    @endif
                                </th>
                                <td class="text-body">{{ $employee->specialization }}</td>
                                <td class="text-body">{{ $employee->position }}</td>
                                <td class="text-body">
                                    @if ($employee->role == 'coach')
                                        <span class="department-badge">Coach</span>
                                    @elseif($employee->role == 'manager')
                                        <span class="department-badge">Management</span>
                                    @elseif($employee->role == 'hr')
                                        <span class="department-badge">HR</span>
                                    @else
                                        <span class="department-badge">{{ $employee->role }}</span>
                                    @endif
                                </td>
                                <td class="text-body">
                                    <div class="contact-info">
                                        <div class="email">{{ $employee->email }}</div>
                                        <div class="phone">{{ $employee->phone_number }}</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="edit-link">View</a>
                                        <form action="{{ route('employees.restore', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="edit-link">
                                                Restore
                                            </button>
                                        </form>
                                    @if (Auth::check() &&Auth::user()->is_admin)
                                        <form action="{{ route('employees.force-delete', $employee->id) }}"
                                            method="POST" style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="edit-link ml-2">
                                                Permanently delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="table-summary">
                    <p>Total employees: {{ $employees->count() }}</p>
                </div>
            @endif
        </div>


    </div>

    <script src="{{ asset('js/employees.js') }}"></script>
</body>

</html>
