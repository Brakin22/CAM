<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Braulio',
            'email' => 'brau@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'cedula' => '0400000712',
            'address' => 'Av. Universitaria',
            'phone'=> '06980000009',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role' => 'usuarios',
        ]);

        User::create([
            'name' => 'Empleado1',
            'email' => 'empleado1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'role' => 'empleados',
        ]);

        User::factory()
            ->count(10)
            ->state(['role' => 'usuarios'])
            ->create();
    }
}
