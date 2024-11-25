<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corregimiento extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['name', 'district_id'];

    // Relación con Distrito
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
