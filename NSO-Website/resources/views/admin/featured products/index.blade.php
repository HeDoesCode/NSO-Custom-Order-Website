<x-app-layout>
    <div  class="grid grid-cols-12 ">
        <div class="col-span-2 p-5 bg-black text-white  min-h-screen">
              <div class="mb-8">
                <p class="text-3xl font-bold">Dashboard</p>
              </div>
              <div class="mb-6">
                <p class="text-xl">
                  <a href="{{ route('admin.home') }}">Orders</a>
                </p>
              </div>
              <div class="mb-6">
                <p class="text-xl">
                  <a href="{{ route('admin.view feedback.index') }}">Feedback</a>
                </p>
              </div>
              <div class="mb-6">
                <p class="text-xl">
                  <a href="{{ route('admin.featured products.index') }}">Featured</a>
                </p>
              </div>
          </div>

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
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Link</th>
                    <th class="px-4 py-2">Edit</th>
                    <th class="px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($featuredProducts as $product)
                    <tr class="even:bg-gray-100">
                        <td class="px-4 py-2 flex justify-center">
                            <div class="w-40 h-40 flex items-center justify-center">
                                <img src="{{ asset('images/featured products/'.$product->image) }}"
                                     class="w-full h-full object-cover object-center">
                            </div>
                        </td>
                        <td class="px-4 py-2">{{ $product->description }}</td>
                        <td class="px-4 py-2"><a href="{{$product->link}}">{{ $product->link }}</a></td>
                        

                        <td class=" px-4 py-2 font-bold underline underline-offset-2">
                            <a href="{{ route('admin.featured products.edit', ['product' => $product]) }}" class="text-blue-500 hover:underline">Edit</a>
                        </td>

                        <td class="px-4 py-2 font-bold underline underline-offset-2 text-red-500">
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
</x-app-layout>