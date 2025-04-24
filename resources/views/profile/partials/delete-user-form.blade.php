<section class="mb-5">
    <header>
        <h2 class="h4 mb-3 fw-medium">
            Delete Account
        </h2>

        <p class="text-muted small mb-4">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion-modal">
        Delete Account
    </button>

    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1"
        aria-labelledby="confirm-user-deletion-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirm-user-deletion-modal-label">Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5>Are you sure you want to delete your account?</h5>

                        <p class="text-muted small">
                            Once your account is deleted, all of its resources and data will be permanently deleted.
                            Please enter your password to confirm you would like to permanently delete your account.
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password">
                            @if($errors->userDeletion->get('password'))
                                <div class="text-danger mt-1 small">
                                    @foreach($errors->userDeletion->get('password') as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger">
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>