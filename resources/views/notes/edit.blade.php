@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Edit Note</h2>
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $note->title) }}" class="w-full border rounded px-3 py-2" required>
            @error('title')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" required>{{ old('content', $note->content) }}</textarea>
            @error('content')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Category</label>
            <input type="text" name="category" value="{{ old('category', $note->category) }}" class="w-full border rounded px-3 py-2">
            @error('category')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Priority</label>
            <select name="priority" class="w-full border rounded px-3 py-2" required>
                <option value="low" @selected(old('priority', $note->priority)=='low')>Low</option>
                <option value="medium" @selected(old('priority', $note->priority)=='medium')>Medium</option>
                <option value="high" @selected(old('priority', $note->priority)=='high')>High</option>
            </select>
            @error('priority')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Reminder Date</label>
            <input type="datetime-local" name="reminder_date" value="{{ old('reminder_date', $note->reminder_date ? (\Illuminate\Support\Carbon::hasFormat($note->reminder_date, 'Y-m-d H:i:s') ? \Illuminate\Support\Carbon::parse($note->reminder_date)->format('Y-m-d\\TH:i') : $note->reminder_date) : '') }}" class="w-full border rounded px-3 py-2">
            @error('reminder_date')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Tags (comma separated)</label>
            <input type="text" name="tags" value="{{ old('tags', $note->tags) }}" class="w-full border rounded px-3 py-2">
            @error('tags')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('notes.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection 