<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    /** @use HasFactory<\Database\Factories\TodoListFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'completed',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
