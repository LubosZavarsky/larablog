<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {                
        User::factory(3)->create();
        Post::factory(10)->create();
        Comment::factory(12)->create();       
    }
}
