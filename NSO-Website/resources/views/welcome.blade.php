<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Not So Ordinary</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
         
        </style>
    </head>
    <body class="antialiased">
        <div class>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                
                </div>
            @endif




    <nav class="navbar">
            <div class="left-nav">
                <a >ANNIVERSARY</a>
                <a >ESSENTIALS</a>
                <a >CUSTOMS</a>
            </div>
    
            <div class="center-nav">
                <a>NOT SO ORDINARY</a>
            </div>
    
           

            <div class="right-nav">
                    <div class="dropdown">
                        <i class="fa-solid fa-circle-user" style="font-size: 2.5vw;"></i>
                        <div class="dropdown-content">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </nav>





<section class="home-welcome">
    <div class="overlay">
        <h1>YEAR II COLLECTION</h1>
    </div>
</section>

    

<section class="featured-products col">
    <h2 class="featured-products-title">featured products </h2>

    <div class="card-container wrap">
        <div class="card col">
            <img src="images/SampleShirt.png" alt="">
            <div class="card-content">
                <h2 class="card-title">Stylish Shirt 1</h2>
                <p class="card-text" >A comfortable and fashionable shirt for any occasion. Made with high-quality fabric to ensure a perfect fit.</p>
            </div>
        </div>

        <div class="card col">
            <img src="images/SampleShirt.png" alt="">
            <div class="card-content">
                <h2 class="card-title">Stylish Shirt 2</h2>
                <p class="card-text">A comfortable and fashionable shirt for any occasion. Made with high-quality fabric to ensure a perfect fit.</p>

            </div>
        </div>

        <div class="card col">
            <img src="images/SampleShirt2.jpg" alt="">
            <div class="card-content">
                <h2 class="card-title">Stylish Shirt 3</h2>
                <p class="card-text">A comfortable and fashionable shirt for any occasion. Made with high-quality fabric to ensure a perfect fit.</p>
            </div>
        </div>
    </div>


    
</section>


        
        <footer>
            <div class="footer-nav row">
                <div class="footer-img row">
                    <img class="footer-logo" src="/images/footer-logo.png" alt="">
                </div>
                        
                <div class="footer-links row">
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Shopee</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="welcome-copyright"> 
                <p class="footer-p">&#169;Copyright 2023 Not So Ordinary. All rights reserved. <a href="">Terms And Condition</a></p>
            </div>
        </footer>
    </body>
</html>
