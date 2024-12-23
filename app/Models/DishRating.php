<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class DishRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dish_id',
        'rating',
        'review',
    ];
    public function dish()
    {
        return $this->belongsTo(Dishes::class, 'dish_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
