@extends('layouts.app')

@section('title', 'Editar empresa')

@section('content')
    <x-page-title title="Editar empresa" route="empresas.index" class="fs-3" />
    <hr class="mt-3 mb-5">

    <x-section title="Dados gerais" description="Preencha as informações básicas da empresa. A logotipo deve ser do tipo jpg, jpeg, png ou webp com tamanho mínimo de 100x100">
        <form method="POST" action="{{ route('empresas.update', $empresa->id) }}" enctype="multipart/form-data" novalidate>
            @csrf 
            @method('PUT')
            <div class="row gy-3">
                <div class="col-sm-auto">
                    <x-controls.image label="Logotipo" name="logotipo" :src="($empresa->logotipo ? asset('storage/' . $empresa->logotipo) : '')"/>
                </div>
                <div class="col">
                    <x-controls.input name="nome" label="Nome" required maxlength="255" autofocus :value="$empresa->nome" />

                    <x-controls.input name="email" label="Email" type="email" maxlength="255" :value="$empresa->email" />

                    <x-controls.input name="url" label="Site" type="url" class="mb-4" :value="$empresa->url" placeholder="https://"/>

                    <button type="submit" class="btn btn-primary float-end">Salvar</button>
                </div>
            </div>
        </form>
    </x-section>
@endsection