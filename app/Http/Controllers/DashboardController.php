<?php

namespace App\Http\Controllers;

use App\Models\Book;

class DashboardController extends Controller
{
    // public function dash()
    public function index()
    {
        if (!session('user_id')) {
            return redirect()->route('login');
        }

        $recentBooks = Book::orderBy('created_at', 'desc')->take(5)->get();
        // $recentBooks = Book::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('dashboard', [
            'userName' => session('user_name'),
            'userEmail' => session('user_email'),
            // 'userEmail' => session('user_email'),
            'recentBooks' => $recentBooks
        ]);
    }
}