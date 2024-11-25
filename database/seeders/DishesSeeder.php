<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Dishes;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el usuario administrador
        $adminUser = User::where('email', 'admintest@gmail.com')->first();

        if (!$adminUser) {
            $this->command->error('Admin user not found. Please run AdminUserSeeder first.');
            return;
        }

    
        $placeholderPath = 'default/placeholder.png';
        $placeholderUrl = Storage::url($placeholderPath);
        // Crear categorías
        $categories = [
            'Appetizers',
            'Main Courses',
            'Desserts',
            'Beverages',
        ];
        
        foreach ($categories as $categoryName) {
            $category = Category::create([
                'category_name' => $categoryName,
                'user_id' => $adminUser->id,
            ]);

            // Crear platos (dishes) para cada categoría
            $dishes = [
                [
                    'dish_name' => "{$categoryName} Dish 1",
                    'dish_description' => "A delicious example of {$categoryName}.",
                    'dish_price' => rand(10, 50), // Precio aleatorio
                    'dish_photo' => $placeholderUrl,
                ],
                [
                    'dish_name' => "{$categoryName} Dish 2",
                    'dish_description' => "Another tasty {$categoryName} dish.",
                    'dish_price' => rand(10, 50),
                    'dish_photo' => $placeholderUrl,
                ],
            ];

            foreach ($dishes as $dish) {
                Dishes::create([
                    'dish_name' => $dish['dish_name'],
                    'dish_description' => $dish['dish_description'],
                    'dish_price' => $dish['dish_price'],
                    'dish_photo' => null, 
                    'category_id' => $category->id,
                    'user_id' => $adminUser->id,
                ]);
            }
        }
    }
}
