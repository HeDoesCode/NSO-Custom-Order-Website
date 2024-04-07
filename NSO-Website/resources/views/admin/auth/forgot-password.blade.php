
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-guest-layout>
<body class="BodyRegister animation"> 
<div class="container">
            <div class="row"> 
                <div class="col-sm-12">
                    <div class="center-div">
                        <div class="center-div-content">
                        <h1 class="theTitle pb-1">Forgot Password?</h1>
                                <div class="theDesc" >
                                    {{ __('Enter the credentials associated with your admin account') }}
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status  :status="session('status')" />

                                <form method="POST" action="{{ route('admin.password.email') }}">
                                    @csrf

                                    <!-- Username -->
                                    <div>
                                        <div class="">
                                            
                                            
                                            <x-text-input id="username" class="editedInput shadow-none py-4" type="text" name="username" :value="old('username')" required placeholder="Enter Admin Credential"/>
                                            <hr class="edithr mb-4">
                                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                            
                                            
                                            
                                        </div>
                                        
                                                <br>
                                                <div class="col d-flex py-3">
                                                    <x-primary-button class="editButton text-align-center">
                                                        {{ __('Next') }}
                                                    </x-primary-button>
                                                </div>
                                                <div class="col d-flex">
                                                <a href="{{ route('admin.login') }}" class="editButton2 border border-secondary border-2">Go Back</a>
                                                </div>
                                            
                                    </div>

                                </form>


                        </div>
                    </div>
                </div>

            </div>

        </div>
</body>
      
        
        
   
    
   



   
</x-guest-layout>