<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('jwt.auth');
    // }

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }


    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');
        
        $query = Book::where('_deleted', 0);
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }
        
        $books = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $books->items(),
            'total' => $books->total(),
            'per_page' => $books->perPage(),
            'current_page' => $books->currentPage(),
            'last_page' => $books->lastPage()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'cover_image' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // $book = Book::create([
        //     'title' => $request->title,
        //     'author' => $request->author,
        //     'cover_image' => $request->cover_image,
        //     'price' => $request->price,
        //     'published_date' => $request->published_date,
        //     '_deleted' => 0
        // ]);




        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'cover_image' => $request->cover_image,
            'price' => $request->price,
            'published_date' => $request->published_date,
            '_deleted' => 0
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    public function show($id)
    {
        $book = Book::where('id', $id)->where('_deleted', 0)->first();
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    public function update(Request $request, $id)
    {
        // $book = Book::where('id', $id)->where('_deleted', 0)->first();
        $book = Book::where('id', $id)->where('_deleted', 0)->first();
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // 'price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'cover_image' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $book->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    public function destroy($id)
    {
        $book = Book::where('id', $id)->where('_deleted', 0)->first();
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }
        
        $book->update(['_deleted' => 1]);

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ]);
    }
}