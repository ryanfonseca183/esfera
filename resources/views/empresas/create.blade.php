@extends('layouts.app')

@section('title', 'Nova empresa')

@section('content')
    <x-page-title title="Criar empresa" route="empresas.index" class="fs-3" />
    <hr class="mb-5 mt-3">

    <x-section title="Dados gerais" description="Preencha as informações básicas da empresa">
        <form method="POST" action="{{ route('empresas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row gy-3">
                <div class="col-sm-auto">
                    <x-controls.image label="Logotipo" name="logotipo" />
                </div>
                <div class="col">
                    <x-controls.input name="nome" label="Nome" required maxlength="255" autofocus />

                    <x-controls.input name="email" label="Email" type="email" maxlength="255" />

                    <x-controls.input name="url" label="Site" type="url" class="mb-4" />

                    <button type="submit" class="btn btn-primary float-end">Salvar</button>
                </div>
            </div>
        </form>
    </x-section>
@endsection