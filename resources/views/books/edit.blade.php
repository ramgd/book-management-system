@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Edit Book</h2>
    
    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full px-3 py-2 border rounded" required>
        </div>
<!--         
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Author</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full px-3 py-2 border rounded" required>
        </div>
         -->

                 
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Author</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $book->price) }}" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Published Date</label>
            <input type="date" name="published_date" value="{{ old('published_date', $book->published_date) }}" class="w-full px-3 py-2 border rounded" required>
        </div>
<!--         
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Cover Image URL</label>
            <input type="url" name="cover_image" value="{{ old('cover_image', $book->cover_image) }}" class="w-full px-3 py-2 border rounded">
        </div> -->
   
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Cover Image URL</label>
            <input type="url" name="cover_image" value="{{ old('cover_image', $book->cover_image) }}" class="w-full px-3 py-2 border rounded">
        </div>        
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Update</button>
            <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection