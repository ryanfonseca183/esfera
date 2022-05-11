@extends('layouts.app')

@section('title', 'Empresas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <x-page-title title="Empresas cadastradas">
                <a href="{{ route('empresas.create') }}" class="btn btn-primary">Novo</a>
            </x-page-title>
            <div class="table-responsive mb-3">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-info__img">
                                            @isset($empresa->logotipo)
                                            <img src="{{ asset('storage/' . $empresa->logotipo) }}" alt="User Img">
                                            @endif
                                        </div>
                                        <div class="user-info__basic">
                                            <h5 class="mb-0">{{ $empresa->nome }}</h5>
                                            <p class="text-muted mb-0">{{ $empresa->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 250px;">{{ $empresa->url }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle px-1 fs-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('empresas.edit', $empresa->id) }}">Editar</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete" data-reg-id="{{ $empresa->id }}">Deletar</a></li>
                                            <li><a class="dropdown-item" href="{{ route('empresas.show', $empresa->id) }}">Visualizar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4"><i class="bi bi-search me-3 fs-4"></i>Nenhum registro encontrado até o momento...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
    <x-modals.delete name="empresa_id" :route="route('empresas.destroy')" />
@endsection