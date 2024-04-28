<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'slug'
    ];

    /*
        Get author of the post
    */

    public function user() {

        return $this->belongsTo(User::class);

    }

    /*
        Get comments of this post
    */

    public function comments() {

        return $this->hasMany(Comment::class)->latest();

    }
}
