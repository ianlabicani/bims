<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900 mb-3">
            Update Password
        </h2>

        <p class="text-sm text-gray-600 mb-4">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mb-5">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">Current
                Password</label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                autocomplete="current-password">
            @if($errors->updatePassword->get('current_password'))
                <div class="text-red-600 text-sm mt-1">
                    @foreach($errors->updatePassword->get('current_password') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">New
                Password</label>
            <input id="update_password_password" name="password" type="password"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                autocomplete="new-password">
            @if($errors->updatePassword->get('password'))
                <div class="text-red-600 text-sm mt-1">
                    @foreach($errors->updatePassword->get('password') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation"
                class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                autocomplete="new-password">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="text-red-600 text-sm mt-1">
                    @foreach($errors->updatePassword->get('password_confirmation') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">Save</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-gray-600 text-sm">Saved.</p>
            @endif
        </div>
    </form>
</section>