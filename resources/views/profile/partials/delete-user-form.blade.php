<header class="section-header">
    <h2><i class="fas fa-trash-alt"></i> Delete Account</h2>
    <p>Permanently delete your account and all associated data</p>
</header>

<div class="section-body">
    <div class="warning-box">
        <div class="warning-header">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Warning: This action cannot be undone</h3>
        </div>

        <p class="warning-text">
            Once you delete your account, you will lose access to all your data including:
        </p>

        <ul class="warning-list">
            <li>All personal information and profile data</li>
            <li>Subscription and payment information</li>
            <li>Any other data associated with your account</li>
        </ul>
    </div>

    <form method="post" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
        @csrf
        @method('delete')

        <!-- Password Confirmation -->
        <div class="form-group">
            <label class="form-label" for="delete_password">
                <i class="fas fa-lock"></i> Confirm Your Password
            </label>
            <div class="input-with-icon">
                <i class="fas fa-lock"></i>
                <input type="password" id="delete_password" name="password" class="form-input" required
                    placeholder="Enter your password to confirm">
                <button type="button" class="password-toggle" data-target="delete_password">
                    <i class="fas fa-eye-slash"></i>
                </button>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="action-buttons">
            <button type="button" class="btn btn-secondary cancel-delete-btn">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button type="submit" class="btn btn-danger" id="deleteBtn" >
                <i class="fas fa-trash-alt"></i> Delete Account Permanently
            </button>
        </div>
    </form>
</div>
