<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sd.sch.id'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('password'),
                'role'     => 'super_admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staf@admin.com'],
            [
                'name'     => 'Staf IT',
                'password' => Hash::make('password'),
                'role'     => 'staf',
            ]
        );
    }

}
