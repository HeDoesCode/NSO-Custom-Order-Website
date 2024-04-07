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
    
            
    
            <form action="{{ route('order.place') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('post')
                <input type="hidden" name="username" value="{{ $user->username }}">
                <input type="hidden" name="deliveryAddress" value="{{ $user->deliveryAddress }}">
    
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-600">Shirt Type:</label>
                    <select name="type" id="type" onchange="populateSize()" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        @forEach (array("REGULAR", "PREMIUM") as $type) 
                            <option value="{{ $type }}" @selected(old('type') == $type)>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
                </div>
    
                <div class="mb-4">
                    <label for="desc" class="block text-sm font-medium text-gray-600">Design Description:</label>
                    <textarea name="design_text" id="desc" cols="30" rows="10" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
                    @error('design_text')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
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
                    @error('size')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="desc" class="block text-sm font-medium text-gray-600">Design Description:</label>
                    <textarea name="design_text" id="desc" cols="30" rows="10" class="mt-1 p-2 w-full border border-gray-300 rounded-md">{{ old('design_text') }}</textarea>
                    @error('design_text')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="img" class="block text-sm font-medium text-gray-600">{{ __('Design (if applicable):') }}</label>
                    <input type="file" name="design_img" id="img" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('design_img') is-invalid @enderror">
                    @error('design_img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-600">Quantity: (Maximum of 30 orders only)</label>
                    <select name="quantity" id="qty" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        @for ($i = 1; $i <= 30; $i++) 
                            <option value="{{ $i }}" @selected(old('quantity') == $i)>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    @error('quantity')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="MOD" class="block text-sm font-medium text-gray-600">Mode of Payment:</label>
                    <select name="mode_of_payment" id="MOD" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        @forEach (array("Gcash") as $MOD)
                            <option value="{{ $MOD }}" @selected(old('mode_of_payment') == $MOD)>
                                {{ $MOD }}
                            </option>
                        @endforeach
                    </select>
                    @error('mode_of_payment')
    <span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
                </div>
    
                <div>
                    <input type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800" value="Place Order">
                </div>
            </form>

        </div>
    
        <script>
            const regularSizes = ['Select Size', 'Small', 'Medium', 'Large', 'XLarge', 'XXLarge'];
            const premiumSizes = ['Select Size', 'Small', 'Medium', 'Large', 'XLarge'];
        
            const typeSelect = document.getElementById('type');
            const sizeSelect = document.getElementById('size');
        
            function populateSize() {
                sizeSelect.innerHTML = "";

                if (typeSelect.value === 'REGULAR') {
                    regularSizes.forEach(size => appendOption(size));
                } else if (typeSelect.value === 'PREMIUM') {
                    premiumSizes.forEach(size => appendOption(size));
                }
        
                // Disable the "Select size" option if a type is selected
                if (typeSelect.value !== '') {
                    sizeSelect.removeAttribute('disabled');
                } else {
                    appendOption("Select a shirt type first", true); // Pass true to disable the option
                    sizeSelect.setAttribute('disabled', 'disabled');
                }
            }
        
            function appendOption(value, disabled = false) {
                const option = document.createElement("option");
                option.textContent = value;
                option.value = value;
        
                // Set the disabled attribute if specified
                if (disabled) {
                    option.setAttribute('disabled', 'disabled');
                }
        
                sizeSelect.appendChild(option);
            }
        </script>
        
        




    @if (session()->has('success')) 
        <span>{{ session('success') }}</span>
    @endif
    
</x-app-layout>
