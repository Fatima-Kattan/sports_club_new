<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fitness Club - Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <h2><i class="fas fa-user"></i> Log In</h2>
                <p>Enter your account details</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="message success" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="email" placeholder="you@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                </div>

                <!-- Password -->
<div class="form-group">
    <label class="form-label">Password</label>
    <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="login_password" name="password" class="form-input" required
            autocomplete="off" placeholder="••••••••">
        <button type="button" class="password-toggle" data-target="login_password">
            <i class="fas fa-eye-slash"></i>
        </button>
    </div>
    @error('password')
        <div class="input-error">{{ $message }}</div>
    @enderror
</div>
                <!-- Options -->
                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" id="remember_me" name="remember">
                        <div class="checkbox-custom">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ __('Remember me') }}
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </form>

            <!-- Register Link -->
            <div class="register-link">
                <p>{{ __('Don\'t have an account?') }} <a href="{{ route('register') }}" class="register-link-text">{{ __('Create Account') }}</a></p>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>