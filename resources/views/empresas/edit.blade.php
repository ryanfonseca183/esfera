@extends('layouts.app')

@section('title') Editar empresa | @parent @endsection

@section('content')
    <x-page-title title="Editar empresa" route="empresas.index" />

    <x-section title="Dados gerais" description="Preencha as informações básicas da empresa">
        <form method="POST" action="{{ route('empresas.update', $empresa->id) }}" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            <div class="row">
                <div class="col-auto">
                    <x-controls.image label="Logotipo" name="logotipo" :src="($empresa->logotipo ? asset('storage/' . $empresa->logotipo) : '')"/>
                </div>
                <div class="col">
                    <x-controls.input name="nome" label="Nome" required maxlength="255" autofocus :value="$empresa->nome" />

                    <x-controls.input name="email" label="Email" type="email" maxlength="255" :value="$empresa->email" />

                    <x-controls.input name="url" label="Site" type="url" class="mb-4" :value="$empresa->url" />

                    <button type="submit" class="btn btn-primary float-end">Salvar</button>
                </div>
            </div>
        </form>
    </x-section>
@endsection