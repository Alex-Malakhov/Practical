<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos'; // указываем имя таблицы в базе данных
    protected $fillable = ['note_id', 'title', 'completed', 'completed_at']; // указываем поля, которые можно заполнять
    protected $primaryKey = 'id';

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}