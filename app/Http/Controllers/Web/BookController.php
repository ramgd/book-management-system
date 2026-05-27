<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Check login for all methods
    public function __construct()
    {
        // Only check session, not JWT token
        if (!session('user_id')) {
            redirect()->route('login')->send();
        }
    }

    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $books = Book::search($search)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        
        return view('books.index', compact('books', 'search'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'cover_image' => 'nullable|url'
        ]);

        try {
            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'cover_image' => $request->cover_image,
                'price' => $request->price,
                'published_date' => $request->published_date,
                '_deleted' => 0
            ]);

            return redirect()->route('books.index')
                ->with('success', 'Book "' . $book->title . '" created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create book: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'cover_image' => 'nullable|url'
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->update(['_deleted' => 1]);
            return redirect()->route('books.index')
                ->with('success', 'Book deleted successfully!');
        }
        return redirect()->route('books.index')
            ->with('error', 'Book not found');
    }
}