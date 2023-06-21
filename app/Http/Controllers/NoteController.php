<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
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
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);
        return to_route("notes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::where("id", $id)->where('user_id', Auth::id())->firstOrFail();
        return view("notes.show")->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}