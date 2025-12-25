<header class="section-header">
    <h2><i class="fas fa-lock"></i> Update Password</h2>
    <p>Ensure your account is using a long, random password to stay secure</p>
</header>

<div class="section-body">
    @if (session('status') === 'password-updated')
        <div class="success-message">
            <i class="fas fa-check-circle"></i>
            <span>Password updated successfully!</span>
        </div>
    @endif

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="current_password">
                    <i class="fas fa-lock"></i> Current Password
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="current_password" name="current_password" class="form-input" required
                        placeholder="Enter current password">
                    <button type="button" class="password-toggle" data-target="current_password">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="new_password">
                    <i class="fas fa-key"></i> New Password
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-key"></i>
                    <input type="password" id="new_password" name="password" class="form-input" required
                        placeholder="Enter new password">
                    <button type="button" class="password-toggle" data-target="new_password">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="confirm_password">
                    <i class="fas fa-key"></i> Confirm New Password
                </label>
                <div class="input-with-icon">
                    <i class="fas fa-key"></i>
                    <input type="password" id="confirm_password" name="password_confirmation" class="form-input"
                        required placeholder="Confirm new password">
                    <button type="button" class="password-toggle" data-target="confirm_password">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="action-buttons">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-key"></i> Update Password
            </button>
        </div>
    </form>
</div>
