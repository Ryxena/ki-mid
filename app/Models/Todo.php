<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['todo', 'status', 'users_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'nis');
    }
}
