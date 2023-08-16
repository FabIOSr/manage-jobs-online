@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center g-2">
        @includeIf('layouts.sidebar')
        <div class="col-md-10">

            <div class="row border-bottom mb-2 pb-2 mx-1">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @includeIf('_success')                    
                </div>
                <div class="col-md-3 text-end">
                    <a wire:navigate href="{{ route('companies.create') }}" class="btn btn-sm btn-secondary"><i class="bi bi-plus"></i> Cadastrar Empresa</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="table" class="table table-sm">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Razão Social</th>
                            <th scope="col">Nº Solicitações</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($companies as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->document }}</td>
                            <td>{{ $item->social_name }}</td>
                            <td></td>
                            <td class="text-secondary">{{ $item->status }}</td>
                            <td>
                                <a href="#" type="button"
                                    class="btn btn-success btn-sm py-0" data-bs-toggle="modal"
                                    data-bs-target="#modalShow/id">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="12" fill="currentColor"
                                        class="bi bi-list-columns-reverse" viewBox="0 0 12 12">
                                        <path fill-rule="evenodd"
                                            d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('companies.edit', $item->code) }}"
                                    class="btn btn-sm btn-primary py-0 px-2">
                                    <i class="bi bi-pencil-square"></i> 
                                </a>
    
                                <form id="delete-{{ $item->code }}" action="{{ route('companies.delete', $item->code) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                                <button type="button"
                                    onclick="confirm('{{ $item->code }}')"
                                    class="btn btn-sm btn-danger py-0 px-2 d-inline"
                                    >
                                    <i class="bi bi-trash3"></i> 
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection