@if (session()->has('status')) 
        <span>{{ session('status') }}</span>
    @endif

<form action="{{ route('feedback.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="rating">Rating:</label>
    <input type="number" name="rating" min="1" max="5" required>

    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*">

    <label for="message">Message:</label>
    <textarea name="message"></textarea>

    <button type="submit">Submit Feedback</button>
</form>
