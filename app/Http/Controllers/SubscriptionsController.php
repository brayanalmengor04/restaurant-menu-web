<?php

namespace App\Http\Controllers;

use App\Models\subscriptions;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validar el correo electrónico
     // Validar el correo electrónico
     $validated = $request->validate([
        'email' => 'required|email',
    ]);

    // Verificar si el correo ya está registrado
    if (Subscriptions::where('email', $validated['email'])->exists()) {
        return redirect()->back()->with('error', 'Este correo ya está registrado.');
    }

    try {
        // Crear una nueva suscripción
        Subscriptions::create(['email' => $validated['email']]);
        return redirect()->back()->with('success', '¡Te has suscrito correctamente!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'No se pudo completar la suscripción.');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subscriptions $subscriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subscriptions $subscriptions)
    {
        //
    }
}
