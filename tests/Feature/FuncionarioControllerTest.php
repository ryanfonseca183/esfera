<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Funcionario;

class FuncionarioControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user, $empresa;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp() : void {
        parent::setUp();

        $this->seed();

        $this->user = User::first();

        $this->empresa = Empresa::factory()->create();
    }
    public function test_usuario_e_redirecionado_caso_nao_esteja_autenticado() {
        $response = $this->get(route('empresas.funcionarios.create', $this->empresa->id));

        $response->assertStatus(302);
    }

    public function test_pagina_criacao_funcionario_pode_ser_visualizada() {
        $response = $this->actingAs($this->user)->get(route('empresas.funcionarios.create', $this->empresa->id));

        $response->assertOk();
        $response->assertViewHas('empresa');
    }
    
    public function test_funcionario_pode_ser_criado() {
        $data = [
            'nome'  => 'Usuário',
            'sobrenome' => 'teste',
            'email'   => 'usuarioteste@gmail.com',
            'telefone' => '(37) 91111-1111',
        ];

        $response = $this->actingAS($this->user)->post(route('empresas.funcionarios.store', $this->empresa->id), $data);
        $data['empresa_id'] = $this->empresa->id;

        $this->assertDatabaseHas('funcionarios', $data);
        $response->assertStatus(302);
    }
    
    public function test_pagina_edicao_funcionario_pode_ser_visualizada() {
        $funcionario = Funcionario::factory()->for($this->empresa)->create();

        $response = $this->actingAs($this->user)->get(route('empresas.funcionarios.edit', ['empresa' => $this->empresa->id, 'funcionario' => $funcionario->id]));

        $response->assertOk();
        $response->assertViewHas(['empresa', 'funcionario']);
    }
    
    public function test_funcionario_pode_ser_atualizado() {
        $funcionario = Funcionario::factory()->for($this->empresa)->create();

        $data = [
            'nome'  => 'Usuário',
            'sobrenome' => 'teste',
            'email'   => 'usuarioteste@gmail.com',
            'telefone' => '(37) 91111-1111',
        ];

        $response = $this->actingAs($this->user)
                         ->put(route('empresas.funcionarios.update', ['empresa' => $this->empresa->id, 'funcionario' => $funcionario->id]), $data);

        $this->assertDatabaseHas('funcionarios', $data);
        $response->assertStatus(302);
    } 

    public function test_funcionario_pode_ser_deletada() {
        $funcionario = Funcionario::factory()->for($this->empresa)->create();

        $response = $this->actingAS($this->user)->delete(route('empresas.funcionarios.destroy', $this->empresa->id), ['funcionario_id' => $funcionario->id]);

        $this->assertModelMissing($funcionario);
        $response->assertStatus(302);
    }
}
