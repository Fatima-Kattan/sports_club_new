<header class="section-header">
    <h2><i class="fas fa-user-edit"></i> Profile Information</h2>
    <p>Update your account's profile information and email address</p>
</header>

<div class="section-body">
    @if ($errors->any())
        <div class="error-message">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    @if (session('status') === 'profile-updated')
        <div class="success-message">
            <i class="fas fa-check-circle"></i>
            <span>Profile updated successfully!</span>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-grid">
            <!-- Full Name -->
            <div class="form-group">
                <label class="form-label" for="name">
                    <i class="fas fa-user"></i> Full Name
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="full_name" class="form-input"
                        value="{{ old('full_name', $user->full_name) }}" required autofocus autocomplete="name"
                        placeholder="John Doe">
                </div>
                @error('full_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label class="form-label" for="email">
                    <i class="fas fa-envelope"></i> Email Address
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" class="form-input"
                        value="{{ old('email', $user->email) }}" required autocomplete="email"
                        placeholder="john@example.com">
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <label class="form-label" for="phone_number">
                    <i class="fas fa-phone"></i> Phone Number
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-phone"></i>
                    <input type="tel" id="phone_number" name="phone_number" class="form-input"
                        value="{{ old('phone_number', $user->phone_number) }}" required placeholder="+1 234 567 890">
                </div>
                @error('phone_number')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Birth Date -->
            <div class="form-group">
                <label class="form-label" for="birth_date">
                    <i class="fas fa-birthday-cake"></i> Birth Date
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" id="birth_date" name="birth_date" class="form-input"
                        value="{{ old('birth_date', $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') : '') }}"
                        required>
                </div>
                @error('birth_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label class="form-label" for="gender">
                    <i class="fas fa-venus-mars"></i> Gender
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-venus-mars"></i>
                    <select id="gender" name="gender" required class="form-select">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female
                        </option>
                    </select>
                </div>
                @error('gender')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Profile Image -->
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-camera"></i> Profile Image
            </label>

            <!-- Current Image Section -->
            @php
                
                function getImagePath($userImage)
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

            <div class="current-image">
                <img src="{{ getImagePath($user->image) }}" alt="Current profile image" id="currentProfileImage"
                    onerror="this.onerror=null; this.src='{{ asset('images/users/user.jpg') }}';">
                <span>Current profile image</span>
            </div>

            <!-- File Upload Area -->
            <div class="file-upload-wrapper">
                <label for="image" class="file-upload-area">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Click to upload or drag and drop</p>
                    <p>JPG, PNG, GIF up to 2MB</p>
                    <small>Leave empty to keep current image</small>
                </label>
                <input type="file" id="image" name="image" accept="image/*" class="form-file-input">
            </div>

            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Verification Notice -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="verification-notice">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <p>
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="verification-link">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p style="margin-top: 8px;">
                            <i class="fas fa-check-circle" style="color: #10b981;"></i>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="action-buttons">
            <button type="submit" class="btn btn-primary">
                Save Changes
            </button>
        </div>
    </form>

    <!-- Verification Form (Hidden) -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
</div>
