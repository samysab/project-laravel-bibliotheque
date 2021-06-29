<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the post.
     * le post appartient a 1 user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
