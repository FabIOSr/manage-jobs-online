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
                    <a wire:navigate href="{{ route('vagas.solicitadas') }}" autocomplete="off" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i>  Voltar para Lista</a>
                </div>
            </div>
    
            <div class="row justify-content-start g-3">
                <div class="col-md-8 ps-3">
                    <form id="company" action="{{ route('companies.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row g-2">
                            <div class="col-12 text-center border-bottom mb-2 bg-secondary text-white">
                                DADOS DA SOLICITAÇÃO PROFISSIONAL A SER SUBSTITUÍDO
                            </div>
                            <div class="col-md-4">
                                <label for="reason_of_request" class="form-label mb-0">Motivo da Reposição</label>
                                <select name="reason_of_request" class="form-select form-select-sm">
                                  <option value="" selected>Selecione um motivo</option>
                                  <option value="SUBSTITUICAO POR DISPENSA" @if(old('reason_of_request')== 'SUBSTITUICAO POR DISPENSA') selected @endif>SD - SUBSTITUICAO POR DISPENSA</option>
                                  <option value="SUBSTITUICAO POR PROMOCAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PROMOCAO') selected @endif>SP - SUBSTITUICAO POR PROMOCAO</option>
                                  <option value="TERMINO DE CONTRATO" @if(old('reason_of_request')== 'TERMINO DE CONTRATO') selected @endif>TC - TERMINO DE CONTRATO</option>
                                  <option value="REPROVACAO NA EXPERIENCIA" @if(old('reason_of_request')== 'REPROVACAO NA EXPERIENCIA') selected @endif>TREXP - REPROVACAO NA EXPERIENCIA</option>
                                  <option value="SUBSTITUICAO POR PEDIDO DE DEMISSAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PEDIDO DE DEMISSAO') selected @endif>SPD - SUBSTITUICAO POR PEDIDO DE DEMISSAO</option>
                                  <option value="SUBSTITUICAO GESTANTE" @if(old('reason_of_request')== 'SUBSTITUICAO GESTANTE') selected @endif>SG - SUBSTITUICAO GESTANTE</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_of_request" class="form-label mb-0">Cargo / Função</label>
                                <select name="reason_of_request" class="form-select form-select-sm">
                                  <option value="" selected>Selecione um cargo</option>
                                  <option value="SUBSTITUICAO POR DISPENSA" @if(old('reason_of_request')== 'SUBSTITUICAO POR DISPENSA') selected @endif>SD - SUBSTITUICAO POR DISPENSA</option>
                                  <option value="SUBSTITUICAO POR PROMOCAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PROMOCAO') selected @endif>SP - SUBSTITUICAO POR PROMOCAO</option>
                                  <option value="TERMINO DE CONTRATO" @if(old('reason_of_request')== 'TERMINO DE CONTRATO') selected @endif>TC - TERMINO DE CONTRATO</option>
                                  <option value="REPROVACAO NA EXPERIENCIA" @if(old('reason_of_request')== 'REPROVACAO NA EXPERIENCIA') selected @endif>TREXP - REPROVACAO NA EXPERIENCIA</option>
                                  <option value="SUBSTITUICAO POR PEDIDO DE DEMISSAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PEDIDO DE DEMISSAO') selected @endif>SPD - SUBSTITUICAO POR PEDIDO DE DEMISSAO</option>
                                  <option value="SUBSTITUICAO GESTANTE" @if(old('reason_of_request')== 'SUBSTITUICAO GESTANTE') selected @endif>SG - SUBSTITUICAO GESTANTE</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_of_request" class="form-label mb-0">Departamento</label>
                                <select name="reason_of_request" class="form-select form-select-sm">
                                  <option value="" selected>Selecione um departamento</option>
                                  <option value="SUBSTITUICAO POR DISPENSA" @if(old('reason_of_request')== 'SUBSTITUICAO POR DISPENSA') selected @endif>SD - SUBSTITUICAO POR DISPENSA</option>
                                  <option value="SUBSTITUICAO POR PROMOCAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PROMOCAO') selected @endif>SP - SUBSTITUICAO POR PROMOCAO</option>
                                  <option value="TERMINO DE CONTRATO" @if(old('reason_of_request')== 'TERMINO DE CONTRATO') selected @endif>TC - TERMINO DE CONTRATO</option>
                                  <option value="REPROVACAO NA EXPERIENCIA" @if(old('reason_of_request')== 'REPROVACAO NA EXPERIENCIA') selected @endif>TREXP - REPROVACAO NA EXPERIENCIA</option>
                                  <option value="SUBSTITUICAO POR PEDIDO DE DEMISSAO" @if(old('reason_of_request')== 'SUBSTITUICAO POR PEDIDO DE DEMISSAO') selected @endif>SPD - SUBSTITUICAO POR PEDIDO DE DEMISSAO</option>
                                  <option value="SUBSTITUICAO GESTANTE" @if(old('reason_of_request')== 'SUBSTITUICAO GESTANTE') selected @endif>SG - SUBSTITUICAO GESTANTE</option>
                                </select>
                            </div>

                            
                            <div class="col-12">
                                <label for="employee_name" class="form-label mb-0">Nome funcionário</label>
                                <input name="employee_name" disabled type="text" class="form-control form-control-sm" value="{{ old('employee_name') }}" autocomplete="off">
                            </div>                            

                            <div class="col-md-3">
                                <label for="horario_de_trabalho" class="form-label mb-0">Horário de Trabalho</label>
                                <select name="horario_de_trabalho" class="form-select form-select-sm">
                                  <option value="" selected>---</option>
                                  <option value="07:00-19:00" @if(old('horario_de_trabalho')== '07:00-19:00') selected @endif>07:00-19:00</option>
                                  <option value="19:00-07:00" @if(old('horario_de_trabalho')== '19:00-07:00') selected @endif>19:00-07:00</option>
                                  <option value="07:00-17:00" @if(old('horario_de_trabalho')== '07:00-17:00') selected @endif>SQ 07:00-17:00 - S 07:00-16:00</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="plantao" class="form-label mb-0">Plantão</label>
                                <select name="plantao" class="form-select form-select-sm">
                                  <option value="" selected>---</option>
                                  <option value="DIURNO-IMPAR" @if(old('plantao')== 'DIURNO-IMPAR') selected @endif>DIURNO IMPAR</option>
                                  <option value="DIURNO-PAR" @if(old('plantao')== 'DIURNO-PAR') selected @endif>DIURNO PAR</option>
                                  <option value="NOTURNO-IMPAR" @if(old('plantao')== 'NOTURNO-IMPAR') selected @endif>NOTURNO IMPAR</option>
                                  <option value="NOTURNO-PAR" @if(old('plantao')== 'NOTURNO-PAR') selected @endif>NOTURNO PAR</option>
                                  <option value="DIURNO" @if(old('plantao')== 'DIURNO') selected @endif>DIURNO</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="carga_horaria" class="form-label mb-0">Carga Horária</label>
                                <select name="carga_horaria" class="form-select form-select-sm">
                                  <option value="" selected>---</option>
                                  <option value="36-180" @if(old('carga_horaria')== '36-180') selected @endif>36hs - 180hm</option>
                                  <option value="40-200" @if(old('carga_horaria')== '40-200') selected @endif>40hs - 200hm</option>
                                  <option value="44-220" @if(old('carga_horaria')== '44-220') selected @endif>44hs - 220hm</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="escala" class="form-label mb-0">Escala</label>
                                <select name="escala" class="form-select form-select-sm">
                                  <option value="" selected>---</option>
                                  <option value="5x2" @if(old('escala')== '5x2') selected @endif>5x2</option>
                                  <option value="6x1" @if(old('escala')== '6x1') selected @endif>6x1</option>
                                  <option value="12x36" @if(old('escala')== '12x36') selected @endif>12x36</option>
                                  <option value="12x60" @if(old('escala')== '12x60') selected @endif>12x60</option>
                                  <option value="24x48" @if(old('escala')== '24x48') selected @endif>24x48</option>
                                </select>
                            </div>

                            <div class="col-12 mt-3 text-center border-bottom mb-2 bg-secondary text-white">
                                PERFIL DA VAGA
                            </div>

                            <div class="col-12">
                                <label for="street" class="form-label mb-0 fst-italic">Descrição das atividades</label>
                                <textarea name="street" class="form-control form-control-sm" rows="3"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="street" class="form-label mb-0 fst-italic">Conhecimentos / Habilidades e Atitudes</label>
                                <textarea name="street" class="form-control form-control-sm" rows="3"></textarea>
                            </div>
                            <div class="col-2">
                                <label for="number" class="form-label mb-0">Número</label>
                                <input name="number" type="text" class="form-control form-control-sm" value="{{ old('number') }}" autocomplete="off">
                            </div>
                            <div class="col-10">
                                <label for="complement" class="form-label mb-0">Complemento</label>
                                <input name="complement" type="text" class="form-control form-control-sm" value="{{ old('complement') }}" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="neighborhood" class="form-label mb-0">Bairro</label>
                                <input name="neighborhood" type="text" class="form-control form-control-sm" value="{{ old('neighborhood') }}" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label mb-0">Cidade</label>
                                <input name="city" type="text" class="form-control form-control-sm" value="{{ old('city') }}" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <label for="state" class="form-label mb-0">Estado</label>
                                <input name="state" type="text" class="form-control form-control-sm" value="{{ old('state') }}" autocomplete="off">
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

@push('_js')
    <script type="module">
        $(document).ready(function(){

            $(document).on('change', 'select[name="reason_of_request"]', function(){

                let reasons = ['SUBSTITUICAO POR PROMOCAO','SUBSTITUICAO POR PEDIDO DE DEMISSAO', 'SUBSTITUICAO GESTANTE'];
                console.log(reasons.includes($(this).val()));
                if(reasons.includes($(this).val())){
                    $('input[name="employee_name"]').attr('disabled', false);
                }else{
                    $('input[name="employee_name"]').attr('disabled', true);
                }
            })
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