<x-admin-layout>
  @php
    function getStatusStyle($status) {
        switch ($status) {
            case 'Order Placed':
                return 'bg-green-200 rounded-full px-2 py-1'; 
            case 'Processing Order':
                return 'bg-blue-200 rounded-full px-2 py-1';
            case 'To Ship':
                return 'bg-yellow-200 rounded-full px-2 py-1';
            case 'Order Completed':
                return 'bg-green-500 rounded-full px-2 py-1';
            case 'Order Cancelled':
                return 'bg-red-400 rounded-full px-2 py-1';
            default:
                return 'bg-gray-200 rounded-full px-2 py-1'; 
        }
    }
    @endphp
    <div class="grid grid-cols-12">
      <div class="col-span-12 p-5">
          <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ml-6">
            <a href="{{ route('admin.home') }}" class="text-3xl font-bold mb-7">
                Order Dashboard
            </a>
            
              <div class="mb-6 mr-6 flex justify-end"> <!-- Update justify-right to justify-end -->
                <form action="{{ route('admin.home') }}" method="GET" class="w-full max-w-md">
                    <div class="flex items-center border-b border-b-2 border-gray-500 py-2">
                        <input type="text" name="query" placeholder="Search orders..." class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                        <button type="submit" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Search</button>
                    </div>
                </form>
            </div>

          </div>

          
        
  
          <div class="hidden lg:block">
              <!-- Display as a table on larger screens -->
              <table class="table-fixed w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
                  <thead class="bg-gray-300">
                      <tr>
                          <th class="px-4 py-2">Ordered By</th>
                          <th class="px-4 py-2">Mode of Payment</th>
                          <th class="px-4 py-2">Price</th>
                          <th class="px-4 py-2">Status</th>
                          <th class="px-4 py-2">Action</th>
                      </tr>
                  </thead>
                  <tbody>  
                      @foreach ($orders->sortByDesc('created_at') as $order)
                          <tr class="even:bg-gray-100">
                              <td class="py-5">{{$order->lastName.", ".$order->firstName}}</td>
                              <td class="py-5">{{$order->mode_of_payment}}</td>
                              <td class="py-5">{{ $order->price ? '₱' . $order->price : "Not Yet Set" }}</td>
                              <td class="py-5">
                                  <span class="{{ getStatusStyle($order->status) }}">{{$order->status}}</span>
                              </td>
                              <td class="py-5 font-bold underline underline-offset-2">
                                  <a href="{{ route('admin.orderdetails', ['id' => $order->id]) }}">View Details</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
  
          <div class="lg:hidden">
              <!-- Display as cards on smaller screens -->
              @foreach ($orders->sortByDesc('created_at') as $order)
                  <div class="bg-white shadow-md rounded-lg overflow-hidden text-left mb-4">
                      <div class="p-4">
                          <div class="flex justify-between items-center mb-2">
                              <div class="font-bold">Ordered By:</div>
                              <div class="flex-1 text-right">{{$order->lastName.", ".$order->firstName}}</div>
                          </div>
                          <div class="flex justify-between items-center mb-2">
                              <div class="font-bold">Mode of Payment:</div>
                              <div class="flex-1 text-right">{{$order->mode_of_payment}}</div>
                          </div>
                          <div class="flex justify-between items-center mb-2">
                              <div class="font-bold">Price:</div>
                              <div class="flex-1 text-right">{{ $order->price ? '₱' . $order->price : "Not Yet Set" }}</div>
                          </div>
                          <div class="flex justify-between items-center mb-2">
                              <div class="font-bold">Status:</div>
                              <div class="flex-1 text-right">
                                  <span class="{{ getStatusStyle($order->status) }}">{{$order->status}}</span>
                              </div>
                          </div>
                          <div class="mt-4">
                              <a href="{{ route('admin.orderdetails', ['id' => $order->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>

          <div class="mt-8 flex justify-center">
            <ul class="flex">
                <li class="mr-3">
                    @if ($orders->onFirstPage())
                        <span class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md">Previous</span>
                    @else
                        <a href="{{ $orders->previousPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Previous</a>
                    @endif
                </li>
                @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                    <li class="{{ $orders->currentPage() == $page ? 'text-bold' : '' }}">
                        <a href="{{ $url }}" class="{{ $orders->currentPage() == $page ? 'px-3 py-2 bg-gray-500 text-white rounded-md' : 'px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300' }}">{{ $page }}</a>
                    </li>
                @endforeach
                <li class="ml-3">
                    @if ($orders->hasMorePages())
                        <a href="{{ $orders->nextPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Next</a>
                    @else
                        <span class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md">Next</span>
                    @endif
                </li>
            </ul>
        </div>
        
      </div>
  </div>
  
</x-admin-layout>