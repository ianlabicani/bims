@extends('shell')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow rounded-3">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4 text-center">Forgot Password</h4>

                        <div class="mb-4 text-muted small">
                            Forgot your password? No problem. Just let us know your email address and we will email you a
                            password reset link that will allow you to choose a new one.
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection