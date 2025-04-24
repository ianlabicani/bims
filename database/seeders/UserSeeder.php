<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Central Admin',
                'email' => 'central@csu.edu.ph',
                'role' => 'Central',
            ],
            [
                'name' => 'Andrews Admin',
                'email' => 'andrews@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Aparri Admin',
                'email' => 'aparri@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Carig Admin',
                'email' => 'carig@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Gonzaga Admin',
                'email' => 'gonzaga@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Lal-lo Admin',
                'email' => 'lallo@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Lasam Admin',
                'email' => 'lasam@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Piat Admin',
                'email' => 'piat@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Sanchez-Mira Admin',
                'email' => 'sanchezmira@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@csu.edu.ph',
                'role' => 'User',
            ],
        ];

        foreach ($users as $user) {
            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('11111111')
            ]);

            $createdUser->roles()->attach(
                Role::where('name', $user['role'])->first()
            );
        }
    }
}
