@extends('layouts.app')

@section('content')
<<<<<<< HEAD
=======

>>>>>>> dcd68e7 (create company)
<div class="container">
    <div class="row justify-content-center g-2">
        @includeIf('layouts.sidebar')
        <div class="col-md-10">

            <div class="row border-bottom mb-2 pb-2 mx-1">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @includeIf('_success')                    
                </div>
<<<<<<< HEAD
                <div class="col-md-3 text-end pe-0">
                    <a wire:navigate href="{{ route('companies.create') }}" class="btn btn-sm btn-secondary">+ Inserir  Empresa</a>
=======
                <div class="col-md-3 text-end">
                    <a wire:navigate href="{{ route('companies.create') }}" class="btn btn-sm btn-secondary">+ Inserir nova empresa +</a>
>>>>>>> dcd68e7 (create company)
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
<<<<<<< HEAD
=======
                            <th scope="col">Opções</th>
>>>>>>> dcd68e7 (create company)
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
<<<<<<< HEAD
=======
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="12" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 12 12">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
    
                                <form id="delete-{{ $item->code }}" action="{{ route('companies', $item->code) }}" method="POST" class="d-none">@csrf</form>
                                <button type="button"
                                    onclick="confirm('{{ $item->code }}')"
                                    class="btn btn-sm btn-danger py-0 px-2 d-inline"
                                    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                        height="12" fill="currentColor"
                                        class="bi bi-trash3-fill" viewBox="0 0 12 12">
                                        <path fill-rule="evenodd"
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 12h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </td>
>>>>>>> dcd68e7 (create company)
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> dcd68e7 (create company)
@endsection