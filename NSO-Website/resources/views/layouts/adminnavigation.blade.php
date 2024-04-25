<!-- resources/views/layouts/navigation-sidebar.blade.php -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Original Navbar -->
<div class="navbar">
    <!-- Content of the original navbar -->
    <div class="left-nav">
        <button id="sidebar-toggle" class="text-xl focus:outline-none">
            <i class="fas fa-bars admin_bars"></i>
        </button> 
        
    </div>

    <div class="center-nav">
        <p class="center_font">NOT SO ORDINARY</p>
    </div>

    <div class="right-nav">
        <x-notifications/>
        <div class="dropdown">
        <p class="username">admin</p>

            <i class="pfp-admin fa-solid fa-circle-user"></i>
            <div class="dropdown-content">
                <a href="{{ url('admin/home') }}" >admin dashboard</a>
                <form method="POST" action="{{ route('admin.logout') }}" >
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
</div>

<!-- Page Content -->
<main class="pt-24">
                
    {{ $slot }}
</main> 

<nav x-data="{ open: false }">
    <!-- Sidebar content -->
    <div class="pt-20 fixed left-0 top-0 bottom-0 z-50 bg-black text-white w-64 overflow-y-auto transition-transform duration-300 ease-in-out transform sidebar-closed">
        <div class="flex items-center justify-between px-4 py-4">
            <h1 class="sidebar-header block text-3xl font-bold"> Admin Dashboard </h1>
        </div>

        <div id="sidebar-links">
            <div class="mb-6">
                <a href="{{ route('admin.home') }}" class="block text-xl 
                    {{ request()->routeIs('admin.home', 'admin.orderdetails') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-2' : 'pl-4 py-2' }}">
                    Orders
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.view feedback.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.view feedback.index') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-2' : 'pl-4 py-2' }}">
                    Feedback
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.featured products.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.featured products.index', 'admin.featured products.create', 'admin.featured products.edit' ) ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-2' : 'pl-4 py-2' }}">
                    Featured
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Button for toggling the sidebar -->


<button id="reopen-sidebar" class="text-xl focus:outline-none">
    <i class="fas fa-bars admin_bars "></i>
</button> 

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.querySelector('.fixed');
        const toggleButton = document.getElementById('sidebar-toggle');
        const toggleIcon = document.getElementById('toggle-icon');
        const reopenButton = document.getElementById('reopen-sidebar');

        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-closed');
            if (sidebar.classList.contains('sidebar-closed')) {
                toggleButton.innerHTML = '<i class="fas fa-bars"></i>';
                reopenButton.classList.remove('hidden');
            } else {
                toggleButton.innerHTML = '<i class="fas fa-bars"></i>';
                reopenButton.classList.add('hidden');
            }
        });

        reopenButton.addEventListener('click', function() {
            sidebar.classList.remove('sidebar-closed');
            toggleButton.innerHTML = '<i class="fas fa-bars"></i>';
            reopenButton.classList.add('hidden');
        });
    });
</script>

<style>
    .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #ffffff;
    z-index: 1000; /* Higher z-index value */
}

.fixed {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 900; /* Lower z-index value */
}


    .left-nav {
        display: flex;
        align-items: center;
    }

    .center-nav {
        text-align: center;
    }

    .right-nav {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 20px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    #reopen-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
    }

    .sidebar-closed {
        transform: translateX(-100%);
    }

    .text-xl {
        font-size: 1.25rem;
    }

    
</style>
