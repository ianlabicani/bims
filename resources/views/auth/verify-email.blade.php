@extends('guest.shell')

@section('guest-content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Verify Email Address</h2>
                    <div class="mb-6 text-sm text-gray-600">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link we
                        just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif

                <div class="flex justify-between items-center space-x-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                            Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800 text-sm underline">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection