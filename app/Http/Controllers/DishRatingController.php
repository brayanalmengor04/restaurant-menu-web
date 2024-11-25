<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DishRating;

class DishRatingController extends Controller
{
    public function rate(Request $request)
    {
        $validated = $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        DishRating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'dish_id' => $validated['dish_id'],
            ],
            [
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]
        );

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }
}