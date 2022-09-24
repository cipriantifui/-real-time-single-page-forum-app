<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
use App\Models\Reply;
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
         \App\Models\User::factory(10)->create();
         Category::factory(5)->create();
         Question::factory(20)->create();
         Reply::factory(80)->create();
         Like::factory(100)->create();
    }
}
