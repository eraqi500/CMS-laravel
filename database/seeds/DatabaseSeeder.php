<?php

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
        // $this->call(UserSeeder::class);
        factory('App\User' , 20)->create()->each(function ($user){
            $user->posts()->save(factory('App\Post')->make());
        });

//        factory(User::class, 10)->create()->each(function ($user) {
//            $user->posts()->saveMany(factory(Posts::class, 5)->make());
//        });
    }
}
