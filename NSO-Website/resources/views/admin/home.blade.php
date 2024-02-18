<x-app-layout>
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
                return 'bg-red-200 rounded-full px-2 py-1';
            default:
                return 'bg-gray-200 rounded-full px-2 py-1'; 
        }
    }
    @endphp
    <div  class="grid grid-cols-12">
        <div class="col-span-2 p-5 bg-black text-white h-dvh">
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
                  <a href="">Feedback</a>
                </p>
              </div>
              <div class="mb-6">
                <p class="text-xl">
                  <a href="">Featured</a>
                </p>
              </div>
          </div>

          <div class="col-span-10 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Order Dashboard
                </p>
            </div>

            <table class="table-fixed w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
                <thead class="bg-gray-300">
                  <tr>
                    <th class="px-4 py-2">Ordered By</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Mode of Payment</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                    
                  @foreach ($orders as $order)
                  <tr class="even:bg-gray-100">
                      <td>{{$order->username}}</td>
                      <td>{{$order->deliveryAddress}}</td>
                      <td>{{$order->mode_of_payment}}</td>
                      <td>{{ $order->price ? '₱' . $order->price : "Not Yet Set" }}</td>
                      <td>
                        <span class="{{ getStatusStyle($order->status) }}">{{$order->status}}</span>
                    </td>
                      <td class="font-bold underline underline-offset-2">
                        <a href="{{ route('admin.orderdetails', ['id' => $order->id]) }}">View Details</a>
                    </td>
                  </tr>
              @endforeach


              


                </tbody>
              </table>

        
            
          </div>
    </div>

</x-app-layout>