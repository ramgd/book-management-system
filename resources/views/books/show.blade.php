@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Book Details</h2>
    
    @if($book->cover_image)
        <div class="mb-6">
            <img src="{{ $book->cover_image }}" class="w-full h-64 object-cover rounded">
        </div>
    @endif
<!--     
    <div class="space-y-4">
        <div><strong>Title:</strong> {{ $book->title }}</div>
        <div><strong>Author:</strong> {{ $book->author }}</div>
        <div><strong>Price:</strong> {{ number_format($book->price, 2) }}</div>
        <div><strong>Published Date:</strong> {{ date('F d, Y', strtotime($book->published_date)) }}</div>
        <div><strong>Added on:</strong> {{ date('F d, Y', strtotime($book->created_at)) }}</div>
    </div> -->


        
    <div class="space-y-4">
        <div><strong>Title:</strong> {{ $book->title }}</div>
        <div><strong>Author:</strong> {{ $book->author }}</div>
        <div><strong>Price:</strong> {{ number_format($book->price, 2) }}</div>
        <div><strong>Published Date:</strong> {{ date('F d, Y', strtotime($book->published_date)) }}</div>
        <!-- <div><strong>Published Date:</strong> {{ date('F d, Y', strtotime($book->published_date)) }}</div> -->
        <div><strong>Added on:</strong> {{ date('F d, Y', strtotime($book->created_at)) }}</div>
    </div>
    
    <div class="flex gap-4 mt-6">
        <a href="{{ route('books.edit', $book->id) }}" class="bg-green-500 text-white px-6 py-2 rounded">Edit</a>
        <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded">Back</a>
    </div>
</div>
@endsection