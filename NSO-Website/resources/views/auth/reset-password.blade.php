
<x-guest-layout>
    <body class="BodyRegister animation"> 
    <form method="POST" action="{{ route('password.store') }}" class="register-container">
    @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">    

<!-- Left side image -->
<div class="half register-formHolder justify-content-center ">
    <img src="/images/notso1.png" class="notsoHolder">
    <div class="login-title-bar">
        
        <h2 class="titleFont1">Change Password</h2>
    </div>
    <!-- Step 1: Username, Email, Password -->
    <div class="register-step " id="step1">
            <div class="">
            
                <div class="here">

    <x-input-label for="username" :value="__('Username')" class="labelFontSize"  />
    <x-text-input class="editedInput2 shadow-none py-2" id="username"  type="text" name="username" :value="session('userName')" required autocomplete="username" readonly="readonly"/>
    <hr class="edithr hrSpace">
    <x-input-error :messages="$errors->get('username')" class="mt-2" />
   
            <!-- Email Address (Hidden) -->
            <div class="mt-4" hidden>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="session('userEmail')" required  autocomplete="username" hidden/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



    <x-input-label for="password" :value="__('Enter your new password')" class="labelFontSize " />
    <x-text-input  class="editedInput2 shadow-none py-2" id="password"  type="password" name="password" required autocomplete="new-password" />
    <hr class="edithr hrSpace">
    
    <x-input-error :messages="$errors->get('password')" class="mt-2" />

    <x-input-label for="password_confirmation" :value="__('Confirm new password')" class="labelFontSize"/>
    <x-text-input class="editedInput2 shadow-none py-2" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
    <hr class="edithr hrSpace">
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

    <x-primary-button class="editButton text-align-center">
                {{ __('Reset Password') }}
            </x-primary-button>

    
     
    


               
                
            



            </div>

        </div>

       

    </div>

   

    <!-- Step 2: First Name, Last Name, Contact, Address -->
    <div class="register-step" id="step2" style="display: none;">

    <x-input-label for="username" :value="__('Username')" />
        
        

    </div>
</div>


<!-- Divider between image and form -->
<div class="divider"></div>

<!-- Right side form holder -->
<div class="half register-imageHolder"></div>


    </form>
    </body>

</x-guest-layout>
