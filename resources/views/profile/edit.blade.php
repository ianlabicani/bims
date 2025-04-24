<x-app-layout>
    <div class="container py-4">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="h3 fw-semibold">
                    Profile
                </h2>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>