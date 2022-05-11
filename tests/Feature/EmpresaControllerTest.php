<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Empresa;

class EmpresaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp() : void {
        parent::setUp();

        $this->seed();

        $this->user = User::first();
    }
    public function test_usuario_e_redirecionado_caso_nao_esteja_autenticado() {
        $response = $this->get(route('empresas.create'));

        $response->assertStatus(302);
    }
    public function test_pagina_criacao_empresa_pode_ser_visualizada() {
        $response = $this->actingAs($this->user)->get(route('empresas.create'));

        $response->assertOk();
    }
    public function test_empresa_pode_ser_criada() {
        $data = [
            'nome'  => 'Testes',
            'email' => 'suporte@empresa1.com',
            'url'   => 'https://www.empresa1.com.br',
        ];

        $response = $this->actingAS($this->user)->post(route('empresas.store'), $data);

        $this->assertDatabaseHas('empresas', $data);

        $response->assertStatus(302);
    }
    
    
    public function test_pagina_edicao_empresa_pode_ser_visualizada() {
        $empresa = Empresa::factory()->create();

        $response = $this->actingAs($this->user)->get(route('empresas.edit', $empresa->id));

        $response->assertOk();
        $response->assertViewHas(['empresa']);
    }
    
    public function test_empresa_pode_ser_atualizada() {
        $empresa = Empresa::factory()->create();

        $data = [
            'nome'  => 'Testes',
            'email' => 'suporte@empresa1.com',
            'url'   => 'https://www.empresa1.com.br',
        ];

        $response = $this->actingAs($this->user)->put(route('empresas.update', $empresa->id), $data);

        $this->assertDatabaseHas('empresas', $data);
        $response->assertStatus(302);
    }

    public function test_pagina_detalhes_empresa_pode_ser_visualizada() {
        $empresa = Empresa::factory()->create();

        $response = $this->actingAs($this->user)->get(route('empresas.show', $empresa->id));

        $response->assertOk();
        $response->assertViewHas(['empresa', 'funcionarios']);
    }

    public function test_empresa_pode_ser_deletada() {
        $empresa = Empresa::factory()->create();

        $response = $this->actingAS($this->user)->delete(route('empresas.destroy'), ['empresa_id' => $empresa->id]);

        $this->assertModelMissing($empresa);
        $response->assertStatus(302);
    }
}
