<x-guest-layout>
    <body class="BodyRegister animation">
        <form method="POST" action="{{ route('register') }}" id="registerForm" class="register-container">
            @csrf

            <!-- Left side image -->
            <div class="half register-imageHolder"></div>

        <!-- Divider between image and form -->
        <div class="divider"></div>

        <!-- Right side form holder -->
        <div class="register-formHolder">

            <div class="login-title-bar">
                <h2>NOT SO ORDINARY</h2>
            </div>

            <!-- Step 1: Username, Email, Password -->
            <div class="register-step" id="step1">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username"  type="text" name="username" :value="old('username')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />

                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"  type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <button type="button" onclick="nextStep(1)">Next</button>
            </div>

            <!-- Step 2: First Name, Last Name, Contact, Address -->
            <div class="register-step" id="step2" style="display: none;">
                <x-input-label for="firstName" :value="__('First Name')" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />

                <x-input-label for="lastName" :value="__('Last Name')" />
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />

                <x-input-label for="contact" :value="__('Contact Number')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />

                <button type="button" onclick="prevStep(2)">Back</button>
                <button type="button" onclick="nextStep(2)">Next</button>
            </div>

            <!-- Step 3: Address -->
            <div class="register-step" id="step3" style="display: none">
                <x-text-input id="deliveryAddress" class="block mt-1 w-full" type="hidden" name="deliveryAddress" :value="old('deliveryAddress')" required autofocus autocomplete="name" />
                
                <label for="addressLine1">Building/House No., Street Name, Subd.</label>
                <input type="text" class="block mt-1 w-full" name="addressLine1" id="addressLine1" value="{{old('addressLine1')}}" required>
                <x-input-error :messages="$errors->get('addressLine1')" class="mt-2" />

                <div>
                    <ul>
                        <x-address-selector id="region" />
                        <x-address-selector id="province" />
                        <x-address-selector id="cityMun" />
                        <x-address-selector id="brgy" />
                    </ul>
                </div>

                <label for="postalCode">Postal Code</label>
                <input type="text" class="block mt-1 w-full" name="postalCode" id="postalCode" value="{{old('postalCode')}}" required>
                <x-input-error :messages="$errors->get('postalCode')" class="mt-2" />

                <button type="button" onclick="prevStep(3)">Back</button>
                <button type="button" onclick="nextStep(3)">Next</button>
            </div>

            <!-- Step 4: Review and Terms and conditions -->
            <div class="register-step" id="step4" style="display: none">
                <h1 class="text-3xl font-black">Review</h1>
                <!-- Review Inputs -->
                    <ul>
                        <li class="mt-2">
                            <label>Username:</label>
                            <span id="review-username"></span>
                        </li>
                        <li class="mt-2">
                            <label>Email:</label>
                            <span id="review-email"></span>
                        </li>
                        <li class="mt-2">
                            <label>First Name:</label>
                            <span id="review-fname"></span>
                        </li>
                        <li class="mt-2">
                            <label>Last Name:</label>
                            <span id="review-lname"></span>
                        </li>
                        <li class="mt-2">
                            <label>Contact No.:</label>
                            <span id="review-contact"></span>
                        </li>
                        <li class="mt-2">
                            <label>Delivery Address:</label>
                            <span id="review-address"></span>
                        </li>
                    </ul>

                {{-- terms and condition --}}
                <div class="terms"> 
                    <div class="clickbox">
                        <div class="clickbox-gr">
                            <input type="checkbox" id="terms_service" onclick="checkTermsService()">
                        </div>
                        <label for="terms_service" class="checkbox-label">
                            By ticking this box, you agree to our <a href="#"><b><em>Terms and Conditions</em></b></a> and <a href="#"><b><em>Data Privacy</em></b></a>.
                        </label>
                    </div>
                <div>
                    
                <button type="button" onclick="prevStep(4)">Back</button>
                <button type="submit" id="btn-register" disabled>Register</button>
            </div>
        </div>
    </form>
    <script src="{{asset('js/register.js')}}"></script>
</x-guest-layout>
