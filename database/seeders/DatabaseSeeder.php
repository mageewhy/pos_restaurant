<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaratrustSeeder::class, 
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);
        \App\Models\User::factory(40)->create()->each(function($user) {
            $user->assignRole('user');
        });
        \App\Models\UserProfile::factory(43)->create();


        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
    }
    }
