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
                'role' => 'admin',
                'campus_name' => null,
            ],
            [
                'name' => 'Andrews Admin',
                'email' => 'andrews@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Andrews',
            ],
            [
                'name' => 'Aparri Admin',
                'email' => 'aparri@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Aparri',
            ],
            [
                'name' => 'Carig Admin',
                'email' => 'carig@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Carig',
            ],
            [
                'name' => 'Gonzaga Admin',
                'email' => 'gonzaga@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Gonzaga',
            ],
            [
                'name' => 'Lallo Admin',
                'email' => 'lallo@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Lallo',
            ],
            [
                'name' => 'Lasam Admin',
                'email' => 'lasam@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Lasam',
            ],
            [
                'name' => 'Piat Admin',
                'email' => 'piat@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Piat',
            ],
            [
                'name' => 'Sanchez Mira Admin',
                'email' => 'sanchezmira@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Sanchez Mira',
            ],
            [
                'name' => 'Solana Admin',
                'email' => 'solana@csu.edu.ph',
                'role' => 'campus',
                'campus_name' => 'Solana',
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@csu.edu.ph',
                'role' => 'user',
                'campus_name' => null,
            ],
        ];

        foreach ($users as $user) {
            // Assign campus_id if campus_name is provided
            $campusId = null;
            if ($user['campus_name']) {
                $campus = Campus::where('name', $user['campus_name'])->first();
                if ($campus) {
                    $campusId = $campus->id;
                }
            }

            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('11111111'),
                'campus_id' => $campusId,
            ]);

            $createdUser->roles()->attach(
                Role::where('name', $user['role'])->first()
            );
        }
    }
}
