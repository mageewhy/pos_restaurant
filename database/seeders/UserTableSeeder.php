<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'System',
                'last_name' => 'Admin',
                'username' => 'systemadmin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'phone_number' => '+12398190255',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
            ],
            // [
            //     'first_name' => 'Demo',
            //     'last_name' => 'Admin',
            //     'username' => 'demoadmin',
            //     'email' => 'demo@example.com',
            //     'password' => bcrypt('password'),
            //     'phone_number' => '+12398190255',
            //     'email_verified_at' => now(),
            //     'user_type' => 'demo_admin',
            // ],
        ];
        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole($value['user_type']);
        }
    }
}
