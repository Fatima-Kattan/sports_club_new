<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fitness Club - Verify Email</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4It8cU8J2DH5HMqKDtQg23qD3xBRJQIBzP8WFIFg=">
    
    <!-- CSS من ملف خارجي -->
    <link rel="stylesheet" href="{{ url('/css/auth.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo-container">
            <div class="logo">
                <div class="logo-icon">
                    <x-application-logo />
                </div>
                <div class="logo-text">FITNESS CLUB</div>
            </div>
        </div>

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="header">
                <h2><i class="fas fa-envelope-circle-check"></i> Verify Email</h2>
                <p>Please verify your email address</p>
            </div>

            <!-- Message -->
            <div class="message" style="background: rgba(5, 193, 247, 0.1); border: 1px solid rgba(5, 193, 247, 0.2); color: var(--primary);">
                <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
            </div>

            <!-- Success Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="message success" style="margin-top: 20px;">
                    <p><i class="fas fa-check-circle" style="margin-right: 8px;"></i> {{ __('A new verification link has been sent to the email address you provided during registration.') }}</p>
                </div>
            @endif

            <!-- Actions -->
            <div class="form-options" style="margin: 30px 0; justify-content: center; gap: 30px;">
                <!-- Resend Verification Email -->
                <form method="POST" action="{{ route('verification.send') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="submit-btn" style="padding: 12px 30px; width: auto;">
                        <i class="fas fa-paper-plane" style="margin-right: 10px;"></i> {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <!-- Log Out -->
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn" style="padding: 12px 30px; background: transparent; border: 2px solid var(--border); color: var(--gray);">
                        <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> {{ __('Log Out') }}
                    </button>
                </form>
            </div>

            <!-- Optional: Instructions -->
            <div class="login-link" style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                <p style="color: var(--gray); font-size: 14px; text-align: center;">
                    <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                    Check your spam folder if you don't see the email in your inbox.
                </p>
            </div>
        </div>
    </div>

    <!-- رابط ملف JavaScript الخارجي -->
    <script src="{{ asset('js/auth.js') }}"></script>

    <style>
        /* زر Logout خاص */
        .logout-btn {
            background: transparent !important;
            border: 2px solid var(--border) !important;
            color: var(--gray) !important;
            font-family: 'Oswald', sans-serif;
            font-weight: 600;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(245, 101, 101, 0.1) !important;
            border-color: #f56565 !important;
            color: #f56565 !important;
            transform: translateY(-2px);
        }

        /* تنسيق الأزرار في الصف */
        .form-options form {
            display: flex;
            align-items: center;
        }
    </style>
</body>
</html>