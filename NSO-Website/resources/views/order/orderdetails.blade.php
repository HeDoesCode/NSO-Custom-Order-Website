<x-app-layout>
    <div class="grid grid-cols-12">

  
            <div class="col-span-12 p-5 ">
              <div class="ml-6">
                  <p class="text-3xl font-bold mb-7">
                      Order Details
                  </p>
              </div>
  
  
                <div class="max-w-3xl mx-auto bg-white shadow-md p-6 rounded-md mb-4">
                  <div class="flex items-center justify-between mb-4">
                      <h2 class="text-2xl font-bold">Product Details</h2>
                      
                    
                  </div>
                  
                  <div class="grid grid-cols-2 gap-4">
                      
  
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
  
  
       
                  </div>
  
                  
                  </div>
                  <div class="flex justify-end">
                    <a href="{{ route('dashboard') }}" class=" mr-5 bg-gray-700 text-white font-bold py-2 px-4 rounded hover:bg-gray-900">Return to Orders</a>
                  </div>
                  
                  
              </div>
              
            </div>
      </div>
  
  </x-app-layout>