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
                        <a wire:navigate href="{{ route('companies') }}" class="btn btn-sm btn-secondary">+ Listar  Empresas</a>
                    </div>
                </div>

                <div class="row justify-content-start g-3">
                    <div class="col-md-8 ps-3">
                        <form method="POST" action="{{ route('companies.store') }}" autocomplete="off">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="document" class="form-labelmb-0">CNPJ</label>
                                    <input wire:model="document" name="document" type="text"
                                        class="document form-control form-control-sm" value="{{ old('document') }}"
                                        autocomplete="off" autofocus>
                                </div>
                                <div class="col-md-8">
                                    <label for="social_name" class="form-label mb-0">Razão Social</label>
                                    <input wire:model="social_name" name="social_name" type="text"
                                        class="form-control form-control-sm" value="{{ old('social_name') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-9">
                                    <label for="alias_name" class="form-label mb-0">Nome Fantasia</label>
                                    <input wire:model="alias_name" name="alias_name" type="text"
                                        class="form-control form-control-sm" value="{{ old('alias_name') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-3">
                                    <label for="zipcode" class="form-label mb-0">Cep</label>
                                    <input wire:model="zipcode" wire:keydown.enter="getZipcode" name="zipcode"
                                        type="text" class="form-control form-control-sm" value="{{ old('zipcode') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-10">
                                    <label for="street" class="form-label mb-0">Endereço</label>
                                    <input wire:model="street" name="street" type="text"
                                        class="form-control form-control-sm" id="street" value="{{ old('street') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-2">
                                    <label for="number" class="form-label mb-0">Número</label>
                                    <input wire:model="number" name="number" type="text"
                                        class="form-control form-control-sm" value="{{ old('number') }}" autocomplete="off">
                                </div>
                                <div class="col-10">
                                    <label for="complement" class="form-label mb-0">Complemento</label>
                                    <input wire:model="complement" name="complement" type="text"
                                        class="form-control form-control-sm" value="{{ old('complement') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="neighborhood" class="form-label mb-0">Bairro</label>
                                    <input wire:model="neighborhood" name="neighborhood" type="text"
                                        class="form-control form-control-sm" value="{{ old('neighborhood') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label mb-0">Cidade</label>
                                    <input wire:model="city" name="city" type="text"
                                        class="form-control form-control-sm" value="{{ old('city') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-2">
                                    <label for="state" class="form-label mb-0">Estado</label>
                                    <input wire:model="state" name="state" type="text"
                                        class="form-control form-control-sm" value="{{ old('state') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-9">
                                    <label for="email" class="form-label mb-0">E-mail responsável</label>
                                    <input wire:model="email" name="email" type="email"
                                        class="form-control form-control-sm" value="{{ old('email') }}"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="due_date" class="form-label mb-0">Data Vencimento</label>
                                    <select name="due_date" wire:model="due_date" class="form-select form-select-sm">
                                        <option value="" selected>...</option>
                                        <option value="5">5</option>
                                        <option value="8">8</option>
                                        <option value="10">10</option>
                                        <option value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="18">18</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input name="check" class="form-check-input" type="checkbox" id="gridCheck"
                                            @if (old('check')) checked @endif>
                                        <label class="form-check-label" for="gridCheck">
                                            <p class="pb-0 mb-0">
                                                Estou ciente que as informações acima são veridicas. E ao clicar em
                                                "<b>Salvar Registro</b>"
                                                pode me gerar uma cobrança em forma de boleto com o
                                                vencimento estipulado na data escolhida.
                                            </p>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm float-end"
                                        wire:loading.attr="disabled">
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Salvar Registro
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        @if ($errors->any())
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger fw-bold">Ops. Atenção aos seguintes campos!</h5>

                                    <ol>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
