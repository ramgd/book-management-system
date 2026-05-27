@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
        <p>Welcome, {{ $userName }}!</p>
        <p>Email: {{ $userEmail }}</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold">Recent Books</h3>
            <a href="{{ route('books.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">View All Books</a>
        </div>
        
        @if(count($recentBooks) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- @foreach($recentBooks as $book)
                    <div class="border rounded p-4">
                        <h4 class="font-bold">{{ $book->title }}</h4>
                        <p>Author: {{ $book->author }}</p>
                        <p>Price: {{ number_format($book->price, 2) }}</p>
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-500">View Details</a>
                    </div>
                @endforeach -->

                       @foreach($recentBooks as $book)
                    <div class="border rounded p-4">
                        <h4 class="font-bold">{{ $book->title }}</h4>
                        <p>Author: {{ $book->author }}</p>
                        <p>Price: {{ number_format($book->price, 2) }}</p>
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-500">View Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <p>No books found. <a href="{{ route('books.create') }}" class="text-blue-500">Add your first book</a></p>
        @endif
    </div>
</div>
@endsection