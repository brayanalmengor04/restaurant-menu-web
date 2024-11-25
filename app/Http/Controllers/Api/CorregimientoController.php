<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corregimiento;
use App\Models\District;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CorregimientoController extends Controller
{

    public function index(): JsonResponse
    {
        $corregimientos = Corregimiento::with(['district.province'])->get();
        return response()->json($corregimientos, 200);
    }

    public function getById(int $id): JsonResponse
    {
        $corregimiento = Corregimiento::with(['district.province'])->find($id);
    
        if (!$corregimiento) {
            return response()->json(['message' => 'Corregimiento not found.'], 404);
        }
        return response()->json([
            'corregimiento' => $corregimiento,
            'district' => $corregimiento->district,
            'province' => $corregimiento->district->province
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:corregimientos,name',
        'district_id' => 'required|exists:districts,id',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    $corregimiento = Corregimiento::create($request->only('name', 'district_id'));

    // Redirigir con mensaje
    return redirect()->route('corregimientos.view') 
                     ->with('message', 'Corregimiento saved successfully.')
                     ->with('type', 'success');
}
public function update(Request $request, Corregimiento $corregimiento)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:corregimientos,name,' . $corregimiento->id,
        'district_id' => 'required|exists:districts,id',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Actualizar el corregimiento
    $corregimiento->update($request->only('name', 'district_id'));

    // Redirigir con mensaje
    return redirect()->route('corregimientos.view') 
                     ->with('message', 'Corregimiento updated successfully.')
                     ->with('type', 'success'); // El tipo de mensaje es "success"
}

    public function destroy(Corregimiento $corregimiento)
    {
        $corregimiento->delete();
    
        // Redirigir con mensaje
        return redirect()->route('corregimientos.view') 
                         ->with('message', 'Corregimiento deleted successfully.')
                         ->with('type', 'danger'); 
    }
    
    public function create()
    {
        $districts = District::all();
        return view('pages.api.corregimiento.create', compact('districts'));
    }
}
