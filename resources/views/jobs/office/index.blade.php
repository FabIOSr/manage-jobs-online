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
                    <div class="col-md-3 text-end pe-0">
                        <a href="{{ route('offices.create') }}" class="btn btn-sm btn-secondary">Registrar novo cargo +</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Cargo / Função</th>
                                <th scope="col">Status</th>
                                <th scope="col" width="120">Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offices as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('offices.edit', $item->code) }}"
                                            class="btn btn-sm btn-primary py-0 px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 12 12">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <form id="delete-{{ $item->code }}"
                                            action="{{ route('offices.delete', $item->code) }}" method="POST"
                                            class="d-none">@csrf</form>
                                        <button type="button" onclick="confirm('{{ $item->code }}')"
                                            class="btn btn-sm btn-danger py-0 px-2 d-inline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 12 12">
                                                <path fill-rule="evenodd"
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 12h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $offices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
