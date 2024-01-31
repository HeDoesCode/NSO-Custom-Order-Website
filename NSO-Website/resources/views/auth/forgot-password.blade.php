<x-guest-layout>
    <div class="fp-form">
        <div >
            {{ __('Forgot your password? No problem. Just let us know your username and we will email you a password reset link to your registered email that will allow you to choose a new one.') }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status  :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Username -->
        <div>
        <x-input-label for="username" :value="__('Username')" />
        <x-text-input id="username"  type="text" name="username" :value="old('username')" required autofocus />
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
    
    
            <div>
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-guest-layout>
