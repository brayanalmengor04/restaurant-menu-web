<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        // Retrieve categories with related user information
        $categories = Category::with('user')->get();
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios
        $users = User::all();
        // Pasar los usuarios a la vista
        return view("pages.category.create", compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Verifica que el usuario exista en la tabla 'users'
            'category_name' => 'required|string|max:255', // Verifica que el nombre de la categoría sea una cadena de texto
        ]);

        Category::create([
            'user_id' => $validatedData['user_id'],
            'category_name' => $validatedData['category_name'],
        ]);
    
        return redirect()->route('category.index')->with('success', 'Category registered successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Obtener todos los usuarios para poder asignarlos en el formulario de edición
        $users = User::all();
        return view('pages.category.edit', compact('category', 'users'));
    } 
    public function show(category $category)
    {
   
     return view('pages.category.show', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validar los datos
         // Valida y actualiza los datos
    $request->validate([
        'category_name' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
    ]);

    $category->update([
        'category_name' => $request->category_name,
        'user_id' => $request->user_id,
    ]);

       // Redirige de vuelta a la página de edición con un mensaje de éxito
    return redirect()->route('category.edit', $category->id)->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Eliminar la categoría
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
