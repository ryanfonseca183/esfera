@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <x-page-title title="Empresas cadastradas">
                <a href="{{ route('empresas.create') }}" class="btn btn-primary">Novo</a>
            </x-page-title>
            @foreach($empresas as $empresa)
                <div class="card shadow-sm mb-3 border-0 ">
                    <div class="card-body px-5">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="img-cont">
                                    @isset($empresa->logotipo)
                                        <img src="{{ asset('storage/' . $empresa->logotipo) }}" class="img-thumbnail">
                                    @endisset
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="h5 mb-0">{{ $empresa->nome }}</h2>
                                <small class="card-text text-muted">
                                    <i class="bi bi-envelope me-2"></i> {{ $empresa->email }} <br/>
                                    <i class="bi bi-link me-2"></i> {{ $empresa->url }}
                                </small>
                            </div>
                            <div class="col-auto">
                                <a href="#" title="Deletar" data-bs-toggle="modal" data-bs-target="#delete" data-reg-id="{{ $empresa->id }}"><i class="bi bi-trash fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('empresas.show', $empresa->id) }}" class="me-2" title="Visualizar">Visualizar</a>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="me-2" title="Editar">Editar</a>
                    </div>
                </div>
            @endforeach
            @if($empresas->hasPages())
                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-muted">Mostrando {{ $empresas->count() }} de {{ $empresas->total() }} resultados</span>
                    <div>
                        {{$empresas->links()}}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-modals.delete name="empresa_id" route="empresas.destroy" />
@endsection

@