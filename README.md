
# 🍴 Restaurant Management System

Welcome to the **Restaurant Management System**, a modern platform designed to streamline restaurant operations, provide dynamic API management, and deliver real-time insights. Below is an overview of the main features and components of the system.

---

## 📊 Dashboard Overview

The **Dashboard** serves as the control center of the platform, offering:
- A quick summary of the system’s current state.
- Access to key metrics, such as the number of dishes, suppliers, and user interactions.
- Shortcuts to navigate through the system’s core functionalities.

![Dashboard](github/media/screenshots/dasboard.png)  
*The main dashboard showcasing key metrics and navigation.*

---

## 🌍 API Management: Panama Localization

The platform features a powerful **API Management** system specifically designed to handle location-based data in Panama. This API includes endpoints for managing:
- **Districts**: Fetch all districts or get details for a specific district.
- **Provinces**: Access province information across Panama.
- **Corregimientos**: Manage detailed corregimiento data for granular localization.

Example endpoints include:
```bash
GET /api/districts
GET /api/provinces/{id}
GET /api/corregimientos/{id}
```

This API is designed to be flexible, secure, and ready for production deployment.

![API Documentation](github/media/screenshots/Api.png)  
*An example of the API management interface, showing all endpoints.*
---
## 📜 API Documentation

The system includes a **real-time API Documentation Panel**, accessible directly from the dashboard. This panel allows users to:
- **Explore Endpoints**: View and test all available API routes interactively.
- **Authentication Control**: Test secured endpoints with admin-provided tokens.
- **Live Updates**: Automatically reflect the latest changes made to the API, ensuring the documentation is always up-to-date.

Access the documentation by navigating to `/api/documentation`.

---

## 🍽️ Dishes Panel

The **Dishes Panel** offers a comprehensive breakdown of all dishes served at the restaurant. Key features include:
- Add, edit, or delete dishes with ease.
- View detailed information about each dish, including ingredients, preparation time, and pricing.
- Manage dish categories for better organization and faster user navigation.

![Dishes Management](github/media/screenshots/dishesGestion.png)  
*The Dishes Management Panel, allowing full control over the menu.*

---

## ⭐ Top Rated Dishes

The **Top 5 Best Rated Dishes** feature dynamically showcases the most highly-rated dishes based on user reviews. It updates in real time as new ratings are submitted, ensuring:
- Users can always see the most popular dishes.
- Restaurant owners can identify which dishes are performing best.

This feature is prominently displayed on the dashboard for quick insights.

![Top Rated Dishes](github/media/screenshots/toprating.png)  
*Real-time updates showing the 5 top-rated dishes.*

---

## 💬 Customer Testimonials

The **Testimonials Section** highlights the most recent feedback from customers. It includes:
- Real-time updates with the latest comments and reviews.
- A dedicated space for customers to share their thoughts about the restaurant.
- Insightful data to help the restaurant improve its service quality based on user feedback. 

![Testimonials](github/media/screenshots/apigestion.png)  
*Customer testimonials showcasing the most recent reviews.*

---

# 🍽️ **Dish Ratings & Reviews Feature**  

Welcome to the **Dish Ratings & Reviews** feature! This functionality allows users to leave their thoughts and ratings on dishes, fostering a vibrant community of food lovers. Whether a dish was spectacular or could use some improvement, your users can share their experiences and guide others.  

![Reviews Feature](github/media/screenshots/reviews.png)  

---

## 🚀 **Key Features**  

### ⭐ **Rate Your Favorite Dishes**
- Users can rate dishes on a scale of 1 to 5 stars.
- Clear visual representation of the average rating.  


---

### ✍️ **Leave Detailed Reviews**
- Share your experience in a comment box.  
- Reviews can include:  
  - What you loved  
  - Suggestions for improvement  
  - Personal tips (e.g., "Try this dish with extra sauce!")  

---

### 🔍 **Explore Reviews Easily**
- Browse reviews by most helpful, newest, or highest-rated.  
- Filter comments based on rating (e.g., show only 5-star reviews).  

---


## 🚀 Get Started

Follow these steps to set up the project locally:

```bash
# Step 1: Clone the repository
git clone https://github.com/brayanalmengor04/restaurant-menu-web.git
cd restaurant-menu-web.git

# Step 2: Install dependencies
composer install
npm install

# Step 3: Set up the environment
cp .env.example .env
# Update database credentials and API configurations in the .env file

# Step 4: Run database migrations
php artisan migrate

# Step 5: Start the development server
php artisan serve
```
## Initial Setup

After cloning the repository and installing the necessary dependencies, you can load predefined data into the database using the following seeders. These include an admin user, locations, and main dishes for the application.

### Commands to run the seeders

1. **Generate an admin user and customer:**
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   php artisan db:seed --class=LocationSeeder
   php artisan db:seed --class=DishesSeeder
   ```

This should be a clear guide for anyone setting up the project on their local machine.

---
## Seeders Explained

In this section, we explain what each seeder does and how it helps populate the database with predefined data. Running these seeders ensures that you have the essential data for the application to function properly.

### 1. **AdminUserSeeder: Generates Admin and Customer Users**

This seeder creates two users: one admin user and one customer. These users are important for initial setup and testing the application.

- **Admin User**: The admin user has elevated privileges, typically used to manage other users and configurations within the app.
- **Customer User**: A regular user with limited permissions, used for testing or interacting with the app from a user perspective.

#### What the `AdminUserSeeder` does:
```php
// AdminUserSeeder.php

public function run()
{
    // Create an admin user with specific roles and permissions
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('adminpassword'),
        'role' => 'admin',  // A specific role assigned
    ]);

    // Create a customer user with default settings
    User::create([
        'name' => 'Customer User',
        'email' => 'customer@example.com',
        'password' => bcrypt('customerpassword'),
        'role' => 'customer', // A different role for a normal user
    ]);
}
```
## Seeders Explained

In this section, we explain what each seeder does and how it helps populate the database with predefined data. Running these seeders ensures that you have the essential data for the application to function properly.

### 1. **LocationSeeder: Predefines Location Data (Provinces, Districts, and Corregimientos)**

This seeder creates location data for geographical areas, including provinces, districts, and corregimientos (sub-districts). It helps structure the database with important geographical information for the application.

- **Provinces**: Creates provinces like "Panamá" and "Chiriquí."
- **Districts**: Adds districts within each province (e.g., "Panamá" has districts like "San Felipe").
- **Corregimientos**: Creates corregimientos (sub-districts) within each district (e.g., "San Felipe" has corregimientos like "El Chorrillo").

#### What the `LocationSeeder` does:
```php
// LocationSeeder.php

public function run()
{
    $provinces = [
        'Panamá' => [
            'Panamá' => ['San Felipe', 'El Chorrillo', 'Santa Ana'],
            'San Miguelito' => ['Rufina Alfaro', 'José Domingo Espinar']
        ],
        'Chiriquí' => [
            'David' => ['David', 'Pedregal'],
            'Boquete' => ['Alto Boquete', 'Caldera']
        ]
    ];

    foreach ($provinces as $provinceName => $districts) {
        // Create the province
        $province = Province::create(['name' => $provinceName]);

        foreach ($districts as $districtName => $corregimientos) {
            // Create the district within the province
            $district = $province->districts()->create(['name' => $districtName]);

            foreach ($corregimientos as $corregimientoName) {
                // Create the corregimiento within the district
                $district->corregimientos()->create(['name' => $corregimientoName]);
            }
        }
    }
}
```

This seeder ensures that your database has predefined provinces, districts, and corregimientos, which is essential for the location-based functionality of the application.

**Run the seeder:**

```bash
php artisan db:seed --class=LocationSeeder
```
### 2. **DishesSeeder: Predefines Main Dishes for the Application**
This seeder adds predefined categories (e.g., Appetizers, Main Courses) and dishes to the application. It assigns random prices and placeholder images to the dishes for each category.

- **Categories**: Defines categories like "Appetizers," "Main Courses," etc.
- **Dishes**: Creates two dishes for each category with names, descriptions, random prices, and a placeholder image.

#### What the `DishesSeeder` does:
```php
// DishesSeeder.php

public function run()
{
    $adminUser = User::where('email', 'admintest@gmail.com')->first();
    $placeholderUrl = Storage::url('default/placeholder.png'); // Placeholder image

    // Define categories
    $categories = ['Appetizers', 'Main Courses', 'Desserts', 'Beverages'];

    foreach ($categories as $categoryName) {
        // Create a category
        $category = Category::create(['category_name' => $categoryName, 'user_id' => $adminUser->id]);

        // Define dishes for each category
        $dishes = [
            ['dish_name' => "{$categoryName} Dish 1", 'dish_description' => "A delicious example of {$categoryName}.", 'dish_price' => rand(10, 50)],
            ['dish_name' => "{$categoryName} Dish 2", 'dish_description' => "Another tasty {$categoryName} dish.", 'dish_price' => rand(10, 50)],
        ];

        // Create dishes
        foreach ($dishes as $dish) {
            Dishes::create([
                'dish_name' => $dish['dish_name'],
                'dish_description' => $dish['dish_description'],
                'dish_price' => $dish['dish_price'],
                'dish_photo' => $placeholderUrl, 
                'category_id' => $category->id,
                'user_id' => $adminUser->id,
            ]);
        }
    }
}
```

This seeder ensures that your application has predefined categories and dishes, which makes the application ready for testing and usage.

**Run the seeder:**
```bash
php artisan db:seed --class=DishesSeeder
```

Este resumen mantiene el propósito claro del `DishesSeeder` y lo explica de manera concisa, destacando cómo genera las categorías y platos con datos predeterminados.


## ✨ Future Features

We plan to enhance the platform with the following features:
1. **Advanced Analytics**: Generate in-depth reports on dish performance, supplier reliability, and user activity.
2. **Mobile Optimization**: A fully responsive design for mobile and tablet users.
3. **Localization**: Support for multiple languages to cater to a global audience.

---

## 📧 Contact

For any questions, suggestions, or support, feel free to contact us:
- **Email**: [support@restaurant-management.com](mailto:support@restaurant-management.com)
- **GitHub Issues**: [Submit Issues](https://github.com/your-username/restaurant-management-system/issues)
---

