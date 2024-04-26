<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller

{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes);
    }
    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $data=([ 'title'=> $title,'description'=> $description]);
        Note::create($data);
        $note = Note::where('title', $title)->firstOrFail();
        return response()->json($note);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $description = $request->input('description');
        if($id){
            $note = Note::where('id', $id)->firstOrFail();
        } elseif($title){
            $note = Note::where('title', $title)->firstOrFail();
        }
        if ($note){
        if ($description){
            $note->update(['title' => $title]);
        }
        if($title){
            $note->update(['description' => $description]);
        } }
        return response()->json($note);
    }
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        if($id){
            $note = Note::where('id', $id)->firstOrFail();
        } elseif($title){
            $note = Note::where('title', $title)->firstOrFail();
        }
        $note->delete();
        $notes = Note::all();
        return response()->json($notes);
    }
}