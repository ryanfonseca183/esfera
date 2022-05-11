@extends('layouts.app')

@section('title') Editar funcionário | @parent @endsection

@section('content')
    <x-page-title class="fs-3">
        <x-slot name="title">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('empresas.show', $empresa->id) }}"><i class="bi bi-arrow-left me-3"></i>{{ $empresa->nome }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Editar funcionário</li>
                </ol>
            </nav>
        </x-slot>
    </x-page-title>
    <hr class="mb-5 mt-3">

    <x-section title="Dados gerais" description="Preencha as informações básicas do funcionário">
        <form method="POST" action="{{ route('empresas.funcionarios.update', ['empresa' => $empresa->id, 'funcionario' => $funcionario->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <x-controls.input name="nome" label="Nome" required maxlength="255" autofocus :value="$funcionario->nome"/>
                        </div>
                        <div class="col">
                            <x-controls.input name="sobrenome" label="Sobrenome" required maxlength="60" :value="$funcionario->sobrenome" />
                        </div>
                    </div>

                    <x-controls.input name="email" label="Email" type="email" maxlength="255" :value="$funcionario->email"/>

                    <x-controls.input name="telefone" label="Telefone" class="mb-4 mask-cell" :value="$funcionario->telefone" />

                    <button type="submit" class="btn btn-primary float-end">Salvar</button>
                </div>
            </div>
        </form>
    </x-section>
@endsection