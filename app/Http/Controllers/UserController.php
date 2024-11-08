<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
// Request---------- 
use App\Http\Requests\UserRequest;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        // Hacer un archivo aparte para enviar las reglas
      
        // Procesar la carga de imágenes (background_image y company_logo)
        $backgroundImagePath = $request->file('background_image') 
            ? $request->file('background_image')->store('background_images', 'public') 
            : null;
        $companyLogoPath = $request->file('company_logo') 
            ? $request->file('company_logo')->store('company_logos', 'public') 
            : null;

        // Crear un nuevo usuario
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_name' => $request->contact_name,
            'restaurant_name' => $request->restaurant_name ?? '', // Si es opcional, poner valor predeterminado
            'background_image' => $backgroundImagePath,
            'company_logo' => $companyLogoPath,
            'user_type' => $request->user_type,
            'status' => $request->status,
        ]);

        // Redirigir a la página welcome con un mensaje de éxito
    return redirect()->route('welcome')->with('success', 'User registered successfully');

    }
}
