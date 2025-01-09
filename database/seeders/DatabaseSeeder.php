<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
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
        $admin = [
            [
                'username' => 'admin',
                'password' =>  Hash::make('123456'),
            ],   
        ];

        foreach ($admin as $key => $value) {
            Admin::create($value);
        }
    }
}
