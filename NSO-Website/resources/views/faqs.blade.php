<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>Not So Ordinary</title>

        <!-- Bootstrap CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <!-- jQuery -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <!-- Bootstrap Touch Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touch-carousel/1.2.9/bootstrap-touch-carousel.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/stylewise.css">

        <style>
            body{
                overflow:hidden
            }
        </style>
    
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> 
                </div>
            @endif

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
                <!-- <li class="nav_username"><i class="pfp fa-solid fa-circle-user" ></i>{{ Auth::user()->username }}</li> -->
                <li><a href="{{ url('/') }}" class="nav_links">HOME</a></li>
                <li><a href="{{ url('/dashboard') }}" class="nav_links">DASHBOARD</a></li>
                <li><a href="{{ url('/faqs') }}" class="nav_links">FAQS</a></li>
                <li><a href="{{ route('profile.edit') }}" class="nav_links">Profile</a>
                <li><form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }} 
                        </x-responsive-nav-link>
                     </form></a>
                </li>

            @endauth 

                <li>@guest
                        <a href="{{ route('login') }}" class=" font-semibold">Log in </a>  / 
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register_btn" >Register</a>
                        @endif
                        
                @endguest</li>
            </ul>
        </div>
    </div>

        <div class="center-nav">
            <a href="{{ url('/') }}" class="center_font">NOT SO ORDINARY</a>
        </div>

        <div class="right-nav">
            @auth
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

                <div class="log_reg">
                    @guest
                        <a href="{{ route('login') }}" class="nav_links font-semibold">Log in </a>  / 
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register_btn nav_links" >Register</a>
                        @endif
                        
                    @endguest
                </div>
            </div>
        </div>    
    </nav>


    <div class="scroll-container">

   

    <h1 class="faq_title m-5 ">FAQs</h1>

    <div class="card_faq_sec p-5 m-5 flex ">

<div class="faq2_title m-5 flex"> What's the difference between <span class="faq2_span">regular tee</span> and <span class="faq2_span">premium tee?</span>
    </div>
  <table class="faq_table ">
    <thead>
      <tr>
        <th class="table_border_bottom faq_th"> </th>
        <th class="table_border table_border_bottom faq_th">Regular Tee</th>
        <th class="table_border table_border_bottom faq_th">Premium Tee</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="faq2_span faq_td">Sizing</td>
        <td class="table_border faq_td">Regular Fit</td>
        <td class="table_border faq_td">Oversized Box Fit</td>
      </tr>
      <tr>
        <td class="faq2_span faq_td">Fabric</td>
        <td class="table_border faq_td">Regular Cotton</td>
        <td class="table_border faq_td">100% High-Grade Combed and Ring-Spun Cotton</td>
      </tr>
      <tr>
        <td class="faq2_span faq_td">Print</td>
        <td class="table_border faq_td">Direct-to-Film</td>
        <td class="table_border faq_td">Direct-to-Garment</td>
      </tr>
      <tr>
        <td class="faq2_span faq_td">Sticker</td>
        <td class="table_border faq_td">Matte-Finished Sticker</td>
        <td class="table_border faq_td">Matte-Finished Sticker</td>
      </tr>
    </tbody>
  </table>
</div>






<div class="faq_container flex justify-center uppercase">
    <div class="card_faq p-5 m-5 flex">
        <img class="faq_img" src="/images/faq1.png" alt="">
        <div class="faq_content_container flex flex-column justify-between p-5">
            <div class="faq_card_title">SHIRT'S QUALITY & SIZING:</div>
            <div class="faq_content">We now offer 215 GSM, 100% High-grade combed and ring-spun cotton shirt with the following features:<br>- Boxy fit<br>- Mock crew neck<br>- Side-seamed<br>- 1.2" RIB collar</div>
        </div>
    </div>
    <div class="card_faq p-5 m-5 flex">
        <img class="faq_img" src="/images/faq2.png" alt="">
        <div class="faq_content_container flex flex-column justify-between p-5">
            <div class="faq_card_title">DIRECT TO garment printing</div>
            <div class="faq_content">Our cloting line opened its production to direct-to-garment printing which gives more luxurious feel to the design, superb quality of print, and premium vibe to the shirt itself.</div>
        </div>
    </div>
    <div class="card_faq p-5 m-5 flex">
        <img class="faq_img" src="/images/faq3.png" alt="">
        <div class="faq_content_container flex flex-column justify-between p-5">
            <div class="faq_card_title">PREMIUM STICKER TAG</div>
            <div class="faq_content">TO better serve you with our best quality service, sticker hangtags will be included in our premium version tees.</div>
        </div>
    </div>
</div>


<div class="card_faq_sec p-5 m-5 flex ">
    <div class=" m-5 flex"> 
        <p class="faq3_content"> <span class="faq2_span">NOTE:</span>
        All designs are made through pre-order and production is done every monday. expect 4-8 days of production time before shipping the items.
        </p>
        <br>
        <br>
        <p class="faq3_content">
        Production of the first batch for the newly released designs may take longer processing period.
        </p>
    </div>
</div>




        
        <footer>
            <div class="footer-nav row">
                <div class="footer-img row">
                    <img class="footer-logo" src="/images/footer-logo.png" alt="">
                </div>
                        
                <div class="footer-links row">
                    <ul>
                        <li><a href="{{ url('https://www.facebook.com/notso.ordinaryyy') }}" class="footer_links"><i class="fa-brands fa-facebook fa-lg"></i> Facebook</a></li>
                        <li><a href="{{ url('https://www.instagram.com/notso.ordinaryyy/') }}" class="footer_links"><i class="fa-brands fa-instagram fa-lg "></i> Instagram</a></li>
                        <li><a href="{{ url('https://shopee.ph/notso.ordinaryyy') }}" class="footer_links"><img class="shopee_icon" src="/images/shopee.png" alt=""> Shopee</a></li>
                        <li><a class="footer_links"><i class="fa-regular fa-envelope"></i> notso.ordinaryyy@gmail.com</a></li>

                    </ul>
                </div>
            </div>
            
            <hr>
            <div class="welcome-copyright"> 
                <p class="footer-p">&#169;Copyright 2023 Not So Ordinary. All rights reserved. <a href="" id="terms_condition" class="footer_links"> <u>Terms and Condition and Data Privacy</u>.</a><a href="{{ url('/faqs') }}" class="footer_links"> FAQs</a></p>
            </div>
        </footer>
        @include('layouts.terms')
    
    </div>
    </body>
    <script>
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('show-menu');
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="{{asset('js/terms.js')}}"></script>

</html>
