<!-- resources/views/layouts/sidebar.blade.php -->
<div class="fixed left-0 top-0 bottom-0 z-50 bg-white w-64 overflow-y-auto transition-transform duration-300 ease-in-out transform sidebar-closed"> <!-- Add the sidebar-closed class here -->
    <div class="flex items-center justify-between px-4 py-4">
        <h1 class="sidebar-header"> ADMIN DASHBOARD </h1>
    </div>

    <div id="sidebar-links">
        <div class="sidebar_links mb-6">
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

<!-- Button for toggling the sidebar -->
<button id="sidebar-toggle" class="text-xl focus:outline-none ml-4">
    <i class="fas fa-bars"></i>
</button>

<button id="reopen-sidebar" class="text-xl focus:outline-none hidden">
    <span>&lt;</span>
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
                toggleIcon.textContent = '>';
                reopenButton.classList.remove('hidden');
            } else {
                toggleIcon.textContent = '<';
                reopenButton.classList.add('hidden');
            }
        });

        reopenButton.addEventListener('click', function() {
            sidebar.classList.remove('sidebar-closed');
            toggleIcon.textContent = '<';
            reopenButton.classList.add('hidden');
        });
    });
</script>

<style>
    .sidebar-closed {
        transform: translateX(-100%);
    }
</style>
