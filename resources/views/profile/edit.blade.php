<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ auth()->user()->name }} - Fitness Club Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4Mi04LTh2LTYuOTM5SDI0LjA3NGMtNC40MTgsMC04LTMuNTgyLTgtOHYtNzkuODc1YzAtNC40MTgsMy41ODItOCw4LThoMzAuMDc3di02LjkzOGMwLTQuNDE4LDMuNTgyLTgsOC04aDM4LjA3OWM0LjQxOCwwLDgsMy41ODIsOCw4djMwLjQ2NGgxMTAuMzg0di0zMC40NjRjMC00LjQxOCwzLjU4Mi04LDgtOGgzOC4wNzljNC40MTgsMCw4LDMuNTgyLDgsOHY2LjkzOGgzMC4wNzdjNC40MTgsMCw4LDMuNTgyLDgsOHY3OS44NzVjMCw0LjQxOC0zLjU4Miw4LTgsOGgtMzAuMDc3djYuOTM5QzI3Mi42OTMsMzIzLjI2MywyNjkuMTEyLDMyNi44NDUsMjY0LjY5MywzMjYuODQ1eiBNMjM0LjYxNSwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzaC0yMi4wNzlWMzEwLjg0NXogTTcwLjE1MiwzMTAuODQ1aDIyLjA3OXYtOTMuNzUzSDcwLjE1MlYzMTAuODQ1eiBNMjcyLjY5MywyOTUuOTA1aDIyLjA3N1YyMzIuMDNoLTIyLjA3N1YyOTUuOTA1eiBNMzIuMDc0LDI5NS45MDVoMjIuMDc3VjIzMi4wM0gzMi4wNzRWMjk1LjkwNXogTTEwOC4yMzEsMjcyLjM4MWgxMTAuMzg0di0xNi44MjVIMTA4LjIzMVYyNzIuMzgxeiBNMTQ1LjQ0MywyMjMuMzc2Yy0xLjMzMSwwLTIuNjgtMC4zMzItMy45MjItMS4wMzJjLTMuODQ5LTIuMTctNS4yMDktNy4wNS0zLjA0LTEwLjg5OGMxNC4yNzMtMjUuMzEyLDMzLjU0My00Ni43MTIsNTYuMjE0LTYzLjE4MWMtOS44OTQtMTMuNzAzLTIxLjE5Ny0yNi4xNzMtMzMuNjgxLTM3LjIyN2MtMzEuMDE5LDMzLjQwMy03My4zNTUsNTUuODk2LTEyMC4zOTUsNjEuNTk5YzEuMDQyLDQuMjA5LDIuMzAzLDguMzY4LDMuNzg0LDEyLjQ2OGMxLjUwMSw0LjE1NS0wLjY1LDguNzQxLTQuODA2LDEwLjI0MmMtNC4xNTgsMS41MDItOC43NDEtMC42NTEtMTAuMjQyLTQuODA3Yy01LjU3MS0xNS40MjQtOC4zOTYtMzEuNTk5LTguMzk2LTQ4LjA3N0MyMC45NTksNjMuOTA4LDg0Ljg2OCwwLDE2My40MjMsMGM3OC41NTQsMCwxNDIuNDYyLDYzLjkwOCwxNDIuNDYyLDE0Mi40NjNjMCwxNC4xNzktMi4xMDQsMjguMjAxLTYuMjU1LDQxLjY4Yy0xLjMwMSw0LjIyMy01Ljc4LDYuNTg5LTEwLDUuMjkxYy00LjIyMy0xLjMtNi41OTEtNS43NzctNS4yOTEtMTBjMy42OC0xMS45NTEsNS41NDYtMjQuMzksNS41NDYtMzYuOTcxYzAtNC44NjktMC4yNzYtOS42NzMtMC44MTQtMTQuNGMtMjUuODcxLDIuOTk3LTUwLjQwMywxMS41MjEtNzIuMTcyLDI0LjY2MmM0LjcxMyw3LjUwNCw5LjAxNywxNS4yNTMsMTIuODczLDIzLjIwMmMxLjkyOCwzLjk3NSwwLjI2OSw4Ljc2MS0zLjcwNiwxMC42ODljLTMuOTc1LDEuOTI1LTguNzYyLDAuMjY5LTEwLjY4OS0zLjcwN2MtMy41NzMtNy4zNjYtNy41MDEtMTQuNDg2LTExLjc2MS0yMS4zNDFjLTIwLjYyOSwxNS4wOTEtMzguMTc1LDM0LjY0Mi01MS4xOTYsNTcuNzM2QzE1MC45NDgsMjIxLjkxMSwxNDguMjM2LDIyMy4zNzYsMTQ1LjQ0MywyMjMuMzc2eiBNNjYuNjAxLDYxLjE5M2MtMTguNDkyLDIxLjk5NC0yOS42NDIsNTAuMzU0LTI5LjY0Miw4MS4yN2MwLDQuODM0LDAuMjc0LDkuNjM5LDAuODE5LDE0LjM5OWM0My4yNTctNS4wMTksODIuMjMzLTI1LjQ4NCwxMTAuODczLTU2LjAxMkMxMjQuNTU1LDgyLjM5MSw5Ni43Niw2OC44MTQsNjYuNjAxLDYxLjE5M3ogTTE3MS4zMjksOTguOTk4YzEzLjYyNSwxMi4wNDgsMjUuOTM2LDI1LjY2NCwzNi42MTEsNDAuNDQyYzIzLjU5OC0xNC4zNzgsNTAuMjE4LTIzLjc1OCw3OC4zMDctMjcuMTU1Yy05Ljk4Ny00MC42MzUtMzkuNjY3LTczLjYxNS03OC4yOTktODguMTk0QzIwMS4xMjUsNTEuOTM3LDE4OC40MzMsNzcuMzMzLDE3MS4zMjksOTguOTk4eiBNNzkuMzIxLDQ4LjA5NmMyOC42ODIsOC40NTgsNTUuOTE0LDIyLjM1Nyw3OS42ODEsNDAuNzA5YzE1Ljc3MS0yMC4wNjUsMjcuNDM1LTQzLjYwNiwzMy42MjY2OS40MDJDMTgzLjI0OCwxNy4xNzksMTczLjY2OCwxNiwxNjMuNDIzLDE2QzEzMS4xNjIsMTYsMTAxLjY4NiwyOC4xNCw3OS4zMjEsNDguMDk2eiI+PC9wYXRoPiA8L2c+PC9zdmc+">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/css/profile.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-main-container">
            <header class="profile-header">
                <div class="profile-header-content">
                    
                    <div class="profile-avatar">
                        <div class="avatar-container">
                            @php
                                function getAvatarPath($userImage)
                                {
                                    if (!$userImage) {
                                        return asset('images/users/user.jpg');
                                    }

                                    if (str_starts_with($userImage, 'images/users/')) {
                                        return asset($userImage);
                                    }

                                    return asset('images/users/' . $userImage);
                                }
                            @endphp

                            
                            <a href="#" id="editProfileFromAvatar" class="avatar-clickable">
                                <img src="{{ getAvatarPath(auth()->user()->image) }}" alt="{{ auth()->user()->name }}"
                                    class="user-profile-image"
                                    onerror="this.onerror=null; this.src='{{ asset('images/users/user.jpg') }}';">
                            </a>

                            <div class="avatar-placeholder"
                                @if (auth()->user()->image) style="display: none;" @endif>
                                <i class="fas fa-user"></i>
                            </div>
                        </div>

                        
                        <label for="image" class="change-avatar-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>

                    <div class="profile-info">
                        <div class="profile-header-top">
                            <div class="profile-name-wrapper">
                                <h1 class="profile-name">{{ auth()->user()->name }}</h1>
                                <div class="profile-badge">
                                    <i class="fas fa-badge-check"></i> Premium Member
                                </div>
                            </div>

                        </div>

                        <div class="profile-details">
                            <div class="profile-email">
                                <i class="fas fa-envelope"></i>
                                <span>{{ auth()->user()->email }}</span>
                                @if (auth()->user()->hasVerifiedEmail())
                                    <span class="verification-badge">
                                        <i class="fas fa-check-circle"></i> Verified
                                    </span>
                                @endif
                            </div>

                            <div class="profile-meta">
                                <span class="meta-item">
                                    <i class="fas fa-user-clock"></i>
                                    Member since {{ auth()->user()->created_at->format('F Y') }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    Joined {{ auth()->user()->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>


                    </div>
                </div>
            </header>
        </div>

        <!-- Main Content -->
        <main class="profile-main">
            <!-- Sidebar - Account Settings Only -->
            <aside class="profile-sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title"><i class="fas fa-cog"></i> Account Settings</h3>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#" class="sidebar-link active" data-section="profile">
                                <i class="fas fa-user-circle"></i>
                                <span>Profile Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-link" data-section="password">
                                <i class="fas fa-lock"></i>
                                <span>Update Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-link" data-section="delete">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete Account</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-card">
                    <h3 class="sidebar-title"><i class="fas fa-info-circle"></i> Quick Stats</h3>
                    <div class="quick-stats">
                        <div class="stat-box">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong>Member</strong>
                                <span>{{ auth()->user()->created_at->diffInMonths(now()) }} months</span>
                            </div>
                        </div>
                        <div class="stat-box">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <strong>Security</strong>
                                <span>Excellent</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                @auth
                    @if (auth()->user()->email == 'admin@gmail.com' ||
                            (isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1) ||
                            (isset(auth()->user()->role) && auth()->user()->role == 'admin'))
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-grip-vertical"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    @endif
                @endauth
            </aside>

            <!-- Main Profile Content -->
            <div class="profile-content">
                <!-- Profile Information Card (Default View) -->
                <div class="profile-card active" id="profileCard">
                    <div class="card-header">
                        <h2><i class="fas fa-id-card"></i> Personal Information</h2>
                        <div class="card-actions">
                            <button class="btn-edit" id="editProfileBtn">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="profile-info-grid">
                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="info-content">
                                    <label>Full Name</label>
                                    <div class="info-value">{{ auth()->user()->name }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <label>Phone Number</label>
                                    <div class="info-value">{{ auth()->user()->phone_number ?? 'Not provided' }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <label>Email Address</label>
                                    <div class="info-value">
                                        {{ auth()->user()->email }}
                                        @if (auth()->user()->hasVerifiedEmail())
                                            <span class="email-status verified">
                                                <i class="fas fa-check-circle"></i> Verified
                                            </span>
                                        @else
                                            <span class="email-status unverified">
                                                <i class="fas fa-exclamation-circle"></i> Unverified
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-birthday-cake"></i>
                                </div>
                                <div class="info-content">
                                    <label>Birth Date</label>
                                    <div class="info-value">
                                        {{ auth()->user()->birth_date ? \Carbon\Carbon::parse(auth()->user()->birth_date)->format('F j, Y') : 'Not provided' }}
                                    </div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-venus-mars"></i>
                                </div>
                                <div class="info-content">
                                    <label>Gender</label>
                                    <div class="info-value">
                                        {{ auth()->user()->gender ? ucfirst(auth()->user()->gender) : 'Not specified' }}
                                    </div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="info-content">
                                    <label>Member Since</label>
                                    <div class="info-value">{{ auth()->user()->created_at->format('F j, Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Form (Hidden Initially) -->
                <div class="profile-card edit-form" id="editForm" style="display: none;">
                    <div class="card-header">
                        <h2><i class="fas fa-user-edit"></i> Edit Profile Information</h2>
                        <div class="card-actions">
                            <button class="btn-cancel" id="cancelEditBtn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="profile-card" id="passwordCard" style="display: none;">
                    <div class="card-header">
                        <h2><i class="fas fa-lock"></i> Update Password</h2>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="profile-card" id="deleteCard" style="display: none;">
                    <div class="card-header">
                        <h2><i class="fas fa-trash-alt"></i> Delete Account</h2>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/profile.js') }}"></script>
</body>

</html>
