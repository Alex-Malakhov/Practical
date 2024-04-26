<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes'; // имя таблицы в базе данных для PostgreSQL

    protected $fillable = ['title', 'description']; // указываем поля, которые можно заполнять

    protected $primaryKey = 'id'; // указываем поле, которое является primary key
}