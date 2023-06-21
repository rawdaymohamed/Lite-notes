<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index()
    {
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5);
        // $notes->each(function($note){
        //     dump($note->title);I
        // });
        return view('notes.index')->with('notes', $notes);
    }
    public function show(Note $note)
    {
        if (!$note->user()->is(Auth::user())) {
            return abort(403);
        }
        return view('notes.show')->with('note', $note);
    }
    public function update(Note $note)
    {
        if (!$note->user()->is(Auth::user())) {
            return abort(403);
        }
        $note->restore();
        return view('notes.show')->with('note', $note);
    }
}