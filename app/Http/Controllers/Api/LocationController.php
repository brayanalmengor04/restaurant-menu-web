<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{

    /**
     * GET /api/provinces - Obtener todas las provincias.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $provinces = Province::all();
        return response()->json($provinces, 200); 
        // envialo a la vista pages.api.provice.index
    }

    /**
     * GET /api/provinces/{id} - Obtener una provincia específica.
     *
     * @param Province $province
     * @return JsonResponse
     */
    public function show(Province $province): JsonResponse
    {
        return response()->json($province, 200); 

    }
    /**
 * GET /api/provinces/{id} - Obtener una provincia específica.
 *
 * @param int $id
 * @return JsonResponse
 */
public function getProvinceById(int $id): JsonResponse
{
    $province = Province::find($id);

    if (!$province) {
        return response()->json([
            'message' => 'Province not found.',
        ], 404);
    }

    return response()->json($province, 200);
}

    /**
     * POST /api/provinces - Crear una nueva provincia.
     *
     * @param Request $request
     * @return JsonResponse
     */
  /**
 * POST /provinces/store - Guardar una nueva provincia y redirigir a la vista de creación.
 *
 * @param Request $request
 * @return mixed
 */
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:provinces,name',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->route('provinces.create')
            ->withErrors($validator)
            ->withInput(); // Mantén los datos ingresados para no perderlos
    }
    Province::create($request->only('name'));
    return redirect()
        ->route('provinces.create')
        ->with('success', 'Province successfully added!');
}


    public function create()
{
    return view('pages.api.province.create');
}

    /**
     * PUT /api/provinces/{id} - Actualizar una provincia existente.
     *
     * @param Request $request
     * @param Province $province
     * @return JsonResponse
     */
    public function update(Request $request, Province $province)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:provinces,name,' . $province->id,
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('provinces.view')
                ->with([
                    'message' => 'Failed to update the province. Please check the errors.',
                    'type' => 'danger',
                ])
                ->withErrors($validator);
        }
    
        $province->update($request->only('name'));
    
        return redirect()->route('provinces.view')->with([
            'message' => 'Province updated successfully!',
            'type' => 'success',
        ]);
    }
    
    /**
     * DELETE /api/provinces/{id} - Eliminar una provincia existente.
     *
     * @param Province $province
     */
    public function destroy(Province $province)
    {
        $province->delete();
    
        return redirect()->route('provinces.view')->with([
            'message' => 'Province deleted successfully!',
            'type' => 'success',
        ]);
    }
    
}
