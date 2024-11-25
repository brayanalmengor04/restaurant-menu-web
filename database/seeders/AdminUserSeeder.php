<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Ajusta aquí al espacio de nombres correcto 
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   // Crear un usuario administrador
   User::create([
    'username' => "admin",
    'email' => "admintest@gmail.com",
    'password' => Hash::make("123456789"),
    'contact_name' => "admin",
    'restaurant_name' => "Ficticio S.A ADM",
    'user_type' => "admin",
    'status' => 1,
]);

// Crear un usuario cliente
User::create([
    'username' => "custommer",
    'email' => "customertest@gmail.com",
    'password' => Hash::make("123456789"),
    'contact_name' => "custommer",
    'restaurant_name' => "Ficticio S.A CTM",
    'user_type' => "custommer",
    'status' => 1,
]);
    }
}
