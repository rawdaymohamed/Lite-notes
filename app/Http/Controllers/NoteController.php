<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $notes = Note::where('user_id', $userId)->latest('updated_at')->paginate(5);
        // $notes->each(function($note){
        //     dump($note->title);I
        // });
        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("notes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:20', 'text' => 'required']);

        Note::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);
        return to_route("notes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // $note = Note::where("uuid", $uuid)->where('user_id', Auth::id())->firstOrFail();
        if ($note->user_id != Auth::id()) {
            return abort(403);
        }
        return view("notes.show")->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id != Auth::id()) {
            return abort(403);
        }
        return view("notes.edit")->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {

        if ($note->user_id != Auth::id()) {
            return abort(403);
        }
        $request->validate(['title' => 'required|max:20', 'text' => 'required']);
        $note->update([
            'title' => $request->title,
            'text' => $request->text
        ]);
        return to_route("notes.show", $note)->with("success", "Note updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id != Auth::id()) {
            return abort(403);
        }
        $note->delete();
        return to_route("notes.index");

    }
}