@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center g-2">
            @includeIf('layouts.sidebar')
            <div class="col-md-10">
                
                <div class="row border-bottom mb-2 pb-2 mx-1">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        @includeIf('_success')
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('contract-types') }}" autocomplete="off" class="btn btn-sm btn-secondary"> Voltar para Lista</a>
                    </div>
                </div>
        
                <div class="row justify-content-start g-3">
                    <div class="col-md-8 ps-3">
                        <form action="{{ route('contract-types.update', $contractType->id) }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row g-2">                                
                                <div class="col-md-9">
                                    <label for="name" class="form-label mb-0">Tipo de vaga</label>
                                    <input name="name" class="form-control form-control-sm" value="{{ old('name', $contractType->name) }}" autocomplete="off" autofocus>
                                </div>
                                <div class="col-md-3">
                                    <label for="status" class="form-label mb-0">Status</label>
                                    <select name="status" class="form-select form-select-sm">
                                      <option value="choose" selected>...</option>
                                      <option value="ACTIVE" @if(old('status', $contractType->status) == 'ACTIVE') selected @endif>ATIVO</option>
                                      <option value="INACTIVE" @if(old('status', $contractType->status) == 'INACTIVE') selected @endif>INATIVO</option>
                                    </select>
                                  </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input name="check" class="form-check-input" type="checkbox" id="gridCheck" @if(old('check')) checked @endif>
                                        <label class="form-check-label" for="gridCheck">                                            
                                            <p class="pb-0 mb-0">
                                                Confirmo que dados estão todos corretamente preenchidos.
                                            </p>
        
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">                                
                                    <button type="submit" class="btn btn-primary btn-sm float-end">
                                        Atualizar Registro
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