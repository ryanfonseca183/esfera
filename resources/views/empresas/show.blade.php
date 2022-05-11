@extends('layouts.app')

@section('title') {{$empresa->nome }} @parent @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb mb-5">
                <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Empresas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$empresa->nome}}</li>
            </ol>
        </nav>
        <div class="row mb-4 gx-3 align-items-center">
            <div class="col-auto">
                <div class="img-cont bg-white">
                    @isset($empresa->logotipo)
                        <img src="{{ asset('storage/' . $empresa->logotipo) }}" class="img-thumbnail">
                    @endisset
                </div>
            </div>
            <div class="col">
                <h1 class="h3">{{ $empresa->nome }}</h1>
                <a href="mailto:{{ $empresa->email }}">{{ $empresa->email }}</a> <br/>
                <a href="{{ $empresa->url }}">{{ $empresa->url }}</a>
            </div>
        </div>
        <hr class="mt-4 mb-5">
        <x-page-title title="Funcionários">
            <a href="{{ route('empresas.funcionarios.create', $empresa->id) }}">Novo <i class="bi bi-arrow-right ms-1"></i></a>
        </x-page-title>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresa->funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome_completo }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ $funcionario->telefone }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle px-1 fs-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('empresas.funcionarios.edit', ['empresa' => $empresa->id, 'funcionario' => $funcionario->id]) }}">Editar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete" data-reg-id="{{ $funcionario->id }}">Deletar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-modals.delete name="funcionario_id" :route="route('empresas.funcionarios.destroy', $empresa->id)"/>
@endsection