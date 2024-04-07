
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-guest-layout>
<body class="BodyRegister animation"> 
<div class="container">
            <div class="row"> 
                <div class="col-sm-12">
                    <div class="center-div3 justify-content-center">
                        <div class="center-div-content">
                            <h1 class="theTitle pb-1">Thanks for signing up!</h1>
                                <div class="theDesc2 text-center mb-4" >
                                    {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </div>

                                                                <section class="verification">
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600 justify-content-center center-text mb-3">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div> 
                                    @endif
                                    </section>
                                    <section class="">
                                    <div class="">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            
                                                <x-primary-button class="editButton">
                                                    {{ __('Resend Verification Email') }}
                                                </x-primary-button>
                                         
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="">
                                            <button type="submit" class="editButton2 border border-secondary border-2">
                                                {{ __('Log Out') }}
                                            </button>
                                            </div>
                                        </form>
                                    </div>
                                </section>


                               


                        </div>
                    </div>
                </div>

            </div>

        </div>
</body>
      
        
        
   
    
   



   
</x-guest-layout>