<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                Order Dashboard
            </p>
        </div>

        @if ($orders)
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
                        <tr class="even:bg-gray-100 -5">
                            <td class="py-5">{{ $order->username }}</td>
                            <td class="py-5">{{ $order->deliveryAddress }}</td>
                            <td class="py-5">{{ $order->mode_of_payment }}</td>
                            <td class="py-5">{{ $order->price ? '₱' . $order->price : "Not Yet Set" }}</td>
                            <td class="py-5">
                                <span >{{ $order->status }}</span>
                            </td>
                            <td class="py-5 font-bold underline underline-offset-2">
                                <a href="{{ route('admin.orderdetails', ['id' => $order->id]) }}">View Details</a>
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
    <a href="{{ route('order.create') }}"><button>+ Create Order</button></a>
</x-app-layout>
