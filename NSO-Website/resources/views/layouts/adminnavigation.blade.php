<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav x-data="{ open: false }">
    <div class="navbar">
        <div class="left-nav">
            <a >admin</a>
        </div>

        <div class="center-nav">
            <a>NOT SO ORDINARY</a>
        </div>
        <div class="right-nav">
            <div class="dropdown">
                <i class="fa-solid fa-circle-user" style="font-size: 2.5vw;"></i>
                <div class="dropdown-content">
            
                    <a href="{{ url('admin/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 ">admin dashboard</a>
                    <a :href="route('profile.edit')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 ">Profile</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
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
</nav> 
 