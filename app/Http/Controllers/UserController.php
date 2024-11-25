<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Mail\ActivationEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('template.user.index', compact('users'));
    }

    public function create()
    {
        // Formulario de creación de usuario
        return view('template.user.create');
    }
    public function store(UserRequest $request)
    {
        $activationToken = \Str::random(64);
    
        $backgroundImagePath = $request->file('background_image') 
            ? $request->file('background_image')->store('background_images', 'public') 
            : null;
        $companyLogoPath = $request->file('company_logo') 
            ? $request->file('company_logo')->store('company_logos', 'public') 
            : null;
    
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_name' => $request->contact_name,
            'restaurant_name' => $request->restaurant_name ?? '',
            'background_image' => $backgroundImagePath,
            'company_logo' => $companyLogoPath,
            'user_type' => $request->user_type,
            'status' => 0, // Inactivo hasta que confirme el correo
            'activation_token' => $activationToken,
        ]);
        $activationUrl = route('user.activate', ['token' => $activationToken]);
        Mail::to($user->email)->send(new ActivationEmail($activationUrl));
    
        return redirect()->route('welcome')->with([
            'success' => 'User registered successfully.',
            'confirmation_message' => 'Please check your email to activate your account.'
        ]);
    }
    
    public function show(User $user)
    {
        // Mostrar detalles de un usuario específico
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('template.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        // Actualizar el usuario
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'contact_name' => $request->contact_name,
            'restaurant_name' => $request->restaurant_name ?? '',
            'user_type' => $request->user_type,
            'status' => $request->status,
        ]);

        // Actualizar la imagen de fondo si se proporciona
        if ($request->hasFile('background_image')) {
            if ($user->background_image) {
                Storage::disk('public')->delete($user->background_image); // Elimina la imagen anterior si existe
            }
            $user->background_image = $request->file('background_image')->store('background_images', 'public');
        }
        
        if ($request->hasFile('company_logo')) {
            if ($user->company_logo) {
                Storage::disk('public')->delete($user->company_logo); // Elimina la imagen anterior si existe
            }
            $user->company_logo = $request->file('company_logo')->store('company_logos', 'public');
        }
        

        $user->save();

        return redirect()->route('user.edit', $user)->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Eliminar usuario y sus imágenes relacionadas
        if ($user->background_image) {
            Storage::disk('public')->delete($user->background_image);
        }
        if ($user->company_logo) {
            Storage::disk('public')->delete($user->company_logo);
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    public function loginview()
    {
        return view('login');
    }

    public function login(Request $request)
    { 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            session(['user_type' => Auth::user()->user_type]);
            return redirect()->route('welcome');
        }
        return back()->with('message', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('welcome')->with('success', 'You have logged out successfully!');
    }
    public function activate($token)
{
    $user = User::where('activation_token', $token)->first();

    if (!$user) {
        return redirect()->route('welcome')->with('error', 'Invalid activation token.');
    }

    $user->update([
        'status' => 1,
        'activation_token' => null,
    ]);

    return redirect()->route('welcome')->with('success', 'Account activated successfully.');
}
}
