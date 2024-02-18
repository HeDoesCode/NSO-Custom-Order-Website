<!-- <link rel="stylesheet" href="css/admin.css">     -->
<!-- 
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-link">ANNIVERSARY</a>
                <a class="nav-link">ESSENTIALS</a>
                <a class="nav-link">CUSTOMS</a>
            </div>

            <div class="d-flex justify-content-center align-items-center mx-auto">
                <span class="navbar-brand mb-0 h1">NOT SO ORDINARY</span>
            </div>

            <div class="navbar-nav ms-auto">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>
    </div>
</nav>

Include Bootstrap JS and Popper.js for dropdowns 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8Y+JlU7LdSNZO9R5PDQ2ROy4g1Nss2HaMlFqNbxMSF3nqE2bWaaBxS/Rn5PT" crossorigin="anonymous"></script>


    Responsive Navigation Menu 
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

         Responsive Settings Options 
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">

               Authentication 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> -->



<nav x-data="{ open: false }" >
    <nav class="shadow-md">
        <div class="navbar ">
            <div class="left-nav">
                <a >ANNIVERSARY</a>
                <a >ESSENTIALS</a>
                <a >CUSTOMS</a>
            </div>
    
            <div class="center-nav">
                <a>NOT SO ORDINARY</a>
            </div>
    
            <div class="right-nav">
                
            <div >

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <div class="pe-auto cursor-pointer" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </div>
            </form>


            </div>
        </div>
    </nav>
</nav> 
