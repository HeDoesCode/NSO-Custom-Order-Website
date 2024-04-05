<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                My Custom Orders
            </p>
        </div>

        <a href="{{ route('order.create') }}" class="ml-6 text-white bg-gray-500 px-4 py-2 rounded-md mb-4 inline-block">+ Create Order</a>

        @if (session()->has('success')) 
            <span>{{ session('success') }}</span>
        @endif

        <div class="hidden lg:block">
            <!-- Display as a table on larger screens -->
            @if ($orders)
                <table class="table-fixed w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
                    <!-- Table headers -->
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
                        <!-- Table rows -->
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

        <div class="lg:hidden">
            <!-- Display as cards on smaller screens -->
            @if ($orders)
                @foreach ($orders->sortByDesc('created_at') as $order)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden text-left mb-4">
                        <div class="p-4">
                            @if ($order->design_img)
                                <img src="{{ asset('images/order design images/'.$order->design_img) }}"
                                     class="w-full h-auto object-cover object-center mb-4"
                                     onclick="zoomImage('{{ asset('images/order design images/'.$order->design_img) }}', '{{ $order->design_text }}')"
                                     style="cursor: pointer;">
                            @else
                                <span class="text-gray-500">Image not available</span>
                            @endif
                            <div class="text-left">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="font-bold">Design Description:</div>
                                    <div class="flex-1 text-right">{{ $order->design_text }}</div>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="font-bold">Price:</div>
                                    <div class="flex-1 text-right">{{ $order->price ? '₱' . $order->price : "Waiting For Seller" }}</div>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="font-bold">Status:</div>
                                    <div class="flex-1 text-right">{{ $order->status }}</div>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="font-bold">Order Date:</div>
                                    <div class="flex-1 text-right">{{ $order->order_date }}</div>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('order.orderdetails', ['id' => $order->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                                </div>
                                <div class="mt-2">
                                    @php
                                        $hasFeedback = $order->feedbacks->isNotEmpty();
                                    @endphp
                                
                                    @if ($order->status == 'Order Completed' && !$hasFeedback)
                                        <a href="{{ route('feedback.create', ['orderId' => $order->id]) }}" class="text-green-400 hover:underline">Create Feedback</a>
                                    @elseif ($hasFeedback)
                                        <span class="text-gray-500">Feedback Submitted</span>
                                    @else
                                        <span class="text-gray-500">Feedback Not Available</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No orders available.</p>
            @endif
        </div>
    </div>
</x-app-layout>
