<?php

namespace Database\Seeders;

use App\Models\Campus;
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
                'name' => 'Admin',
                'email' => 'admin@csu.edu.ph',
                'role' => 'Admin',
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
                'name' => 'Lallo Admin',
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
                'name' => 'Sanchez Mira Admin',
                'email' => 'sanchezmira@csu.edu.ph',
                'role' => 'Campus',
            ],
            [
                'name' => 'Solana Admin',
                'email' => 'solana@csu.edu.ph',
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
                'password' => Hash::make('11111111'),
            ]);

            $createdUser->roles()->attach(
                Role::where('name', $user['role'])->first()
            );

            if ($user['role'] === 'Campus') {
                // Map user names to campus names
                $campusMapping = [
                    'Andrews' => 'Andrews',
                    'Aparri' => 'Aparri',
                    'Carig' => 'Carig',
                    'Gonzaga' => 'Gonzaga',
                    'Lallo' => 'Lallo',
                    'Lasam' => 'Lasam',
                    'Piat' => 'Piat',
                    'Sanchez' => 'Sanchez Mira',
                    'Solana' => 'Solana',
                ];

                $userNameFirst = explode(' ', $user['name'])[0];
                $campusName = $campusMapping[$userNameFirst] ?? $userNameFirst;
                $campus = Campus::where('name', $campusName)->first();

                if ($campus) {
                    $createdUser->update(['campus_id' => $campus->id]);
                }
            }
        }
    }
}
