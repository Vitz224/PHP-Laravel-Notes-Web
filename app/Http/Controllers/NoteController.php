<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notes = $user->role === 'admin'
            ? Note::latest()->paginate(10)
            : $user->notes()->latest()->paginate(10);
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'priority' => 'required|in:low,medium,high',
            'reminder_date' => 'nullable|date',
            'tags' => 'nullable|string|max:255',
        ]);
        $validated['user_id'] = Auth::id();
        Note::create($validated);
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show(Note $note)
    {
        $this->authorizeNote($note);
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $this->authorizeNote($note);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorizeNote($note);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'priority' => 'required|in:low,medium,high',
            'reminder_date' => 'nullable|date',
            'tags' => 'nullable|string|max:255',
        ]);
        $note->update($validated);
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $this->authorizeNote($note);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }

    private function authorizeNote(Note $note)
    {
        $user = Auth::user();
        if ($user->role !== 'admin' && $note->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }
    }
}
