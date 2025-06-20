@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-bold">Notes</h2>
        <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Note</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Priority</th>
                    <th class="px-4 py-2 border">Reminder</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                <tr>
                    <td class="border px-4 py-2">{{ $note->title }}</td>
                    <td class="border px-4 py-2">{{ $note->category }}</td>
                    <td class="border px-4 py-2 capitalize">{{ $note->priority }}</td>
                    <td class="border px-4 py-2">
                        @if($note->reminder_date)
                            {{ \Illuminate\Support\Carbon::hasFormat($note->reminder_date, 'Y-m-d H:i:s') ? \Illuminate\Support\Carbon::parse($note->reminder_date)->format('Y-m-d H:i') : $note->reminder_date }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <span>
                            <a href="{{ route('notes.show', $note) }}" class="text-blue-600 hover:underline">View</a>
                        </span>
                        <span class="mx-2 text-gray-400">|</span>
                        <span>
                            <a href="{{ route('notes.edit', $note) }}" class="text-yellow-600 hover:underline">Edit</a>
                        </span>
                        <span>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No notes found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $notes->links() }}</div>
</div>
@endsection 