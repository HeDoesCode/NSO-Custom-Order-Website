<x-guest-layout>
    <section class="verify_email_content">
    <div class="containerforgotpassword titlebar">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>
    </section>
    <section class="verification">
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 col">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
    </section>
    <section class="ve_button_log">
    <div class="mt-4 flex row">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="resend-button col">
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</section>
 
</x-guest-layout>
