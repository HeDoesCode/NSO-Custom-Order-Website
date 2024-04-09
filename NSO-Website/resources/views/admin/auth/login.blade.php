<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Other meta tags and title -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        
<x-guest-layout>
<body class="BodyLogin animation" > 
    
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    <div class="login-container">
        <div class="half login-imageHolder"></div>

        <div class="divider"></div>

        <div class="half login-credentialsHolder">
            <form id="form1" class="form1" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="login-title-bar">
                    <h2 class=nso-header>ADMIN LOGIN PAGE</h2>
                </div>

                <div class="container containerlogin">
                    <div class="login-formHolder">
                    <!-- Username -->
                    <div class="login-step">
                        <x-input-label for="username" :value="__('Admin Username')" />

                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required autofocus autocomplete="username" />

                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="login-step">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                   
                    <!-- Remember Me -->
                    </div>
                    <div class="row py-5"> 
                       <div class="col-md-6 d-flex justify-content-center">
                            <!-- <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ms-2">{{ __('Remember me') }}</span>
                            </label> -->
                           
                            <div class="col py-1">
                          
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('admin.password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                               
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttonHolder">
                        <button class="btnLogin">
                            {{ __('Log in') }}
                        </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</body>
</x-guest-layout>
    </body>
</html>



