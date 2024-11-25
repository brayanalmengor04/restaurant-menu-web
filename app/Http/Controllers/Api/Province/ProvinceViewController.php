<?php

namespace App\Http\Controllers\Api\Province;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinceViewController extends Controller
{
    public function view()
    {
        // Retornar la vista
        return view('pages.api.province.index');
    }  

    public function edit(Province $province)
    {
        return view('pages.api.province.edit', compact('province'));
    }
}