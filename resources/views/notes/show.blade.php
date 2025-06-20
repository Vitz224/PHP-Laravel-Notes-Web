@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Note Details</h2>
    <div class="bg-white shadow rounded p-6 mb-4">
        <div class="mb-2"><span class="font-semibold">Title:</span> {{ $note->title }}</div>
        <div class="mb-2"><span class="font-semibold">Content:</span> {{ $note->content }}</div>
        <div class="mb-2"><span class="font-semibold">Category:</span> {{ $note->category }}</div>
        <div class="mb-2"><span class="font-semibold">Priority:</span> <span class="capitalize">{{ $note->priority }}</span></div>
        <div class="mb-2"><span class="font-semibold">Reminder Date:</span> 
            @if($note->reminder_date)
                {{ \Illuminate\Support\Carbon::hasFormat($note->reminder_date, 'Y-m-d H:i:s') ? \Illuminate\Support\Carbon::parse($note->reminder_date)->format('Y-m-d H:i') : $note->reminder_date }}
            @else
                -
            @endif
        </div>
        <div class="mb-2"><span class="font-semibold">Tags:</span> {{ $note->tags }}</div>
        <div class="mb-2"><span class="font-semibold">Created At:</span> {{ $note->created_at->format('Y-m-d H:i') }}</div>
        <div class="mb-2"><span class="font-semibold">Updated At:</span> {{ $note->updated_at->format('Y-m-d H:i') }}</div>
    </div>
    <div class="flex justify-end space-x-2">
        <a href="{{ route('notes.edit', $note) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
        <a href="{{ route('notes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
    </div>
</div>
@endsection 