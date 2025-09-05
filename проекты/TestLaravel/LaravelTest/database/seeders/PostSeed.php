<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $posts = \App\Models\Post::factory()->count(5)->create();
        Post::factory(5)->create();
    }
}
