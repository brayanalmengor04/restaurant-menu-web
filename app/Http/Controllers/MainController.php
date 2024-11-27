<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Category;
use App\Models\DishRating;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Obtener los 5 mejores platos por calificación promedio
        $topRatings = Dishes::with(['category', 'user', 'ratings'])
            ->withCount('ratings')
            ->get()
            ->map(function ($dish) {
                $dish->average_rating = round($dish->ratings->avg('rating') ?? 0, 2);
                return $dish;
            })
            ->sortByDesc('average_rating')
            ->take(5);

        // Obtener todas las categorías con sus platos
        $categories = Category::with('dishes')->get();

        // Obtener todos los platos con sus calificaciones promedio
        $dishes = Dishes::with(['category', 'user', 'ratings'])->get()->map(function ($dish) {
            $dish->average_rating = round($dish->ratings->avg('rating') ?? 0, 2);
            return $dish;
        });

        $reviews = DishRating::with('user')
            ->latest() // Ordenar por las más recientes
            ->take(4) // Limitar a 4 reseñas
            ->get();
        $reviews = $reviews->unique('id')->values();
        return view('welcome', compact('topRatings', 'categories', 'dishes', 'reviews'));
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
        // Obtener los 10 platos con mejores calificaciones
        $topRatings = Dishes::with(['ratings', 'user', 'category'])
            ->withCount('ratings')
            ->get()
            ->map(function ($dish) {
                $dish->average_rating = round($dish->ratings->avg('rating') ?? 0, 2);
                return $dish;
            })
            ->sortByDesc('average_rating')
            ->take(10);

        return view('welcome', compact('topRatings'));
    }
}
