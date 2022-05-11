@extends('layouts.app')

@section('title', 'Novo funcionário')

@section('content')

    <x-page-title class="fs-3">
        <x-slot name="title">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('empresas.show', $empresa->id) }}"><i class="bi bi-arrow-left me-3"></i>{{ $empresa->nome }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Novo funcionário</li>
                </ol>
            </nav>
        </x-slot>
    </x-page-title>
    <hr class="mb-5 mt-3">

    <x-section title="Dados gerais" description="Preencha as informações básicas do funcionário">
        <form method="POST" action="{{ route('empresas.funcionarios.store', $empresa->id) }}" novalidate>
            @csrf
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <x-controls.input name="nome" label="Nome" required maxlength="255" autofocus />
                        </div>
                        <div class="col">
                            <x-controls.input name="sobrenome" label="Sobrenome" required maxlength="60"  />
                        </div>
                    </div>

                    <x-controls.input name="email" label="Email" type="email" maxlength="255" />

                    <x-controls.input name="telefone" label="Telefone" class="mb-4 mask-cell" />

                    <button type="submit" class="btn btn-primary float-end">Salvar</button>
                </div>
            </div>
        </form>
    </x-section>
@endsection