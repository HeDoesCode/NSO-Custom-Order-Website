<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <h1>Welcome, <strong>{{ $user->firstName }} {{ $user->lastName }}!</strong></h1>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        

        <div>
            <x-input-label for="firstName" :value="__('Delivery Address')" />
            <x-text-input id="deliveryAddress" name="deliveryAddress" type="text" class="mt-1 block w-full" :value="old('deliveryAddress', $user->deliveryAddress)" required autofocus autocomplete="deliveryAddress" />
            <x-input-error class="mt-2" :messages="$errors->get('deliveryAddress')" />
        </div>

        <div>
            <x-input-label for="contact" :value="__('Contact Number')" />
            <x-text-input id="contact" name="contact" type="number" class="mt-1 block w-full" :value="old('contact', $user->contact)" required autofocus autocomplete="contact" />
            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
