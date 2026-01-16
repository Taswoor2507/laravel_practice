<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',   // 🔥 important
        'completed'  // optional, agar boolean column hai
    ];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
