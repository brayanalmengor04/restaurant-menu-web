<?php

namespace App\Http\Controllers\Api\Documentation;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 

class DocumentationController extends Controller
{
    public function index()
    {
        // URLs de los endpoints para en produccion cuando se suba an hostinger

        // $endpoints = [
        //     'districts' => 'https://grupo1.escueladeprogramacion.net/api/districts',
        //     'district_by_id' => 'https://grupo1.escueladeprogramacion.net/api/districts/1',
        //     'provinces' => 'https://grupo1.escueladeprogramacion.net/api/provinces',
        //     'province_by_id' => 'https://grupo1.escueladeprogramacion.net/api/provinces/1',
        //     'corregimientos' => 'https://grupo1.escueladeprogramacion.net/api/corregimientos',
        //     'corregimiento_by_id' => 'https://grupo1.escueladeprogramacion.net/api/corregimientos/1',
        // ]; 

        //  URLs de los endpoints en localhost para desarrollo local aqui solo para en desarrollo 
         $endpoints = [
            'districts' => 'http://localhost:8000/api/districts',
            'district_by_id' => 'http://localhost:8000/api/districts/1',
            'provinces' => 'http://localhost:8000/api/provinces',
            'province_by_id' => 'http://localhost:8000/api/provinces/1',
            'corregimientos' => 'http://localhost:8000/api/corregimientos',
            'corregimiento_by_id' => 'http://localhost:8000/api/corregimientos/1',
        ];

        return view('pages.api.documentation.index', ['endpoints' => $endpoints]);
    }
}
