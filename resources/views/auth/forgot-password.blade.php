<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fitness Club - Forgot Password</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDVDMUY3IiBoZWlnaHQ9IjY0cHgiIHdpZHRoPSI2NHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAzMjYuODUgMzI2Ljg1IiB4bWw6c3BhY2U9InByZXNlcnZlIj48ZyBpZD0iU1ZHUmVwb19iZ0NhcnJpZXIiIHN0cm9rZS13aWR0aD0iMCI+PC9nPjxnIGlkPSJTVkdSZXBvX3RyYWNlckNhcnJpZXIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PC9nPjxnIGlkPSJTVkdSZXBvX2ljb25DYXJyaWVyIj4gPHBhdGggZD0iTTI2NC42OTMsMzI2Ljg0NWgtMzguMDc5Yy00LjQxOCwwLTgtMy41ODItOC04di0zMC40NjRIMTA4LjIzMXYzMC40NjRjMCw0LjQxOC0zLjU4Miw4LTgsOEg2Mi4xNTJjLTQuNDE4LDAtOC0zLjU4It8cU8J2DH5HMqKDtQg23qD3xBRJQIBzP8WFIFg=">

    
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

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
                <h2><i class="fas fa-key"></i> Reset Password</h2>
                <p>Enter your email to receive a reset link</p>
            </div>

            <!-- Message -->
            <div class="message"
                style="background: rgba(5, 193, 247, 0.1); border: 1px solid rgba(5, 193, 247, 0.2); color: var(--primary);">
                <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="message success" :status="session('status')" />

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="forgot_email" name="email" class="form-input"
                            value="{{ old('email') }}" required autofocus autocomplete="email"
                            placeholder="you@example.com">
                    </div>
                    @error('email')
                        <div class="input-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane" style="margin-right: 10px;"></i> EMAIL PASSWORD RESET LINK
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="login-link" style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                <p>
                    <a href="{{ route('login') }}" class="login-link-text">
                        <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i> Back to Login
                    </a>
                </p>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
