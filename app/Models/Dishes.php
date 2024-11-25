<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_name', 'dish_description', 'dish_price', 'dish_photo', 'category_id', 'user_id'
    ];
   protected $appends = ['average_rating'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
public function getAverageRatingAttribute()
{
    return $this->ratings->avg('rating') ?? 0; // Retorna 0 si no hay calificaciones
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Relación con Ratings
     public function ratings()
     {
         return $this->hasMany(DishRating::class, 'dish_id');
     }

    }