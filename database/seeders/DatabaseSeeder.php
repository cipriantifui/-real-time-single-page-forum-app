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
         \App\Models\User::factory(5)->create();
         Category::factory(2)->create();
         Question::factory(10)->create();
         Reply::factory(20)->create();
         Like::factory(40)->create();
    }
}
