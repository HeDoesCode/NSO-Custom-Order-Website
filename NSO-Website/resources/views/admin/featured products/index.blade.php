<x-admin-layout>
    <div class="grid grid-cols-12">

    @include('layouts.sidebar')

        <!-- <div class="col-span-2 p-5 left_panel text-white min-h-screen">
            <div class="mb-8">
                <p class="text-3xl font-bold">Admin Dashboard</p>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.home') }}" class="block text-xl 
                    {{ request()->routeIs('admin.home', 'admin.orderdetails') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-1' : 'pl-4 py-1' }}">
                    Orders
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.view feedback.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.view feedback.index') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-1' : 'pl-4 py-1' }}">
                    Feedback
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.featured products.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.featured products.index', 'admin.featured products.create', 'admin.featured products.edit' ) ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-1' : 'pl-4 py-1' }}">
                    Featured
                </a>
            </div>
        </div> -->

          <div class="col-span-10 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Featured Products Dashboard
                </p>
            </div>
            <a href="{{ route('admin.featured products.create') }}" class="ml-6 text-white bg-gray-500 px-4 py-2 rounded-md mb-4 inline-block">+ Add Featured Product</a>
        @if (session()->has('success'))
            <div class="text-green-500 mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Link</th>
                    <th class="px-4 py-2">Edit</th>
                    <th class="px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($featuredProducts->sortByDesc('created_at') as $product)
                    <tr class="even:bg-gray-100">
                        
                        <td class="px-4 py-5 flex justify-center">
                            <div class="w-40 h-40 flex items-center justify-center">
                                @if ($product->image)
                                    <img src="{{ asset('images/featured products/'.$product->image   ) }}"
                                         class="w-full h-full object-cover object-center"
                                         onclick="zoomImage('{{ asset('images/featured products/'.$product->image) }}', '{{ $product->image }}')"
                                         style="cursor: pointer;">
                                @else
                                    <span class="text-gray-500">Image not available</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-4 py-5">{{ $product->title }}</td>
                        <td class="px-4 py-5">{{ $product->description }}</td>
                        <td class="px-4 py-5"><a href="{{$product->link}}">{{ $product->link }}</a></td>
                        

                        <td class=" px-4 py-5 font-bold underline underline-offset-2">
                            <a href="{{ route('admin.featured products.edit', ['product' => $product]) }}" class="text-blue-500 hover:underline">Edit</a>
                        </td>

                        <td class="px-4 py-5 font-bold underline underline-offset-2 text-red-500">
                            <form action="{{ route('admin.featured products.delete', ['product' => $product]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="block text-red-500 hover:underline focus:outline-none">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</x-admin-layout>