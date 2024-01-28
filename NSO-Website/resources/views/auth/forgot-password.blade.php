<x-guest-layout>
    <body class="bodyforgotPassword">
        
    <div class="forgotPassword containerforgotpassword"></div>
    <div class="forgotPassword title-barFP">
    {!! __('<h1>Forgot your password?</h1> No problem. Just let us know your username and we will email you a password reset link to your registered email that will allow you to choose a new one.') !!}
    </div>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class ="form2"action="{{ route('password.email') }}">
        @csrf

        <!-- Username -->
    <div>
    <x-input-label for="username" :value="__('Username')" />
    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
    <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>


        <div class="buttonHolder">
            <x-primary-button class="btnNextFP">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    </body>
</x-guest-layout>
