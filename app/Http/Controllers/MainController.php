<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use App\Models\Category;
use App\Models\DishRating;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
          // obtiene  los 5 mejores calificaciones con promedio y conteo
          $topRatings = Dishes::with(['category', 'user', 'ratings'])
          ->withCount('ratings') 
          ->get()
          ->map(function ($dish) {
              $dish->average_rating = round($dish->ratings->avg('rating') ?? 0, 2);
              return $dish;
          })
          ->sortByDesc('average_rating')
          ->take(5);

      // Obtener todas las categorías
      $categories = Category::with('dishes')->get();

      // Obtener todos los platos con categorías y usuarios
      $dishes = Dishes::with(['category', 'user', 'ratings'])->get()->map(function ($dish) {
          $dish->average_rating = round($dish->ratings->avg('rating') ?? 0, 2);
          return $dish;
      });
      return view('welcome', compact('topRatings', 'categories', 'dishes'));
}
         
public function addRating(Request $request)
{
    $validated = $request->validate([
        'dish_id' => 'required|exists:dishes,id',
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:500',
    ]);

    $rating = DishRating::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'dish_id' => $validated['dish_id']
        ],
        [
            'rating' => $validated['rating'],
            'review' => $validated['review']
        ]
    );

    // Recalcular el promedio de calificaciones del plato
    $dish = Dishes::with('ratings')->find($validated['dish_id']);
    $dish->average_rating = $dish->ratings->avg('rating');
    $dish->save();

    return response()->json([
        'success' => true,
        'message' => 'Rating added successfully.',
        'data' => $rating,
    ]);
}
public function getTopRatings()
{
    // Obtener los platos con su promedio de calificaciones
    $topRatings = Dishes::with(['ratings', 'user', 'category'])
        ->withCount('ratings') // Contar el número de ratings por plato
        ->get()
        ->map(function ($dish) {
            $averageRating = $dish->ratings->avg('rating'); // Promedio de calificaciones
            $dish->average_rating = round($averageRating, 2); // Redondear a 2 decimales
            return $dish;
        })
        ->sortByDesc('average_rating') // Ordenar por calificaciones promedio
        ->take(10); // Obtener los 10 platos con mejores calificaciones

    return view('welcome', compact('topRatings'));
}
}
