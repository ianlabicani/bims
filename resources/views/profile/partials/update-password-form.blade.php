<section>
    <header>
        <h2 class="h4 mb-3 fw-medium">
            Update Password
        </h2>

        <p class="text-muted small mb-4">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mb-5">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control"
                autocomplete="current-password">
            @if($errors->updatePassword->get('current_password'))
                <div class="text-danger mt-1 small">
                    @foreach($errors->updatePassword->get('current_password') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input id="update_password_password" name="password" type="password" class="form-control"
                autocomplete="new-password">
            @if($errors->updatePassword->get('password'))
                <div class="text-danger mt-1 small">
                    @foreach($errors->updatePassword->get('password') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control" autocomplete="new-password">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="text-danger mt-1 small">
                    @foreach($errors->updatePassword->get('password_confirmation') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted small mb-0">Saved.</p>
            @endif
        </div>
    </form>
</section>