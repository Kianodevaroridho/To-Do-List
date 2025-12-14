<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function todoLists()
    {
        return $this->belongsToMany(
            TodoList::class,
            'todo_list_category',
            'category_id',
            'todo_list_id'
        );
    }
}
