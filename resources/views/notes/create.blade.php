@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Create Note</h2>
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2" required>
            @error('title')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Content</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" required>{{ old('content') }}</textarea>
            @error('content')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Category</label>
            <input type="text" name="category" value="{{ old('category') }}" class="w-full border rounded px-3 py-2">
            @error('category')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Priority</label>
            <select name="priority" class="w-full border rounded px-3 py-2" required>
                <option value="low" @selected(old('priority')=='low')>Low</option>
                <option value="medium" @selected(old('priority')=='medium')>Medium</option>
                <option value="high" @selected(old('priority')=='high')>High</option>
            </select>
            @error('priority')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Reminder Date</label>
            <input type="datetime-local" name="reminder_date" value="{{ old('reminder_date') }}" class="w-full border rounded px-3 py-2">
            @error('reminder_date')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1 text-white">Tags (comma separated)</label>
            <input type="text" name="tags" value="{{ old('tags') }}" class="w-full border rounded px-3 py-2">
            @error('tags')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('notes.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </div>
    </form>
</div>
@endsection 