<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use App\Models\User; // Importar el modelo User
use App\Models\Category; // Importar el modelo Category
use Illuminate\Http\Request;

class DishesController extends Controller
{

    public function index()
    {
        // Aquí puedes listar los platos si lo deseas
        $dishes = Dishes::all();
        return view('pages.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios y categorías para mostrarlos en el formulario
        $users = User::all();
        $categories = Category::all(); // Obtener las categorías

        // Retornar la vista con los datos
        return view('pages.dishes.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'dish_name' => 'required|string|max:255',
            'dish_description' => 'nullable|string',
            'dish_price' => 'required|numeric|min:0',
            'dish_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Subir la foto si se proporciona
        $photoPath = null;
        if ($request->hasFile('dish_photo')) {
            $photoPath = $request->file('dish_photo')->store('dish_photos', 'public');
        }

        // Crear el plato en la base de datos
        Dishes::create([
            'user_id' => $validated['user_id'],
            'dish_name' => $validated['dish_name'],
            'dish_description' => $validated['dish_description'],
            'dish_price' => $validated['dish_price'],
            'dish_photo' => $photoPath,
            'category_id' => $validated['category_id'],
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('dish.create')->with('success', 'Dish created successfully!');
    }

    /**
     * Display the specified resource.
     */

    public function show(Dishes $dish)
    {
        return view('pages.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dishes $dish)
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.dishes.edit', compact('dish', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dishes $dish)
    {
        // Validar los datos del formulario para actualizar
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'dish_name' => 'required|string|max:255',
            'dish_description' => 'nullable|string',
            'dish_price' => 'required|numeric|min:0',
            'dish_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Actualizar la foto si se proporciona
        if ($request->hasFile('dish_photo')) {
            $photoPath = $request->file('dish_photo')->store('dish_photos', 'public');
            $dish->dish_photo = $photoPath;
        }
    
        // Actualizar los datos del plato
        $dish->update([
            'user_id' => $validated['user_id'],
            'dish_name' => $validated['dish_name'],
            'dish_description' => $validated['dish_description'],
            'dish_price' => $validated['dish_price'],
            'category_id' => $validated['category_id'],
        ]);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('dish.index')->with('success', 'Dish updated successfully!');
    }    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dishes $dish)
    {
        // Eliminar el plato
        $dish->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('dish.index')->with('success', 'Dish deleted successfully!');
    }
}
