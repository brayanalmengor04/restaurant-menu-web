<?php
namespace App\Http\Controllers\Api\District;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;

class DistrictViewController extends Controller
{
    public function view()
    {
        return view('pages.api.district.index');
    }

    
    public function edit(District $district)
    {
        // Obtén todas las provincias
        $provinces = Province::all();
        // Retorna la vista con los datos del distrito y provincias
        return view('pages.api.district.edit', compact('district', 'provinces'));
    }
}
