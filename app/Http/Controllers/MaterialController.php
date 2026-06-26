<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,idCategoria',
        ]);

        $material = Material::create($data);

        return response()->json([
            'message' => 'Material registrado correctamente',
            'material' => $material->load('categoria')
        ], 201);
    }
    public function update(Request $request, $codigo)
{
    $material = Material::findOrFail($codigo);

    $data = $request->validate([
        'unidadMedida' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias,idCategoria',
    ]);

    $material->update($data);

    return response()->json([
        'message' => 'Material actualizado correctamente',
        'material' => $material->load('categoria')
    ]);
}
public function index()
{
    $materiales = Material::with('categoria')->get();

    return response()->json([
        'message' => 'Lista de materiales obtenida correctamente',
        'materiales' => $materiales
    ]);
}
}