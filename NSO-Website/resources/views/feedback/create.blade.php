<?php
    $user = auth()->user();
?>

<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                Leave Feedback
            </p>
        </div>

        <div class="max-w-5xl mx-auto bg-white shadow-md p-6 rounded-md mb-4">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Feedback Form</h2>
                
                <a href="{{ route('dashboard') }}" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800">Cancel</a>
            </div>
    
            <ul class="text-red-500">
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
    
            <form action="{{ route('feedback.store', ['orderId' => $orderId]) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="order_id" value="{{ $orderId }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mb-4 flex items-center">
                    <label for="rating" class="block text-sm font-medium text-gray-600">Rating:</label>
                    <div x-data="starRating()" x-init="initStars({{ old('rating', 0) }})" class="ml-2">
                        <template x-for="star in stars" :key="star">
                            <i x-on:mouseover="highlight(star)" x-on:click="setRating(star)"
                               :class="{ 'text-yellow-500': star <= currentRating, 'text-gray-400': star > currentRating }"
                               class="material-icons cursor-pointer text-6xl">star</i>
                        </template>
                        <input type="hidden" name="rating" x-model="currentRating">
                    </div>
                </div>
    
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-600">Image (if applicable):</label>
                    <input type="file" name="image" accept="image/*"
                           class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
    
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-600">Message:</label>
                    <textarea name="message"
                              class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
                </div>
    
                <button type="submit"
                        class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Submit Feedback
                </button>
            </form>
    
            @if (session()->has('success')) 
                <div class="bg-green-200 text-green-800 p-4 mt-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function starRating() {
            return {
                stars: [1, 2, 3, 4, 5],
                currentRating: 0,
    
                initStars(initialRating) {
                    this.currentRating = initialRating;
                },
    
                highlight(star) {
                    this.currentRating = star;
                },
    
                setRating(star) {
                    this.currentRating = star;
                },
            };
        }
    </script>
</x-app-layout>
