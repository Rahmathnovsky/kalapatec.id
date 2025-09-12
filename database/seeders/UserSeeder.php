<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Firyal Riyanti',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'role' => UserRole::ADMINISTRATOR

            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'role' => UserRole::USER
            ],[
                'name' => 'Kalapa 01',
                'email' => 'kalapa01@kalapa.id',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'role' => UserRole::USER
            ]
        ];
        User::insert($users);
    }
}
