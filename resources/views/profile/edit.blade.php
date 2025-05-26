<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Profile</h2>
            <p class="text-gray-600 mt-2">Manage your account settings and preferences.</p>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>