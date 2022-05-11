<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateEmpresaRequest;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas =  Empresa::paginate(10);

        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmpresaRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('logotipo')) {
            $validated['logotipo'] = $request->logotipo->store('logos', 'public');
        }
        Empresa::create($validated);

        session()->flash('success', 'Empresa criada com sucesso!');

        return redirect()->route('empresas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEmpresaRequest $request, Empresa $empresa)
    {
        $validated = $request->validated();

        if($request->hasFile('logotipo')) {
            //Deleta a imagem antiga do storage
            Storage::disk('public')->delete($empresa->logotipo);

            //Armazena a nova imagem
            $validated['logotipo'] = $request->logotipo->store('logos', 'public');
        }
        $empresa->update($validated);

        session()->flash('success', 'Empresa editada com sucesso!');

        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empresa = Empresa::findOrFail($request->empresa_id);

        try {
            DB::beginTransaction();

            //Deleta os funcionários da empresa
            $empresa->funcionarios()->delete();
    
            //Deleta o logotipo do storage
            Storage::disk('public')->delete($empresa->logotipo);
    
            //Deleta a empresa
            $empresa->delete();

            DB::commit();

            session()->flash('success', 'Empresa deletada com sucesso!');

        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('error', 'Não foi possível deletar a empresa. Por favor, tente novamente!');
        }
        return redirect()->route('empresas.index');
    }
}
