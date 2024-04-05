<?php
    $customer = $user[0];
?>
<x-admin-layout>
  <div class="grid grid-cols-12">

          <div class="col-span-12 p-5 ">
              <div class="max-w-3xl mx-auto bg-white shadow-md p-6 rounded-md mb-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">Order Details</h2>
                    
                    <a href="#" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800" onclick="toggleEditForms()">Edit</a>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Customer Name:</p>
                        <p class="font-bold">{{ $customer->lastName.", ".$customer->firstName }}</p>
                    </div>
                    

                    <div>
                        <p class="text-gray-600">Customer Contact:</p>
                        <p class="font-bold">{{ $customer->contact }}</p>
                    </div>

                    <div class="col-span-2">
                      <p class="text-gray-600">Design Image:</p>
                      <div class="flex justify-center">
                        

                        <div class="w-60 h-60 flex items-center justify-center border border-gray-300 rounded-md">
                          @if ($order->design_img)
                              <img src="{{ asset('images/order design images/'.$order->design_img) }}"
                                   class="w-full h-full object-cover object-center"
                                   onclick="zoomImage('{{ asset('images/order design images/'.$order->design_img) }}', '{{ $order->design_text }}')"
                                   style="cursor: pointer;">
                          @else
                              <span class="text-gray-500">Image not available</span>
                          @endif
                      </div>

                      </div>
                      
                      
                  </div>

                    <div class="col-span-2">
                      <p class="text-gray-600">Design Text:</p>
                      <p class="font-bold">{{ $order->design_text }}</p>
                  </div>
                    <div>
                        <p class="text-gray-600">T-shirt Type:</p>
                        <p class="font-bold">{{ $order->type }}</p>
                    </div>
                    
            
                    <div >
                        <p class="text-gray-600">Size:</p>
                        <p class="font-bold">{{ $order->size }}</p>
                    </div>
                    <div>
                      <p class="text-gray-600">Quantity:</p>
                      <p class="font-bold">{{ $order->quantity }}</p>
                  </div>
                    <div>
                        <p class="text-gray-600">Mode of Payment:</p>
                        <p class="font-bold">{{ $order->mode_of_payment }}</p>
                    </div>

                    <!-- Price Display -->
                    <div id="priceDisplay">
                        <p class="text-gray-600">Price:</p>
                        <p class="font-bold">{{ $order->price ? $order->price : "Not Yet Set" }}</p>
                    </div>

                    <!-- Status Display -->
                    <div id="statusDisplay">
                        <p class="text-gray-600">Status:</p>
                        <p class="font-bold">{{ $order->status }}</p>
                    </div>

                    @if(session('order_updated'))
    <div class="col-span-2 bg-green-200 text-green-800 p-4 rounded-md mb-4">
        {{ session('order_updated') }}
    </div>
@endif

                 <!-- Combined Editing Form -->
    <div id="editForm" class="col-span-2" style="display: none;">
        <form action="{{ route('admin.updateOrder', ['id' => $order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="flex items-center justify-between">
                <!-- Price Editing Input -->
                <div class="flex-1">
                    <p class="text-gray-600">Price:</p>
                    <input type="text" name="price" value="{{ $order->price }}" class="font-bold">
                </div>

                <!-- Status Editing Input -->
                <div class="flex-1">
                    <p class="text-gray-600">Status:</p>
                    <select name="status" class="font-bold">
                        <option value="Order Placed" {{ $order->status == 'Order Placed' ? 'selected' : '' }}>Order Placed</option>
                        <option value="Processing Order" {{ $order->status == 'Processing Order' ? 'selected' : '' }}>Processing Order</option>
                        <option value="To Ship" {{ $order->status == 'To Ship' ? 'selected' : '' }}>To Ship</option>
                        <option value="Order Completed" {{ $order->status == 'Order Completed' ? 'selected' : '' }}>Order Completed</option>
                        <option value="Order Cancelled" {{ $order->status == 'Order Cancelled' ? 'selected' : '' }}>Order Cancelled</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-gray-700 text-white font-bold mt-5 py-2 px-4 rounded hover:bg-gray-900">Update</button>
        </form>
    </div>
                </div>

                
                </div>
                <div class="flex justify-end">
                  <a href="{{ route('admin.home') }}" class=" mr-5 bg-gray-700 text-white font-bold py-2 px-4 rounded hover:bg-gray-900">Return to Orders</a>
                </div>
                
                
            </div>
            <script>
                function toggleEditForms() {
                    const priceDisplay = document.getElementById('priceDisplay');
                    const statusDisplay = document.getElementById('statusDisplay');
                    const editForm = document.getElementById('editForm');

                    // Toggle visibility
                    priceDisplay.style.display = priceDisplay.style.display === 'none' ? 'block' : 'none';
                    statusDisplay.style.display = statusDisplay.style.display === 'none' ? 'block' : 'none';
                    editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
                }
            </script>
            
          </div>
    </div>

</x-admin-layout>