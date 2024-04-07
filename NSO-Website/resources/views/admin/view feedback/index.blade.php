<x-admin-layout>
    <div class="grid grid-cols-12">
        <div class="col-span-12 p-5">
            <div class="ml-6">
                <p class="text-3xl font-bold mb-7">
                    Feedback Dashboard
                </p>
            </div>
    
            <div class="hidden lg:block">
                <!-- Display as a table on larger screens -->
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
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
                                <td class="px-4 py-5">{{$feedback->user->lastName.", ".$feedback->user->firstName}}</td>
                                <td class="px-4 py-5 flex justify-center">
                                    <div class="w-40 h-40 flex items-center justify-center">
                                        @if ($feedback->image)
                                            <img src="{{ asset('images/feedback images/'.$feedback->image) }}"
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
    
            <div class="lg:hidden">
                <!-- Display as cards on smaller screens -->
                @foreach ($feedbacks->sortByDesc('created_at') as $feedback)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden text-left mb-4">
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Ordered By:</div>
                                <div class="flex-1 text-right">{{ $feedback->order->username }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Feedback Image:</div>
                                <div class="flex-1 flex justify-end">
                                    @if ($feedback->image)
                                        <img src="{{ asset('images/feedback images/'.$feedback->image) }}"
                                             class="w-40 h-40 object-cover object-center"
                                             onclick="zoomImage('{{ asset('images/feedback images/'.$feedback->image) }}', '{{ $feedback->image }}')"
                                             style="cursor: pointer;">
                                    @else
                                        <span class="text-gray-500">Image not available</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Rating:</div>
                                <div class="flex-1 text-right">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $feedback->rating)
                                            <i class="material-icons text-yellow-500">star</i>
                                        @else
                                            <i class="material-icons text-gray-400">star_border</i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-bold">Comment/Recommendation:</div>
                                <div class="flex-1 text-right">{{ $feedback->message }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8 flex justify-center">
                <ul class="flex">
                    <li class="mr-3">
                        @if ($feedbacks->onFirstPage())
                            <span class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md">Previous</span>
                        @else
                            <a href="{{ $feedbacks->previousPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Previous</a>
                        @endif
                    </li>
                    @foreach ($feedbacks->getUrlRange(1, $feedbacks->lastPage()) as $page => $url)
                        <li class="{{ $feedbacks->currentPage() == $page ? 'text-bold' : '' }}">
                            <a href="{{ $url }}" class="{{ $feedbacks->currentPage() == $page ? 'px-3 py-2 bg-gray-500 text-white rounded-md' : 'px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300' }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="ml-3">
                        @if ($feedbacks->hasMorePages())
                            <a href="{{ $feedbacks->nextPageUrl() }}" class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Next</a>
                        @else
                            <span class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md">Next</span>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- End of Pagination Links -->

        </div>
    </div>
</x-admin-layout>
