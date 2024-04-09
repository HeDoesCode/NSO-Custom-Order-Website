
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<x-guest-layout>
    <body class="BodyLogin animation">
        <div class="login-container">
            <div class="half login-imageHolder"></div>

            <div class="divider "></div>

            <!-- Login Form -->
            <div class="half login-credentialsHolder">
                <a href="{{ url('/') }}" class="back_button animation a1">Go Back</a>
                <form id="form1" class="form1" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-title-bar">
                        <h2 class="nso-header animation a1">NOT SO ORDINARY</h2>
                    </div>
                    <div class="container containerlogin">
                    <div class="login-formHolder">
                        <!-- Username -->

                        @if(session('verified'))
                            <div class="alert alert-success text-green-500" role="alert">
                                Your email has been successfully verified. Please log in to continue.
                            </div>
                        @elseif(session('status'))
                            <div class="alert alert-success text-green-500" role="alert">
                                Your password has been reset.
                            </div>
                        @endif

                        <div class="login-step">
                            <x-input-label for="username" :value="__('Username')" class="animation a2" />

                            <x-text-input id="username" class="block mt-1 w-full animation a2" type="text" name="username"
                                :value="old('username')" required autofocus autocomplete="username"  />

                            <x-input-error :messages="$errors->get('username')" class="mt-2 animation a2" />
                        </div>

                        <!-- Password -->
                        <div class="login-step">
                            <x-input-label for="password" :value="__('Password')" class="animation a3"/>

                            <x-text-input id="password" class="block mt-1 w-full animation a3" type="password" name="password"
                                required autocomplete="current-password" />
                                

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                       
                        <!-- Remember Me -->
                        </div>
                        <div class="row py-5 animation a4">
                           <div class="col-md-6 d-flex justify-content-center">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2">{{ __('Remember me') }}</span>
                                </label>
                               
                                <div class="col py-1">
                                @if (Route::has('password.request'))
                                <a class="underline text-m text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                                </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="buttonHolder animation a5">
                            <button class="btnLogin">
                                {{ __('Log in') }}
                            </button>
                        </div>
                        <div class="buttonHolder animation a6">  
                        Don’t have an account?   
                        <a href="{{ route('register') }}" class="underline text-m text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Sign Up') }}
                            </a>
                            </div>

                    </div>
                </form>
            </div>
        </div>
    </body>
</x-guest-layout> 
