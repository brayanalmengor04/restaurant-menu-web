<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function index(): JsonResponse
    {
        $districts = District::with('province')->get();
        return response()->json($districts, 200);
    }


public function getDistrictById(int $id): JsonResponse
{
    $district = District::with('province')->find($id); // Incluye la provincia relacionada

    if (!$district) {
        return response()->json([
            'message' => 'District not found.',
        ], 404);
    }

    return response()->json($district, 200);
}
    public function show(int $id): JsonResponse
    {
        $district = District::with('province')->find($id);

        if (!$district) {
            return response()->json(['message' => 'District not found.'], 404);
        }

        return response()->json($district, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:districts,name',
            'province_id' => 'required|exists:provinces,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('districts.create')
                ->withErrors($validator)
                ->withInput();
        }

        District::create($request->only('name', 'province_id'));

        return redirect()
            ->route('districts.view')
            ->with('success', 'District successfully added!');
    }

    public function update(Request $request, District $district)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:districts,name,' . $district->id,
            'province_id' => 'required|exists:provinces,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('districts.view')
                ->with('message', 'Failed to update the district.')
                ->withErrors($validator);
        }

        $district->update($request->only('name', 'province_id'));

        return redirect()->route('districts.view')->with('message', 'District updated successfully!');
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('districts.view')->with('message', 'District deleted successfully!');
    }
    public function create()
    {
        $provinces = Province::all();
        return view('pages.api.district.create', compact('provinces'));
    }
    
}
