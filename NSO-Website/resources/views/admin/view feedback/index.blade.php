

<x-app-layout>

    <div  class="grid grid-cols-12">
        <div class="col-span-2 p-5 bg-black text-white  min-h-screen">
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
                  <a href="{{ route('admin.view feedback.index') }}">Feedback</a>
                </p>
              </div>
              <div class="mb-6">
                <p class="text-xl">
                  <a href="{{ route('admin.featured products.index') }}">Featured</a>
                </p>
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
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Rating</th>
                        <th class="px-4 py-2">Comment/Recommendation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr class="even:bg-gray-100">
                            <td class="px-4 py-2 flex justify-center">
                                <div class="w-40 h-40 flex items-center justify-center">
                                    <img src="{{ asset('images/feedback images/'.$feedback->image) }}"
                                         class="w-full h-full object-cover object-center">
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $feedback->rating)
                                        <i class="material-icons text-yellow-500">star</i>
                                    @else
                                        <i class="material-icons text-gray-400">star_border</i>
                                    @endif
                                @endfor
                            </td>
                            <td class="px-4 py-2">{{ $feedback->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        
            
          </div>
    </div>

    


</x-app-layout>