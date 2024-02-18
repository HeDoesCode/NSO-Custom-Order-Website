<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                My Custom Orders
            </p>
        </div>

        <a href="{{ route('order.create') }}" class="ml-6 text-white bg-gray-500 px-4 py-2 rounded-md mb-4 inline-block">+ Create Order</a>
  
        @if ($orders)
            <table class="table-fixed w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-4 py-2">Design Image</th>
                        <th class="px-4 py-2">Design Text</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Order Date</th>
                        <th class="px-4 py-2">View</th>
                        <th class="px-4 py-2">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="even:bg-gray-100 -5">
                            <td class="px-4 py-5 flex justify-center">
                                <div class="w-40 h-40 flex items-center justify-center">
                                    @if ($order->design_img)
                                        <img src="{{ asset('images/order design images/'.$order->design_img) }}"
                                             class="w-full h-full object-cover object-center">
                                    @else
                                        <span class="text-gray-500">Image not available</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-5">{{ $order->design_text }}</td>
                            <td class="py-5">{{ $order->price ? '₱' . $order->price : "Waiting For Seller" }}</td>
                            <td class="py-5">
                                <span >{{ $order->status }}</span>
                            </td>
                            <td class="py-5">{{ $order->order_date }}</td>
                            
                            <td class="py-5 font-bold underline underline-offset-2">
                                <a href="{{ route('admin.orderdetails', ['id' => $order->id]) }}">View Details</a>
                            </td>
                            <td>
                                @if ($order->status == 'Order Completed' && !$order->feedback) <!-- Check status and if feedback is not given -->
                                    <a href="{{ route('feedback.create') }}" class="ml-6 text-white bg-green-400 px-4 py-2 rounded-md mb-4 inline-block">Create Feedback</a>
                                @else
                                    <button class="ml-6 text-gray-400 bg-gray-200 px-4 py-2 rounded-md mb-4 inline-block" disabled>
                                        Feedback Not Available
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders available.</p>
        @endif
    </div>

    @if (session()->has('success')) 
        <span>{{ session('success') }}</span>
    @endif
    
</x-app-layout>
