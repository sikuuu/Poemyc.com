<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userMaster=User::create([
            'username' => 'superadmin',
            'email' => 'vguitart6@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
