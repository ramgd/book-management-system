@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Add New Book</h2>
    
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        
        <!-- <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> -->
        

                <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Author *</label>
            <input type="text" name="author" value="{{ old('author') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('author')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Price *</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> -->
              <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Price *</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Published Date *</label>
            <input type="date" name="published_date" value="{{ old('published_date') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('published_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> -->

               <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Published Date *</label>
            <input type="date" name="published_date" value="{{ old('published_date') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   required>
            @error('published_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Cover Image URL (Optional)</label>
            <input type="url" name="cover_image" value="{{ old('cover_image') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                   placeholder="https://example.com/image.jpg">
            @error('cover_image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Create Book
            </button>
            <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection