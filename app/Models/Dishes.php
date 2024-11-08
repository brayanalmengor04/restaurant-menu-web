<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'dish_name', 'dish_description', 'dish_price', 'dish_photo', 'category_id', 'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
