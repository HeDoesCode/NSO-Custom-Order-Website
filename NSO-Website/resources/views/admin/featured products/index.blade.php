<x-admin-layout>
    <div class="grid grid-cols-12">
        <div class="col-span-12 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Featured Products Dashboard
                </p>
            </div>
            <a href="{{ route('admin.featured products.create') }}" class="ml-6 text-white bg-gray-500 px-4 py-2 rounded-md mb-4 inline-block">+ Add Featured Product</a>
            @if (session()->has('success'))
                <div class="text-green-500 mb-4">{{ session('success') }}</div>
            @endif
    
            <div class="hidden lg:block">
                <!-- Display as a table on larger screens -->
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
                                            <img src="{{ asset('images/featured products/'.$product->image) }}"
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
                                <td class="px-4 py-5 font-bold underline underline-offset-2">
                                    <a href="{{ route('admin.featured products.edit', ['product' => $product]) }}" class="text-blue-500 hover:underline">Edit</a>
                                </td>
                                <td class="px-4 py-5 font-bold underline underline-offset-2 text-red-500">
                                    <form action="{{ route('admin.featured products.delete', ['product' => $product]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="block text-red-500 hover:underline focus:outline-none" onclick='return confirm("Are you sure you are deleting this featured product?")'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="lg:hidden">
                <!-- Display as cards on smaller screens -->
                @foreach ($featuredProducts->sortByDesc('created_at') as $product)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden text-left mb-4">
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Image:</div>
                                <div class="flex-1 text-right">
                                    @if ($product->image)
                                        <img src="{{ asset('images/featured products/'.$product->image) }}"
                                             class="w-full h-auto object-cover object-center"
                                             onclick="zoomImage('{{ asset('images/featured products/'.$product->image) }}', '{{ $product->image }}')"
                                             style="cursor: pointer;">
                                    @else
                                        <span class="text-gray-500">Image not available</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Title:</div>
                                <div class="flex-1 text-right">{{ $product->title }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Description:</div>
                                <div class="flex-1 text-right">{{ $product->description }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Link:</div>
                                <div class="flex-1 text-right"><a href="{{$product->link}}">{{ $product->link }}</a></div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                
                                <div class="flex-1 ">
                                    <a href="{{ route('admin.featured products.edit', ['product' => $product]) }}" class="text-blue-500 hover:underline">Edit</a>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                
                                <div class="flex-1">
                                    <form action="{{ route('admin.featured products.delete', ['product' => $product]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="block text-red-500 hover:underline focus:outline-none" onclick='return confirm("Are you sure you are deleting this featured product?")'>Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add this section after displaying the products -->
<!-- Pagination Links -->
@if ($featuredProducts && $featuredProducts->lastPage() > 1)
    <div class="mt-8 flex justify-center">
        <ul class="flex">
            <li class="mr-3">
                <a href="{{ $featuredProducts->previousPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Previous</a>
            </li>
            @foreach ($featuredProducts->getUrlRange(1, $featuredProducts->lastPage()) as $page => $url)
                <li class="{{ $featuredProducts->currentPage() == $page ? 'text-bold' : '' }}">
                    <a href="{{ $url }}" class="{{ $featuredProducts->currentPage() == $page ? 'px-3 py-2 bg-gray-500 text-white rounded-md' : 'px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300' }}">{{ $page }}</a>
                </li>
            @endforeach
            <li class="ml-3">
                <a href="{{ $featuredProducts->nextPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Next</a>
            </li>
        </ul>
    </div>
@endif


        </div>
    </div>
    
</x-admin-layout>