<!-- resources/views/components/sidebar.blade.php -->
<div class="col-span-2 p-5 left_panel min-h-screen">

    <div class="sidebar">
        <div class="flex items-center justify-between mb-4">
            <h1 class="sidebar-header"> ADMIN DASHBOARD </h1>

            <!-- Burger Menu Icon -->
            <button id="burger-menu" class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <div id="sidebar-links" class="hidden lg:block">
            <div class=" sidebar_links mb-6">
                <a href="{{ route('admin.home') }}" class="block text-xl 
                    {{ request()->routeIs('admin.home', 'admin.orderdetails') ? 'side_links text-black font-bold border-b-2 border-gray-500 pl-4 py-1 active' : 'pl-4 py-1' }}">
                    Orders
                </a>
            </div>

            <div class="mb-6">
                <a href="{{ route('admin.view feedback.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.view feedback.index') ? 'side_links text-black font-bold border-b-2 border-gray-500 pl-4 py-1 active' : 'pl-4 py-1' }}">
                    Feedback
                </a>
            </div>

            <div class="mb-6">
                <a href="{{ route('admin.featured products.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.featured products.index', 'admin.featured products.create', 'admin.featured products.edit' ) ? 'side_links text-black font-bold border-b-2 border-gray-500 pl-4 py-1 active' : 'pl-4 py-1' }}">
                    Featured
                </a>
            </div>
        </div>

    </div>
</div>

<script>
    // Toggle sidebar visibility on small screens
    document.getElementById('burger-menu').addEventListener('click', function () {
        document.getElementById('sidebar-links').classList.toggle('hidden');
    });
</script>
