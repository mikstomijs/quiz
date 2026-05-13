<x-app-layout>
    <x-slot name="header">
        <h1 class="neon-heading">{{ __('Profile') }}</h1>
        <p class="body-copy">{{ __('Update your account details, password, or delete your account.') }}</p>
    </x-slot>

    <div class="profile-stack">
        <div class="card-panel">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card-panel">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card-panel">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
