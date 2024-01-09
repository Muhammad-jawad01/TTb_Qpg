<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'admin@admin.com';
        $type = "system";
        $users = User::all();

        if (sizeof($users) == 0) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'type' => $type,
            ]);

            $user->assignRole(1);
        }
    }
}
