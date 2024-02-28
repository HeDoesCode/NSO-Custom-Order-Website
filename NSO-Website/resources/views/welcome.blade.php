<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <head>
        <meta charset="utf-8">
        <title>Not So Ordinary</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/stylewise.css">
        
        
        <style>
            body{
                overflow:hidden
            }
        </style>

    </head>
    <body class="antialiased">
        <div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> 
                </div>
            @endif

            <nav class="navbar">
                    <div class="left-nav">
                        <a href="{{ url('/') }}" class="nav_links">HOME</a>
                        <a href="{{ url('/dashboard') }}" class="nav_links">DASHBOARD</a>
                    </div>
                    <div class="center-nav">
                        <a href="{{ url('/') }}" class="center_font">NOT SO ORDINARY</a>
                    </div>
                    <div class="right-nav">
                            <div class="dropdown">
                                <i class="fa-solid fa-circle-user" style="font-size: 2.5vw;"></i>
                                <div class="dropdown-content">
                                    @auth
                                    <a href="{{ route('profile.edit') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 ">Profile</a>
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



    <div class="scroll-container">


        <!-- <section class="home-welcome">
            <div class="overlay">
                <h1>YEAR II COLLECTION</h1>
            </div> 
        </section> -->



     
            <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active " style="background-image: url('{{ asset('images/NSO.png') }}')"> 
                <div class="overlay">
                    <h1>YEAR II COLLECTION</h1>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/YEAR1.jpg') }}')">
        </div>
            <div class="carousel-item" style="background-image: url('https://i.imgur.com/cpIrOo1.jpg')"></div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




        <section class="featured-products col">
            <h2 class="featured-products-title">featured products </h2>
            <div class="card-container wrap">
                @foreach($featuredProducts as $product)
                    <div class="card col">
                        <img src="{{ asset('images/featured products/'.$product->image) }}" alt="{{ $product->title }}">
                        <div class="card-content">
                            <h2 class="card-title">{{ $product->title }}</h2>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
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

                    <!-- <ul class="footer__nav">
        <div class="contacts">
            <li class="nav__item">
            <h2 class="nav__title">Get Notified On</h2>
            
                <ul class="nav__ul">
                    <li>
                        <a href="#">facebook.com/notso.ordinaryyy</a>
                    </li>
                    
                    <li>
                        <a href="#">instagram.com/notso.ordinaryyy</a>
                    </li>
                    
                    <li>
                        <a href="#">shopee.ph/notso.ordinaryyy</a>
                    </li>
                    <li>
                        <a href="#">notso.ordinaryyy@gmail.com</a>
                    </li>

                </ul>
                
            </li>
        </div>
    </ul> -->




                </div>
                
                <hr>
                <div class="welcome-copyright"> 
                    <p class="footer-p">&#169;Copyright 2023 Not So Ordinary. All rights reserved. <a href="">Terms And Condition</a></p>
                </div>
            </footer>

        </div>
    </body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
