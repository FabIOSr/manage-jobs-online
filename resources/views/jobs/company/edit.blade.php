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
                    <a wire:navigate href="{{ route('companies') }}" autocomplete="off" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i>  Voltar para Lista</a>
                </div>
            </div>
    
            <div class="row justify-content-start g-3">
                <div class="col-md-8 ps-3">
                    <form id="company" action="{{ route('companies.update', $company->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $company->id }}">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label for="document" class="form-labelmb-0">CNPJ</label>
                                <input name="document" type="text" class="document form-control form-control-sm" value="{{ old('document', $company->document) }}" autocomplete="off" autofocus>
                            </div>
                            <div class="col-md-8">
                                <label for="social_name" class="form-label mb-0">Razão Social</label>
                                <input name="social_name" type="text" class="form-control form-control-sm" value="{{ old('social_name', $company->social_name) }}" autocomplete="off">
                            </div>
                            <div class="col-9">
                                <label for="alias_name" class="form-label mb-0">Nome Fantasia</label>
                                <input name="alias_name" type="text" class="form-control form-control-sm" value="{{ old('alias_name', $company->alias_name) }}" autocomplete="off">
                            </div>
                            <div class="col-3">
                                <label for="zipcode" class="form-label mb-0">Cep</label>
                                <input name="zipcode" type="text" class="form-control form-control-sm" value="{{ old('zipcode', $company->zipcode) }}" autocomplete="off">
                            </div>
                            <div class="col-10">
                                <label for="street" class="form-label mb-0">Endereço</label>
                                <input name="street" type="text" class="form-control form-control-sm" id="street" value="{{ old('street', $company->street) }}" autocomplete="off">
                            </div>
                            <div class="col-2">
                                <label for="number" class="form-label mb-0">Número</label>
                                <input name="number" type="text" class="form-control form-control-sm" value="{{ old('number', $company->number) }}" autocomplete="off">
                            </div>
                            <div class="col-10">
                                <label for="complement" class="form-label mb-0">Complemento</label>
                                <input name="complement" type="text" class="form-control form-control-sm" value="{{ old('complement', $company->complement) }}" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="neighborhood" class="form-label mb-0">Bairro</label>
                                <input name="neighborhood" type="text" class="form-control form-control-sm" value="{{ old('neighborhood', $company->neighborhood) }}" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label mb-0">Cidade</label>
                                <input name="city" type="text" class="form-control form-control-sm" value="{{ old('city', $company->city) }}" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <label for="state" class="form-label mb-0">Estado</label>
                                <input name="state" type="text" class="form-control form-control-sm" value="{{ old('state', $company->state) }}" autocomplete="off">
                            </div>
                            <div class="col-md-8">
                                <label for="email" class="form-label mb-0">E-mail responsável</label>
                                <input name="email" type="email" class="form-control form-control-sm" value="{{ old('email', $company->email) }}" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="due_date" class="form-label mb-0">Melhor Dia Vencimento</label>
                                <select name="due_date" class="form-select form-select-sm">
                                  <option value="" selected>...</option>
                                  <option value="5" @if(old('due_date', $company->due_date)== '5') selected @endif>5</option>
                                  <option value="8" @if(old('due_date', $company->due_date)== '8') selected @endif>8</option>
                                  <option value="10" @if(old('due_date', $company->due_date)== '10') selected @endif>10</option>
                                  <option value="12" @if(old('due_date', $company->due_date)== '12') selected @endif>12</option>
                                  <option value="15" @if(old('due_date', $company->due_date)== '15') selected @endif>15</option>
                                  <option value="18" @if(old('due_date', $company->due_date)== '18') selected @endif>18</option>
                                  <option value="20" @if(old('due_date', $company->due_date)== '20') selected @endif>20</option>
                                </select>
                              </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input name="check" class="form-check-input" type="checkbox" id="gridCheck" @if(old('check')) checked @endif>
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
                                <button type="submit" class="btn btn-primary btn-sm float-end">
                                    <i class="bi bi-database-check"></i>  Atualizar Registro
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

@push('_js')
    <script type="module">
        $(document).ready(function(){
            $("input[name=zipcode]").blur(function(){
                var cep = $(this).val().replace(/[^0-9]/, '');
                if(cep.length == 8){
                    var url = 'https://viacep.com.br/ws/'+cep+'/json/';
                    $.ajax({
                            url: url,
                            dataType: 'jsonp',
                            crossDomain: true,
                            contentType: "application/json",
                            success : function(json){
                                if(json.logradouro){
                                    $("input[name=street]").val(json.logradouro);
                                    $("input[name=neighborhood]").val(json.bairro);
                                    $("input[name=city]").val(json.localidade);
                                    $("input[name=state]").val(json.uf);
                                    $('input[name="number"]').focus();
                                }else{
                                    toastr.error('CEP não encontrado');
                                }
                            },
                            error:function(xhr, status, error){
                                console.log(response);
                            }
                    });
                }                   
            });

            $('#company').submit(function(e){

                if($('input[name="document"]').val()=='' || $('input[name="document"]').val().length < 14){
                    $('input[name="document"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="social_name"]').val()==''){
                    $('input[name="social_name"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="alias_name"]').val()==''){
                    $('input[name="alias_name"]').trigger( "focus" ); 
                    return false
                }

                var zip = $('input[name="zipcode"]').val();
                zip.replace(/[^0-9]+/g,'');
                if($('input[name="zipcode"]').val()=='' || zip.length < 8){
                    $('input[name="zipcode"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="street"]').val()=='') {
                    $('input[name="street"]').trigger( "focus" ); 
                    return false
                }
                
                if($('input[name="number"]').val()=='') {
                    $('input[name="number"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="neighborhood"]').val()=='') {
                    $('input[name="neighborhood"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="city"]').val()=='') {
                    $('input[name="city"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="state"]').val()=='') {
                    $('input[name="state"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="email"]').val()=='') {
                    $('input[name="email"]').trigger( "focus" ); 
                    return false
                }

                if($('select[name="due_date"]').val()=='') {
                    $('select[name="due_date"]').trigger( "focus" ); 
                    return false
                }
            })
            
        });
    </script>
@endpush