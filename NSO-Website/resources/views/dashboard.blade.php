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
                        <th class="px-4 py-2">Design Description</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Order Date</th>
                        <th class="px-4 py-2">View</th>
                        <th class="px-4 py-2">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->sortByDesc('created_at') as $order)


                        <tr class="even:bg-gray-100">
                            <td class="px-4 py-5 flex justify-center">
                                <div class="w-40 h-40 flex items-center justify-center">
                                    @if ($order->design_img)
                                        <img src="{{ asset('images/order design images/'.$order->design_img) }}"
                                             class="w-full h-full object-cover object-center"
                                             onclick="zoomImage('{{ asset('images/order design images/'.$order->design_img) }}', '{{ $order->design_text }}')"
                                             style="cursor: pointer;">
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
                                <a href="{{ route('order.orderdetails', ['id' => $order->id]) }}">View Details</a>
                            </td>
                            <td class="text-center">
                                @php
                                    $hasFeedback = $order->feedbacks->isNotEmpty();
                                @endphp
                            
                                @if ($order->status == 'Order Completed' && !$hasFeedback)
                                    <a href="{{ route('feedback.create', ['orderId' => $order->id]) }}" class="ml-6 text-white bg-green-400 px-4 py-2 rounded-md mb-4 inline-block">Create Feedback</a>
                                @elseif ($hasFeedback)
                                    <button class="ml-6 text-white bg-gray-500 px-4 py-2 rounded-md mb-4 inline-flex items-center" disabled>
                                        <span class="mx-auto">Feedback Submitted</span>
                                    </button>
                                @else
                                    <button class="ml-6 text-gray-400 bg-gray-200 px-4 py-2 rounded-md mb-4 inline-flex items-center" disabled>
                                        <span class="mx-auto">Feedback Not Available</span>
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
