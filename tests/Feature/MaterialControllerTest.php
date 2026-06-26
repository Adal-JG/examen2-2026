<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente(): void
    {
        $categoria = Categoria::create([
            'nombre' => 'Papelería'
        ]);

        $response = $this->postJson('/api/materiales', [
            'unidadMedida' => 'Unidad',
            'descripcion' => 'Lápiz de grafito',
            'ubicacion' => 'Bodega principal',
            'categoria_id' => $categoria->idCategoria
        ]);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'message' => 'Material registrado correctamente'
        ]);

        $this->assertDatabaseHas('materials', [
            'unidadMedida' => 'Unidad',
            'descripcion' => 'Lápiz de grafito',
            'ubicacion' => 'Bodega principal',
            'categoria_id' => $categoria->idCategoria
        ]);
    }
}