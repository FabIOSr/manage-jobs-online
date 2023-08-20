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
                        <a href="{{ route('vagas.solicitadas') }}" autocomplete="off" class="btn btn-sm btn-secondary"><i
                                class="bi bi-arrow-left"></i> Voltar para Lista</a>
                    </div>
                </div>

                <div class="row justify-content-start g-3">
                    <div class="col-md-8 ps-3">
                        <form id="company" action="{{ route('vagas.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row g-2">
                                <div class="col-12 text-center border-bottom mb-2 bg-secondary text-white">
                                    DADOS DA SOLICITAÇÃO PARA O PROFISSIONAL
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="reason_request" class="form-label mb-0">Motivo da Requisição</label>
                                    <select name="reason_request" class="form-select form-select-sm">
                                        <option value="" selected>Selecione um motivo</option>
                                        <option value="SUBSTITUICAO POR DISPENSA"
                                            @if (old('reason_request') == 'SUBSTITUICAO POR DISPENSA') selected @endif>SD - SUBSTITUICAO POR DISPENSA
                                        </option>
                                        <option value="SUBSTITUICAO POR PROMOCAO"
                                            @if (old('reason_request') == 'SUBSTITUICAO POR PROMOCAO') selected @endif>SP - SUBSTITUICAO POR PROMOCAO
                                        </option>
                                        <option value="TERMINO DE CONTRATO"
                                            @if (old('reason_request') == 'TERMINO DE CONTRATO') selected @endif>TC - TERMINO DE CONTRATO
                                        </option>
                                        <option value="REPROVACAO NA EXPERIENCIA"
                                            @if (old('reason_request') == 'REPROVACAO NA EXPERIENCIA') selected @endif>TREXP - REPROVACAO NA
                                            EXPERIENCIA</option>
                                        <option value="SUBSTITUICAO POR PEDIDO DE DEMISSAO"
                                            @if (old('reason_request') == 'SUBSTITUICAO POR PEDIDO DE DEMISSAO') selected @endif>SPD - SUBSTITUICAO POR PEDIDO
                                            DE DEMISSAO</option>
                                        <option value="SUBSTITUICAO GESTANTE"
                                            @if (old('reason_request') == 'SUBSTITUICAO GESTANTE') selected @endif>SG - SUBSTITUICAO GESTANTE
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="office" class="form-label mb-0">Cargo / Função</label>
                                    <select name="office" class="form-select form-select-sm">
                                        <option value="" selected>Selecione um cargo</option>
                                        @forelse ($offices as $office)
                                            <option 
                                                value="{{ $office->id }}"
                                                @selected(old('office') == $office->id)
                                            >
                                                {{ mb_strtoupper($office->name) }}
                                            </option>
                                        @empty
                                            <option value="">Nã há cargos cadastrados</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="department" class="form-label mb-0">Departamento</label>
                                    <select name="department" class="form-select form-select-sm">
                                        <option value="" selected>Selecione um departamento</option>
                                        @forelse ($departments as $dep)
                                            <option 
                                                value="{{ $dep->id }}"
                                                @if (old('department') == $dep->id) selected @endif
                                            >
                                                {{ mb_strtoupper($dep->name) }}
                                            </option>
                                        @empty
                                            <option value="">Nã há departamentos cadastrados</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12">
                                    <label for="employee_name" class="form-label mb-0">Nome funcionário</label>
                                    <input name="employee_name" disabled type="text" class="form-control form-control-sm"
                                        value="{{ old('employee_name') }}" autocomplete="off">
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label for="workschedule" class="form-label mb-0">Horário de Trabalho</label>
                                    <select name="workschedule" class="form-select form-select-sm">
                                        <option value="" selected>---</option>
                                        <option value="07:00-19:00" @if (old('workschedule') == '07:00-19:00') selected @endif>
                                            07:00-19:00</option>
                                        <option value="19:00-07:00" @if (old('workschedule') == '19:00-07:00') selected @endif>
                                            19:00-07:00</option>
                                        <option value="07:00-17:00" @if (old('workschedule') == '07:00-17:00') selected @endif>SQ
                                            07:00-17:00 - S 07:00-16:00</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="duty" class="form-label mb-0">Plantão</label>
                                    <select name="duty" class="form-select form-select-sm">
                                        <option value="" selected>---</option>
                                        <option value="DIURNO-IMPAR" @if (old('duty') == 'DIURNO-IMPAR') selected @endif>
                                            DIURNO IMPAR</option>
                                        <option value="DIURNO-PAR" @if (old('duty') == 'DIURNO-PAR') selected @endif>
                                            DIURNO PAR</option>
                                        <option value="NOTURNO-IMPAR" @if (old('duty') == 'NOTURNO-IMPAR') selected @endif>
                                            NOTURNO IMPAR</option>
                                        <option value="NOTURNO-PAR" @if (old('duty') == 'NOTURNO-PAR') selected @endif>
                                            NOTURNO PAR</option>
                                        <option value="DIURNO" @if (old('duty') == 'DIURNO') selected @endif>DIURNO
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="workload" class="form-label mb-0">Carga Horária</label>
                                    <select name="workload" class="form-select form-select-sm">
                                        <option value="" selected>---</option>
                                        <option value="36-180" @if (old('workload') == '36-180') selected @endif>36hs -
                                            180hm</option>
                                        <option value="40-200" @if (old('workload') == '40-200') selected @endif>40hs -
                                            200hm</option>
                                        <option value="44-220" @if (old('workload') == '44-220') selected @endif>44hs -
                                            220hm</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="scale" class="form-label mb-0">scale</label>
                                    <select name="scale" class="form-select form-select-sm">
                                        <option value="" selected>---</option>
                                        <option value="5x2" @if (old('scale') == '5x2') selected @endif>5x2
                                        </option>
                                        <option value="6x1" @if (old('scale') == '6x1') selected @endif>6x1
                                        </option>
                                        <option value="12x36" @if (old('scale') == '12x36') selected @endif>12x36
                                        </option>
                                        <option value="12x60" @if (old('scale') == '12x60') selected @endif>12x60
                                        </option>
                                        <option value="24x48" @if (old('scale') == '24x48') selected @endif>24x48
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12 mt-3 text-center border-bottom mb-2 bg-secondary text-white">
                                    PERFIL DA VAGA
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12">
                                    <label for="description_activities" class="form-label mb-0 fst-italic">Descrição das
                                        atividades</label>
                                    <textarea name="description_activities" autocomplete="off" class="form-control form-control-sm" rows="3">
                                        {{ trim(old('description_activities')) }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12">
                                    <label for="knowleadge_and_skills" class="form-label mb-0 fst-italic">Conhecimentos / Habilidades e
                                        Atitudes</label>
                                    <textarea name="knowleadge_and_skills" class="form-control form-control-sm" rows="3">
                                        {{ trim(old('knowleadge_and_skills')) }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12 mt-3 text-center border-bottom mb-1 bg-secondary text-white">
                                    TIPO DE RECRUTAMENTO
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12 pt-0">
                                    <div class="form-check form-check-inline">
                                        <input 
                                            class="form-check-input" 
                                            type="radio" 
                                            name="typeof_recruitment" 
                                            id="inlineRadio1" 
                                            value="INTERNO UNIDADE"
                                            @checked(old('typeof_recruitment')== 'INTERNO UNIDADE')
                                        >
                                        <label class="form-check-label" for="inlineRadio1">INTERNO UNIDADE</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input 
                                            class="form-check-input" 
                                            type="radio" 
                                            name="typeof_recruitment" 
                                            id="inlineRadio2" 
                                            value="EXTERNO ESCOLA SUS"
                                            @checked(old('typeof_recruitment')== 'EXTERNO ESCOLA SUS')
                                        >
                                        <label class="form-check-label" for="inlineRadio2">EXTERNO ESCOLA SUS</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input 
                                            class="form-check-input" 
                                            type="radio" 
                                            name="typeof_recruitment" 
                                            id="inlineRadio3" 
                                            value="OUTROS"
                                            @checked(old('typeof_recruitment')== 'OUTROS')
                                        >
                                        <label class="form-check-label" for="inlineRadio3">OUTROS</label>
                                      </div>
                                    {{-- <select name="typeof_recruitment" class="form-select form-select-sm">
                                        <option value="" selected>Selecione um tipo de recrutamento</option>
                                        <option 
                                        value="INTERNO NA UNIDADE"
                                            @if (old('typeof_recruitment') == 'INTERNO NA UNIDADE') selected @endif
                                        >
                                        INTERNO NA UNIDADE
                                        </option>
                                        <option 
                                            value="EXTERNO CANDIDATOS"
                                            @if (old('typeof_recruitment') == 'EXTERNO ESCOLA SUS') selected @endif
                                        >
                                        EXTERNO CANDIDATOS
                                        </option>
                                    </select> --}}
                                </div>
                            </div>

                            <div class="row g-2">
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
                            </div>

                            <div class="row g-2">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm float-end">
                                        Salvar Registro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-4">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h6 class="text-center font-monospace">Dicas para realizar solicitações</h6>
    
                                <ol class="text-sm" style="font-size: 11px">
                                    <li>Campos com este simbolo <b class="text-danger">*</b> são campos obrigatório o
                                        preenchimento </li>
                                    <li>Preencha todos os campos</li>
                                </ol>
                            </div>
                        </div>
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
    </div>
@endsection

@push('_js')
    <script type="module">
        $(document).on('change', 'select[name="reason_of_request"]', function() {

            let reasons = ['SUBSTITUICAO POR PROMOCAO', 'SUBSTITUICAO POR PEDIDO DE DEMISSAO',
                'SUBSTITUICAO GESTANTE'
            ];

            if (reasons.includes($(this).val())) {
                $('input[name="employee_name"]').attr('disabled', false);
            } else {
                $('input[name="employee_name"]').attr('disabled', true);
            }
        })
    </script>
@endpush
