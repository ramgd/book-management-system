@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Books List</h2>
        <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add New Book</a>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search by title or author" class="flex-1 px-3 py-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Search</button>
        </form>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Author</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Published Date</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td class="px-6 py-4">{{ $book->title }}</td>
                    <td class="px-6 py-4">{{ $book->author }}</td>
                    <td class="px-6 py-4">${{ number_format($book->price, 2) }}</td>
                    <td class="px-6 py-4">{{ $book->published_date }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 mr-2">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="text-green-600 mr-2">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4">No books found</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">{{ $books->appends(['search' => $search])->links() }}</div>
    </div>
</div>
@endsection