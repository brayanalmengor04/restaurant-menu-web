<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dishes::class);
    }
}
