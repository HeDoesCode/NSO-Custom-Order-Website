<x-guest-layout>
    <body class="BodyRegister">
        <form method="POST" action="{{ route('register') }}" id="registerForm" class="register-container">
            @csrf

            <!-- Left side image -->
            <div class="register-imageHolder"></div>

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
                    <x-text-input id="username"  type="text" name="username" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />

                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <button type="button" onclick="nextStep()">Next</button>
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

                    <x-input-label for="deliveryAddress" :value="__('Delivery Address')" />
                    <x-text-input id="deliveryAddress" class="block mt-1 w-full" type="text" name="deliveryAddress" :value="old('deliveryAddress')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('deliveryAddress')" class="mt-2" />

                    <button type="button" onclick="prevStep()">Previous</button>
                    <button type="submit">Register</button>
                </div>
            </div>
        </form>

        <script>
            function nextStep() {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            }

            function prevStep() {
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step1').style.display = 'block';
            }
        </script>
    </body>
</x-guest-layout>
