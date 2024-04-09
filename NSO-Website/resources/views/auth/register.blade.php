<x-guest-layout>
    <body class="BodyRegister animation">
        <form method="POST" action="{{ route('register') }}" id="registerForm" class="register-container">
            @csrf

            <!-- Left side image -->
            <div class="half register-imageHolder animation a1"></div>

        <!-- Divider between image and form -->
        <div class="divider animation a1"></div>

        <!-- Right side form holder -->
        <div class="register-formHolder">

            

            <!-- Step 1: Username, Email, Password -->
            <div class="register-step" id="step1" class="animation a1">
            <div class="login-title-bar animation a1">
                <h2>Sign Up!</h2>
            </div>
                <x-input-label for="username" :value="__('Username')" class="animation a2"/>
                <x-text-input id="username"  type="text" name="username" :value="old('username')" required autofocus autocomplete="name" class="animation a2"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2 animation a2" />

                <x-input-label for="email" :value="__('Email')" class="animation a3"/>
                <x-text-input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username" class="animation a3"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2 animation a3" />

                <x-input-label for="password" :value="__('Password')" class="animation a4"/>
                <x-text-input id="password"  type="password" name="password" required autocomplete="new-password" class="animation a4"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2 animation a4" />

                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="animation a5"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" class="animation a5" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 animation a5" />

                <button type="button" onclick="nextStep(1)" class="animation a6">Next</button>
                <div class="text-right mt-3 back_reg animation a6">                    
                        I already have an account.   <ins><a href="{{ url('/login') }}" class="animation a6">Login in here!</a></ins>
                    </div>
            </div>

            <!-- Step 2: First Name, Last Name, Contact, Address -->
            <div class="register-step" id="step2" style="display: none;">
            <div class="login-title-bar animation a1">
                <h2>Sign Up!</h2>
            </div>
                <x-input-label for="firstName" :value="__('First Name')" class="animation a2" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="name" class="animation a2"/>
                <x-input-error :messages="$errors->get('firstName')" class="mt-2 animation a2" />

                <x-input-label for="lastName" :value="__('Last Name')" class="animation a3"/>
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="name" class="animation a3" />
                <x-input-error :messages="$errors->get('lastName')" class="mt-2 animation a3" />

                <x-input-label for="contact" :value="__('Contact Number')" class="animation a4" />
                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="name" class="animation a4"/>
                <x-input-error :messages="$errors->get('contact')" class="mt-2 animation a4" />

                <button type="button" onclick="prevStep(2)" class="animation a5">Back</button>
                <button type="button" onclick="nextStep(2)" class="animation a5">Next</button>
            </div>

            <!-- Step 3: Address -->
            <div class="register-step" id="step3" style="display: none">

            <div class="login-title-bar animation a1">
                <h2>Sign Up!</h2>
            </div>
                <x-text-input id="deliveryAddress" class="block mt-1 w-full" type="hidden" name="deliveryAddress" :value="old('deliveryAddress')" required autofocus autocomplete="name" class="animation a2"/>
                <label for="addressLine1" class="animation a2">Building/House No., Street Name, Subd.</label>
                <input type="text" class="block mt-1 w-full animation a2" name="addressLine1" id="addressLine1" value="{{old('addressLine1')}}" required>
                <x-input-error :messages="$errors->get('addressLine1')" class="mt-2 animation a2" />
                <ul>
                <div class="animation a3">
                    <x-address-selector id="region" />
                </div>
                <div class="animation a4">
                    <x-address-selector id="province" />
                </div>
                <div class="animation a5">
                    <x-address-selector id="cityMun" />
                </div>
                <div class="animation a6">
                    <x-address-selector id="brgy" />
                </div>
                </ul>

                <label for="postalCode" class="animation a7">Postal Code</label>
                <input type="text" class="block mt-1 w-full animation a7" name="postalCode" id="postalCode" value="{{old('postalCode')}}" required>
                <x-input-error :messages="$errors->get('postalCode')" class="mt-2 animation a7" />

                <button type="button" onclick="prevStep(3)" class="animation a7">Back</button>
                <button type="button" onclick="nextStep(3)" class="animation a7">Next</button>
            </div>

            <!-- Step 4: Review and Terms and conditions -->
            <div class="register-step" id="step4" style="display: none">
            <div class="login-title-bar animation a1">
                <h2>Sign Up!</h2>
            </div>
                <h1 class="text-3xl font-black animation a1">Review</h1>
                <!-- Review Inputs -->
                    <ul>
                        <li class="mt-2 animation a2">
                            <label>Username:</label>
                            <span id="review-username"></span>
                        </li>
                        <li class="mt-2 animation a2">
                            <label>Email:</label>
                            <span id="review-email"></span>
                        </li>
                        <li class="mt-2 animation a3">
                            <label>First Name:</label>
                            <span id="review-fname"></span>
                        </li>
                        <li class="mt-2 animation a3">
                            <label>Last Name:</label>
                            <span id="review-lname"></span>
                        </li>
                        <li class="mt-2 animation a4">
                            <label>Contact No.:</label>
                            <span id="review-contact"></span>
                        </li>
                        <li class="mt-2 animation a4">
                            <label>Delivery Address:</label>
                            <span id="review-address"></span>
                        </li>
                    </ul>

                {{-- terms and condition --}}
                <div class="terms animation a5"> 
                        <div class="clickbox">
                            <div class="clickbox-gr">
                                <input type="checkbox" id="terms_service" onclick="checkTermsService()" >
                            </div>
                            <label for="terms_service" class="checkbox-label">
                                By ticking this, you agree to our 
                                <a id="terms_condition" href="#" class="terms_cond">Terms and Conditions and Data Privacy</a>.
                            </label>
                        </div>
                    </div>  

                    <br>
 
                    <button type="button" onclick="prevStep(4)"class="animation a6">Back</button>
                    <button type="submit" id="btn-register" class="btnReg animation a6" disabled>Register</button>

                </div>
            </form>

            @include('layouts.terms')
    </form>
    <script src="{{asset('js/register.js')}}"></script>
    


</x-guest-layout>
