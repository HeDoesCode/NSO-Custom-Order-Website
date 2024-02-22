<x-admin-layout>
    <div class="grid grid-cols-12">
        <div class="col-span-2 p-5 bg-black text-white min-h-screen">
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
        </div>

        <div class="col-span-10 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Edit Featured Products Dashboard
                </p>
            </div>

            
            <div class="container mx-auto p-6">

                <form action="{{ route('admin.featured products.update', ['product' => $product]) }}" method="post"
                    enctype="multipart/form-data" class="max-w-4xl mx-auto bg-white p-8 rounded-md shadow-md">

                    @csrf
                    @method('put')

                    <div class="mb-6">
                        <label for="img" class="block text-sm font-medium text-gray-600">Image:</label>
                        <input type="file" name="image" id="img"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('image') is-invalid @enderror">

                        @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                        <input type="text" name="title" id="title"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('title') is-invalid @enderror"
                            value="{{ $product->title }}">

                        @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="desc" class="block text-sm font-medium text-gray-600">Description:</label>
                        <input type="text" name="description" id="desc"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('description') is-invalid @enderror"
                            value="{{ $product->description }}">

                        @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="link" class="block text-sm font-medium text-gray-600">Link:</label>
                        <input type="text" name="link" id="link"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('link') is-invalid @enderror"
                            value="{{ $product->link }}">

                        @error('link')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="submit"
                            class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800"
                            value="Edit Product">
                    </div>
                </form>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.featured products.index') }}" class=" mr-5 bg-gray-700 text-white font-bold py-2 px-4 rounded hover:bg-gray-900">Return to Orders</a>
              </div>
        </div>
    </div>
</x-admin-layout>
