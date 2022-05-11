<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Requests\StoreUpdateFuncionarioRequest;

class FuncionarioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa)
    {
        return view('empresas.funcionarios.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFuncionarioRequest $request, Empresa $empresa)
    {
        $empresa->funcionarios()->create($request->validated());

        session()->flash('success', 'Funcionário criado com sucesso!');

        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa, Funcionario $funcionario)
    {
        return view('empresas.funcionarios.edit', compact('empresa', 'funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFuncionarioRequest $request, Empresa $empresa, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());

        session()->flash('success', 'Funcionário editado com sucesso!');

        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Empresa $empresa)
    {
        $empresa->funcionarios()->where('id', $request->funcionario_id)->delete();

        session()->flash('success', 'Funcionário deletado com sucesso!');

        return redirect()->route('empresas.show', $empresa->id);
    }
}
