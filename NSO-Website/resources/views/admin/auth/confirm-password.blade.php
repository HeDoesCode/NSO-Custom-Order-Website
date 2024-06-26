<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        <!-- Left side image -->
        <div class="half register-imageHolder"></div>

        <!-- Divider between image and form -->
        <div class="divider"></div>

        <!-- Right side form holder -->
        <div class="half register-formHolder">

            <div class="login-title-bar">
                
                <h2>NOT SO ORDINARY</h2>
            </div>
            <!-- Step 1: Username, Email, Password -->
            <div class="register-step" id="step1">
            <x-input-label for="firstName" :value="__('First Name')" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />

                <x-input-label for="lastName" :value="__('Last Name')" />
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />

                <x-input-label for="contact" :value="__('Contact Number')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />

                <x-input-label for="deliveryAddress" :value="__('Delivery Address')" />
                <x-text-input id="deliveryAddress" class="block mt-1 w-full" type="text" name="deliveryAddress" :value="old('deliveryAddress')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('deliveryAddress')" class="mt-2" />
            
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

                
                <br>

                <button type="button" onclick="prevStep()">Back</button>
                <button type="submit" id="btn-register" disabled>Register</button>

            </div>

            </div>

        

            <!-- Step 2: First Name, Last Name, Contact, Address -->
            <div class="register-step" id="step2" style="display: none;">

                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username"  type="text" name="username" :value="old('name')" required autofocus autocomplete="name" />
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

                <button type="button" onclick="nextStep()">Next</button>
                <div class="text-right mt-3 back_reg">                    
                I already have an account.   <ins><a href="{{ url('/login') }}" >Login in here!</a></ins>    

               

            </div>
        </div>
    
    </form>
</x-guest-layout>
