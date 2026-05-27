@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
    
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        
        <!-- <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div> -->

         <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div>
<!--         
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div>
         -->

               
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
        </div>
        
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Register</button>
    </form>
    
    <p class="mt-4 text-center">Already have account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
</div>
@endsection