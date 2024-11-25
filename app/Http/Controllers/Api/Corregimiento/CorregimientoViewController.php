<?php
namespace App\Http\Controllers\Api\Corregimiento;

use App\Http\Controllers\Controller;
use App\Models\Corregimiento;
use App\Models\District;

class CorregimientoViewController extends Controller
{
    /**
     * Muestra la vista de índice de corregimientos.
     */
    public function view()
    {
        return view('pages.api.corregimiento.index');
    }

    /**
     * Muestra la vista de edición para un corregimiento específico.
     *
     * @param Corregimiento $corregimiento
     * @return \Illuminate\View\View
     */
    public function edit(Corregimiento $corregimiento)
    {
        // Obtén todos los distritos
        $districts = District::all();
        // Retorna la vista con los datos del corregimiento y distritos
        return view('pages.api.corregimiento.edit', compact('corregimiento', 'districts'));
    }
}
