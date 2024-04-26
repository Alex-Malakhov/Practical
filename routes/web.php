<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;
Route::get('/', function() {return '3424';});
Route::get('/api/notes', [NoteController::class,'index']);
Route::get('/api/notes/{note_id}/todos', [TodoController::class,'index']);

Route::post('/api/notes', action:[NoteController::class,'store']); 
Route::post('/api/notes/{note_id}/todos/', [TodoController::class,'store']);

Route::patch('/api/notes/', [NoteController::class,'update']);
Route::patch('/api/notes/{note_id}/todos',  [TodoController::class,'updateTodos']);

Route::delete('/api/notes', [NoteController::class,'destroy']);

Route::delete('/api/notes/{note_id}/todos', [TodoController::class,'destroyTodos']);
Route::delete('/api/notes/{note_id}/todos/{id}', [TodoController::class,'destroy']);