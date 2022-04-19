<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
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
        Post::factory(10)->create();
        User::factory(10)->create();
        // Website::factory(10)->create();


        $websites = Website::all();

        // Populate the pivot table
        User::all()->each(function ($user) use ($websites) {
            $user->websites()->attach(
                $websites->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
