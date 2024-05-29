<?php
    $user = auth()->user();
?>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar">
<div class="left-nav">
            @auth
            <a href="{{ url('/') }}" class="nav_links">HOME</a>
            <a href="{{ url('/dashboard') }}" class="nav_links">DASHBOARD</a>
            <a href="{{ url('/faqs') }}" class="nav_links">FAQS</a>
            @endauth

            <div class="navbar_menu">
                <input type="checkbox" id="burger-toggle">
                <label for="burger-toggle" class="burger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </label>
                <ul class="menu-items">
                    @auth
                    <li><a href="{{ url('/') }}" class="nav_links">HOME</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="nav_links">DASHBOARD</a></li>
                    <li><a href="{{ url('/faqs') }}" class="nav_links">FAQS</a></li>
                    <li><a href="{{ route('profile.edit') }}" class="nav_links">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li> 
                    @endauth

                    <li>
                        @guest
                        
                        <a href="{{ route('login') }}" class=" font-semibold">Log in </a>  / 
                        
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register_btn" >Register</a>
                        @endif
                        
                        @endguest
                    </li>
                </ul>
            </div>
        </div>

    <div class="center-nav">
        <a href="{{ url('/') }}" class="center_font">NOT SO ORDINARY</a>
    </div>

    <div class="right-nav">
            @auth
            <x-notifications :user="$user"/>
            <div class="dropdown">
                <span class="username">{{ Auth::user()->username }}</span>
                <i class="pfp fa-solid fa-circle-user" ></i>
                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}" class="nav_links">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="nav_links">
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