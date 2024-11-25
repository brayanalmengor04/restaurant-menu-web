<?php

namespace App\Http\Controllers;

use App\Models\Subscriptions; // Usar el modelo correcto en singular
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscriptions::all(); // Ahora se usa 'Subscription'
        return view('pages.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    public function show(Subscriptions $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscription = Subscriptions::findOrFail($id); // Ahora se usa 'Subscriptions' correctamente
        return view('pages.subscriptions.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriptions $subscription)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscriptions,email,' . $subscription->id,
        ]);

        try {
            $subscription->update($validated);
            return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update subscription.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriptions $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
