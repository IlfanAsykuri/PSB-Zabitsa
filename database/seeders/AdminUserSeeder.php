<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Super Admin',
                'email'    => 'admin@psb.zabitsa',
                'password' => Hash::make('password123'),
                'role'     => 'admin',
                'spatie_role' => 'admin',
            ],
            [
                'name'     => 'Petugas Pengasramaan',
                'email'    => 'pengasramaan@psb.zabitsa',
                'password' => Hash::make('password123'),
                'role'     => 'pengasramaan',
                'spatie_role' => 'pengasramaan',
            ],
            [
                'name'     => 'Petugas PSB',
                'email'    => 'psb@psb.zabitsa',
                'password' => Hash::make('password123'),
                'role'     => 'psb',
                'spatie_role' => 'psb',
            ],
            [
                'name'     => 'Petugas Logistik',
                'email'    => 'logistik@psb.zabitsa',
                'password' => Hash::make('password123'),
                'role'     => 'logistik',
                'spatie_role' => 'logistik',
            ],
        ];

        foreach ($users as $userData) {
            $spatieRole = $userData['spatie_role'];
            unset($userData['spatie_role']);

            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
            $user->syncRoles([$spatieRole]);
        }
    }
}
