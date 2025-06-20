@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-10">
    <div class="bg-white dark:bg-gray-800 shadow rounded p-8">
        <h2 class="text-2xl font-bold mb-2">Welcome, {{ Auth::user()->name }}!</h2>
        <p class="mb-6 text-gray-600 dark:text-gray-300">You are logged in as <span class="font-semibold">Admin</span>.</p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Manage Notes</a>
            <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">User Management (Coming Soon)</a>
        </div>
    </div>
</div>
@endsection 