<?php
    $user = auth()->user();
?>

<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                My Custom Orders
            </p>
        </div>

        <div class="max-w-5xl mx-auto bg-white shadow-md p-6 rounded-md mb-4">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Create Order</h2>
                
                <a href="{{ route('dashboard') }}" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800" >Cancel</a>
            </div>
    
            <ul class="text-red-500">
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
    
            <form action="{{ route('order.place') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('post')
                <input type="hidden" name="username" value="{{ $user->username }}">
                <input type="hidden" name="deliveryAddress" value="{{ $user->deliveryAddress }}">
    
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-600">Shirt Type:</label>
                    <select name="type" id="type" onchange="populateSize()" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        <option value=""></option>
                        <option value="Regular">REGULAR</option>
                        <option value="Premium">PREMIUM</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="desc" class="block text-sm font-medium text-gray-600">Design Description:</label>
                    <textarea name="design_text" id="desc" cols="30" rows="10" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="img" class="block text-sm font-medium text-gray-600">{{ __('Design (if applicable):') }}</label>
                    <input type="file" name="design_img" id="img" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('design_img') is-invalid @enderror">
    
                    @error('design_img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="size" class="block text-sm font-medium text-gray-600">Shirt Size:</label>
                    <select name="size" id="size" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></select>
                </div>
    
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-600">Quantity:</label>
                    <input type="number" name="quantity" id="qty" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
    
                <div class="mb-4">
                    <label for="MOD" class="block text-sm font-medium text-gray-600">Mode of Payment:</label>
                    <select name="mode_of_payment" id="MOD" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        <option value=""></option>
                        <option value="Gcash">{{ __('Gcash') }}</option>
                    </select>
                </div>
    
                <div>
                    <input type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800" value="+ Add Product">
                </div>
            </form>
        </div>
    
        <script>
            const regularSizes = ['Small', 'Medium', 'Large', 'XLarge', 'XXLarge'];        
            const premiumSizes = ['Small', 'Medium', 'Large', 'XLarge'];
    
            const typeSelect = document.getElementById('type');
            const sizeSelect = document.getElementById('size');
    
            function populateSize() {
                sizeSelect.innerHTML = "";
    
                if (typeSelect.value === 'Regular') {
                    regularSizes.forEach(size => appendOption(size));
                } else if (typeSelect.value === 'Premium') {
                    premiumSizes.forEach(size => appendOption(size));
                } else {
                    appendOption("Select a shirt type first");
                }
            }
    
            function appendOption(value) {
                const option = document.createElement("option");
                option.textContent = value;
                option.value = value;
                sizeSelect.appendChild(option);
            }
        </script>




    @if (session()->has('success')) 
        <span>{{ session('success') }}</span>
    @endif
    
</x-app-layout>
