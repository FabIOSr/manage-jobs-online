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
                    <a wire:navigate href="{{ route('companies.create') }}" class="btn btn-sm btn-secondary">+ Inserir  Empresa</a>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection