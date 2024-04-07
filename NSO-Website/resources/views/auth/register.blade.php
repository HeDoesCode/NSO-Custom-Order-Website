<x-guest-layout>
    <body class="BodyRegister animation">
        <form method="POST" action="{{ route('register') }}" id="registerForm" class="register-container">
            @csrf

            <!-- Left side image -->
            <div class="half register-imageHolder"></div>

            <!-- Divider between image and form -->
            <div class="divider"></div>

            <!-- Right side form holder -->
            <div class="half register-formHolder">

                <div class="login-title-bar">
                    
                    <h2>Sign Up!</h2>
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

                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <button type="button" onclick="nextStep()">Next</button>
                    <div class="text-right mt-3 back_reg">                    
                        I already have an account.   <ins><a href="{{ url('/login') }}">Login in here!</a></ins>
                    </div>
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
                   
                    <div class="terms"> 
                        <div class="clickbox">
                            <div class="clickbox-gr">
                                <input type="checkbox" id="terms_service" onclick="checkTermsService()" >
                            </div>
                            <label for="terms_service" class="checkbox-label">
                                By ticking this, you agree to our 
                                <a id="terms_condition" href="#">Terms and Conditions and Data Privacy</a>.
                            </label>
                        </div>
                    </div>  

                    <br>
 
                    <button type="button" onclick="prevStep()">Back</button>
                    <button type="submit" id="btn-register" class="btnReg" disabled>Register</button>

                </div>
            </form>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1 class="terms-title">Terms and Conditions</h1>
                    <!-- Add your terms and conditions content here -->
                    <p class="terms-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac placerat vestibulum lectus mauris ultrices eros in cursus turpis. Nullam non nisi est sit. Sapien eget mi proin sed libero enim sed faucibus turpis. Pretium nibh ipsum consequat nisl vel pretium lectus quam id. Mauris pellentesque pulvinar pellentesque habitant morbi. Fringilla est ullamcorper eget nulla facilisi etiam dignissim. Metus aliquam eleifend mi in nulla. Iaculis nunc sed augue lacus viverra. At ultrices mi tempus imperdiet nulla malesuada pellentesque. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Vitae semper quis lectus nulla at volutpat diam. Malesuada pellentesque elit eget gravida cum sociis natoque. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut placerat. Et netus et malesuada fames ac turpis egestas integer eget. Elit ut aliquam purus sit. Habitant morbi tristique senectus et netus. Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut placerat.</p>
                </div>
            </div>

            <script>
                function nextStep() {
                    document.getElementById('step1').style.display = 'none';
                    document.getElementById('step2').style.display = 'block';
                }

                function prevStep() {
                    document.getElementById('step2').style.display = 'none';
                    document.getElementById('step1').style.display = 'block';
                }

                function checkTermsService() {
                    const terms_service = document.getElementById('terms_service');
                    const btn_register = document.getElementById('btn-register');

                    if (terms_service.checked) {
                        btn_register.removeAttribute("disabled");
                    } else {
                        btn_register.setAttribute("disabled", "");
                    }
                }

                var modal = document.getElementById("myModal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on the link, open the modal
                document.getElementById('terms_condition').addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior of anchor tag
                    modal.style.display = "block";
                });

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </body>
    </x-guest-layout>
