<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    /*
        Mass assignable attributes
    */

    protected $fillable = [
        'text', 'post_id'
    ];

    
    /*
        Get author of the comment
    */

    public function user() {

        return $this->belongsTo(User::class);

    }

     /*
        Get post this comment belongs to
    */

    public function post() {

        return $this->belongsTo(Post::class);

    }
}

