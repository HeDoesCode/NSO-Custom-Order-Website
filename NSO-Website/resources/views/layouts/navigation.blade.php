<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar">
    <div class="left-nav">
        @auth
            <a href="{{ url('/') }}" class="nav_links" id="linkanimation2">HOME</a>
            <a href="{{ url('/dashboard') }}" class="nav_links" id="linkanimation2">ORDER DASHBOARD</a>
        @endauth
    </div>

    <div class="center-nav">
        <a href="{{ url('/') }}" class="center_font">NOT SO ORDINARY</a>
    </div>

    <div class="right-nav">
        @auth
            <div class="dropdown">

                <span class="username">{{ Auth::user()->username }}</span>

                <i class="pfp fa-solid fa-circle-user" style="font-size: 2.5vw;"></i>
                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 ">Profile</a>
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
        @endauth
        @guest
            <div>
                <a href="{{ route('login') }}" class="nav_links font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" id="linkanimation">Log in</a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav_links ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" id="linkanimation">Register</a>
                @endif
                
            </div>
        @endguest
    </div>
</nav>