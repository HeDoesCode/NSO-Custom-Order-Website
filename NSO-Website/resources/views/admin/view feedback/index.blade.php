

<x-admin-layout>

    <div class="grid grid-cols-12">
        <div class="col-span-2 p-5 left_panel text-white min-h-screen">
            <div class="mb-8">
                <p class="text-3xl font-bold">Admin Dashboard</p>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.home') }}" class="block text-xl 
                    {{ request()->routeIs('admin.home', 'admin.orderdetails') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-1' : 'pl-4 py-1' }}">
                    Orders
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.view feedback.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.view feedback.index') ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4 py-1' : 'pl-4 py-1' }}">
                    Feedback
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('admin.featured products.index') }}" class="block text-xl 
                    {{ request()->routeIs('admin.featured products.index', 'admin.featured products.create', 'admin.featured products.edit' ) ? 'text-black bg-white font-bold border-b-2 border-gray-500 pl-4' : 'pl-4 py-1' }}">
                    Featured
                </a>
            </div>
        </div>

          <div class="col-span-10 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Feedback Dashboard
                </p>
            </div>

            <table class=" w-full bg-white shadow-md rounded-lg overflow-hidden  text-center">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-4 py-2">Ordered By</th>
                        <th class="px-4 py-2">Feedback Image</th>
                        <th class="px-4 py-2">Rating</th>
                        <th class="px-4 py-2">Comment/Recommendation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks->sortByDesc('created_at') as $feedback)
                        <tr class="even:bg-gray-100">
                            
                            <td class="px-4 py-5">
                                {{ $feedback->order->username }}
                        </td>
                            <td class="px-4 py-5 flex justify-center">
                                <div class="w-40 h-40 flex items-center justify-center">
                                    @if ($feedback->image)
                                        <img src="{{ asset('images/feedback images/'.$feedback->image   ) }}"
                                             class="w-full h-full object-cover object-center"
                                             onclick="zoomImage('{{ asset('images/feedback images/'.$feedback->image) }}', '{{ $feedback->image }}')"
                                             style="cursor: pointer;">
                                    @else
                                        <span class="text-gray-500">Image not available</span>
                                    @endif
                                </div>
                            </td>

                            <td class="px-4 py-5">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $feedback->rating)
                                        <i class="material-icons text-yellow-500">star</i>
                                    @else
                                        <i class="material-icons text-gray-400">star_border</i>
                                    @endif
                                @endfor
                            </td>
                            <td class="px-4 py-5">{{ $feedback->message }}</td>



                        </tr>
                    @endforeach
                </tbody>
            </table>

        
            
          </div>
    </div>

    


</x-admin-layout>