@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-10">
    <div class="bg-white dark:bg-gray-800 shadow rounded p-8 mb-8">
        <h2 class="text-2xl font-bold mb-2 flex items-center gap-2">
            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Welcome, {{ Auth::user()->name }}!
        </h2>
        <p class="mb-6 text-gray-600 dark:text-gray-300">You are logged in as <span class="font-semibold">User</span>.</p>
        <div class="flex flex-col sm:flex-row gap-4 mb-4">
            <a href="{{ route('notes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Create Note
            </a>
            <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M4 11h16"/></svg>
                My Notes
            </a>
        </div>
        <div class="mb-4">
            <input type="text" placeholder="Search notes... (coming soon)" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white" disabled />
        </div>
        <h3 class="text-xl font-semibold mb-4 mt-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4m0 0V7a4 4 0 00-4-4H7a4 4 0 00-4 4v10a4 4 0 004 4h4"/></svg>
            Latest Notes
        </h3>
        @if($latestNotes->count())
            <div class="grid gap-4">
                @foreach($latestNotes as $note)
                    <div class="bg-gray-100 dark:bg-gray-700 rounded shadow p-4 flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <div class="text-lg font-bold mb-1">{{ $note->title }}</div>
                            <div class="text-gray-600 dark:text-gray-300 text-sm mb-2 line-clamp-2">{{ Str::limit($note->content, 80) }}</div>
                            <div class="flex gap-2 text-xs text-gray-500 dark:text-gray-400">
                                <span class="capitalize">Priority: {{ $note->priority }}</span>
                                @if($note->reminder_date)
                                    <span>Reminder: {{ \Illuminate\Support\Carbon::parse($note->reminder_date)->format('Y-m-d H:i') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-2 mt-2 md:mt-0">
                            <a href="{{ route('notes.show', $note) }}" class="bg-blue-400 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>View</a>
                            <a href="{{ route('notes.edit', $note) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6"/></svg>Edit</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 hover:bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-gray-500 dark:text-gray-400 mt-4">No notes found. <a href='{{ route('notes.create') }}' class='underline text-blue-500'>Create your first note</a>!</div>
        @endif
    </div>
</div>
@endsection 