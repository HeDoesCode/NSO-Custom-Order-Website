<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ml-6">
            <a href="{{ route('dashboard') }}" class="text-3xl font-bold mb-7">
                My Custom Orders
            </a>

            
                <div class="mb-6 mr-6 flex justify-end">
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full max-w-md">
                        <div class="flex items-center border-b border-b-2 border-gray-500 py-2">
                            <input type="text" name="query" placeholder="Search orders..." class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                            <button type="submit" class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded">Search</button>
                        </div>
                    </form>
                </div>
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
                                <td class="py-5">@if($order->price)
                                    <p>₱{{ number_format($order->price, 2) }}</p>
                                @else
                                    <p">Waiting For Seller</p>
                                @endif</td>
                                <td class="py-5">
                                    <span >{{ $order->status }}</span>
                                </td>
                                <td class="py-5">{{ $order->order_date }}</td>
                                
                                <td class="py-5 font-bold underline underline-offset-2">
                                    <a href="{{ route('order.orderdetails', ['id' => $order->id]) }}">View Details</a>
                                </td>
                                <td class="py-5 flex items-center justify-center">
                                    @php
                                        $hasFeedback = $order->feedbacks->isNotEmpty();
                                    @endphp
                                
                                    @if ($order->status == 'Order Completed' && !$hasFeedback)
                                        <a href="{{ route('feedback.create', ['orderId' => $order->id]) }}" class="ml-6 text-white bg-green-400 px-2 py-2 rounded-md mb-4 inline-block">Create Feedback</a>
                                    @elseif ($hasFeedback)
                                        <button class="ml-6 text-white bg-gray-500 px-2 py-2 rounded-md mb-4 inline-flex items-center" disabled>
                                            <span class="mx-auto">Feedback Submitted</span>
                                        </button>
                                    @else
                                        <button class="ml-6 text-gray-400 bg-gray-200 px-2 py-2 rounded-md mb-4 inline-flex items-center" disabled>
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
                            <div class="flex justify-center items-center">
                                @if ($order->design_img)
                                <img src="{{ asset('images/order design images/'.$order->design_img) }}"
                                     class="w-60 h-60 object-cover object-center mb-4"
                                     onclick="zoomImage('{{ asset('images/order design images/'.$order->design_img) }}', '{{ $order->design_text }}')"
                                     style="cursor: pointer;">
                            @else
                                <span class="text-gray-500">Image not available</span>
                            @endif
                            </div>
                            
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
                                    <a href="{{ route('order.orderdetails', ['id']) }}" class="text-blue-500 hover:underline">View Details</a>
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

        <!-- Pagination Links -->
        @if ($orders && $orders->lastPage() > 1)
            <div class="mt-8 flex justify-center">
                <ul class="flex">
                    <li class="mr-3">
                        <a href="{{ $orders->previousPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Previous</a>
                    </li>
                    @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                        <li class="{{ $orders->currentPage() == $page ? 'text-bold' : '' }}">
                            <a href="{{ $url }}" class="{{ $orders->currentPage() == $page ? 'px-3 py-2 bg-gray-500 text-white rounded-md' : 'px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300' }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="ml-3">
                        <a href="{{ $orders->nextPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Next</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>

