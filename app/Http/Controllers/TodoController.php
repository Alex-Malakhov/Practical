<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index($note_id)
    {
        $todos = Todo::where('note_id', $note_id)->get();
        return response()->json($todos);
    }

    public function store(Request $request, $note_id)
    {
        $title = $request->input('title');
        $data=(['note_id'=> $note_id,'title'=> $title]);
        Todo::create($data);
        $todo = Todo::where('title', $title)->firstOrFail();
        return response()->json($todo);
    }

    public function updateTodos(Request $request, $note_id)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $completed = $request->input('completed');
        if($id){
            $todo = Todo::where('note_id', $note_id)->findOrFail($id);
        } elseif($title){
            $todos = Todo::where('note_id', $note_id);
            $todo = $todos->where('title', $title);
        }
        if ($todo){
        if ($completed){
            $todo->update(['completed' => $completed]);
            if ($completed == 'false') {
                $todo->completed_at = null;
            } elseif ($completed == 'true') {
                $todo->completed_at = now();
            } 
        }
        if($title){
            $todo->update(['title' => $title]);
        }
        }
        return response()->json($todo);
    }

    public function destroyTodos($note_id)
    {
        Todo::where('note_id', $note_id)->delete();
        $todo = Todo::all();
        return response()->json($todo);
    }

        public function destroy($note_id, $id)
        {

            $todo = Todo::where('note_id', $note_id)->findOrFail($id);
            $todo->delete();
            $todo = Todo::all();
            return response()->json($todo);
        }
}