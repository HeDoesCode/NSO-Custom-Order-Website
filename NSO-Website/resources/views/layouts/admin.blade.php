<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin: Not So Ordinary</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZ9SvYD9zCwX5Sz5l9+iEghEYef4x4jBb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-7MTU7eL78BMce+q2QhBXJgvj4YMZVArvm+Uwf9vQ8DQyQVMfaz2qr0pME1PuT0bGE32Fmyts1w9bWGvt8Fj3GQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.adminnavigation')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                
                {{ $slot }}
            </main> 
        </div>

        <!-- Add this at the end of your body section, before the closing </body> tag -->
        <script>
            // JavaScript function to handle image zooming
            function zoomImage(imageSrc, imageAlt) {
                // Create a modal container
                var modal = document.createElement("div");
                modal.classList.add("modal-container");
        
                // Create an image element inside the modal
                var modalImg = document.createElement("img");
                modalImg.src = imageSrc;
                modalImg.alt = imageAlt;
        
                // Append the image to the modal
                modal.appendChild(modalImg);
        
                // Append the modal to the document body
                document.body.appendChild(modal);
        
                // Close the modal when clicked outside the image
                modal.addEventListener("click", function () {
                    modal.remove();
                });
            }
        </script>
    </body>
</html>
