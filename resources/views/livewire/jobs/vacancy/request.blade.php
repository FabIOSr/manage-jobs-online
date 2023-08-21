<div wire:ignore.self class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="addVaga"
    aria-labelledby="staticBackdropLabel" style="width: 45%">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold poppins" id="staticBackdropLabel">Requisição de Vaga</h5>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <form wire:submit.prevent="save" autocomplete="off">
                <div class="row g-2">
                    <div class="col-12 text-center border-bottom mb-0 bg-secondary text-white mt-0">
                        DADOS SOBRE A VAGA
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-3 mb-1">
                        <label for="contract_type" class="form-label mb-0">Tipo Contrato</label>
                        <select name="contract_type" wire:model="contract_type" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="CLT">
                                CLT
                            </option>
                            <option value="Estágio">
                                Estágio
                            </option>
                            <option value="PJ">
                                PJ
                            </option>
                        </select>
                        @error('contract_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="vacancy_type" class="form-label mb-0">Tipo Vaga</label>
                        <select name="vacancy_type" wire:model="vacancy_type" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="Determinado">
                                Determinado
                            </option>
                            <option value="Indeterminado">
                                Indeterminado
                            </option>
                            <option value="Outros">
                                Outros
                            </option>
                        </select>
                        @error('vacancy_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="department" class="form-label mb-0 text-sm">Departamento</label>
                        <select id="department" wire:model="department" class="form-select form-select-sm">
                            <option selected>...</option>
                            @forelse (\App\Models\Department::all() as $item)
                                <option value="{{ $item->id }}">
                                    {{ mb_strtoupper($item->name) }}
                                </option>
                            @empty
                                <option>Sem cadastro</option>
                            @endforelse
                        </select>
                        @error('department')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-4 mb-1">
                        <label for="office" class="form-label mb-0 text-sm">Cargo</label>
                        <select id="office" wire:model="office" class="form-select form-select-sm">
                            <option value="do" selected>...</option>
                            @forelse (\App\Models\Office::all() as $item)
                                <option value="{{ $item->id }}">
                                    {{ mb_strtoupper($item->name) }}
                                </option>
                            @empty
                                <option>Sem cadastro</option>
                            @endforelse
                        </select>
                        @error('office')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label mb-0 d-block">Tipo de Recrutamento</label>
                        <select name="typeof_recruitment" wire:model="typeof_recruitment"
                            class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="INTERNO">
                                INTERNO
                            </option>
                            <option value="EXTERNO CANDIDATOS">
                                EXTERNO
                            </option>
                        </select>
                        @error('typeof_recruitment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="reasonof_request" class="form-label mb-0">Motivo da Requisição</label>
                        <select name="reasonof_request" wire:model="reasonof_request"
                            class="form-select form-select-sm">
                            <option value="" selected>...</option>
                            <option value="SUBSTITUICAO POR DISPENSA">
                                SD - SUBSTITUICAO POR DISPENSA
                            </option>
                            <option value="SUBSTITUICAO POR PROMOCAO">
                                SP - SUBSTITUICAO POR PROMOCAO
                            </option>
                            <option value="TERMINO DE CONTRATO">TC -
                                TERMINO DE CONTRATO
                            </option>
                            <option value="REPROVACAO NA EXPERIENCIA">
                                TREXP - REPROVACAO NA
                                EXPERIENCIA</option>
                            <option value="SUBSTITUICAO POR PEDIDO DE DEMISSAO">
                                SPD - SUBSTITUICAO POR PEDIDO
                                DE DEMISSAO
                            </option>
                            <option value="SUBSTITUICAO GESTANTE">
                                SG -
                                SUBSTITUICAO GESTANTE
                            </option>
                        </select>
                        @error('reasonof_request')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row g-2 d-none" id="data-name">
                    <div class="col-12">
                        <label for="employee_name" class="form-label mb-0 text-primary">Nome Completo Funcionario a ser
                            substituido</label>
                        <input name="employee_name" wire:model="employee_name" disabled type="text"
                            class="form-control form-control-sm" autocomplete="off">
                        @error('employee_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-3">
                        <label for="workschedule" class="form-label mb-0">H. de Trabalho</label>
                        <select name="workschedule" wire:model="workschedule" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="07:00-19:00">
                                07:00-19:00</option>
                            <option value="19:00-07:00">
                                19:00-07:00</option>
                            <option value="07:00-17:00">SQ
                                07:00-17:00 - S 07:00-16:00</option>
                        </select>
                        @error('workschedule')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="duty" class="form-label mb-0">Plantão</label>
                        <select name="duty" wire:model="duty" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="DIURNO">DIURNO
                            </option>
                            <option value="DIURNO-IMPAR">
                                DIURNO IMPAR</option>
                            <option value="DIURNO-PAR">
                                DIURNO PAR</option>
                            <option value="NOTURNO-IMPAR">
                                NOTURNO IMPAR</option>
                            <option value="NOTURNO-PAR">
                                NOTURNO PAR</option>
                        </select>
                        @error('duty')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="workload" class="form-label mb-0">Carga Horária</label>
                        <select name="workload" wire:model="workload" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="36-180">36hs -
                                180hm</option>
                            <option value="40-200">40hs -
                                200hm</option>
                            <option value="44-220">44hs -
                                220hm</option>
                        </select>
                        @error('workload')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="scale" class="form-label mb-0">Escala</label>
                        <select name="scale" wire:model="scale" class="form-select form-select-sm">
                            <option value="" selected>---</option>
                            <option value="5x2">5x2
                            </option>
                            <option value="6x1">6x1
                            </option>
                            <option value="12x36">12x36
                            </option>
                            <option value="12x60">12x60
                            </option>
                            <option value="24x48">24x48
                            </option>
                        </select>
                        @error('scale')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row g-2 mt-2">
                    <div class="col-12 mt-3 text-center border-bottom mb-1 bg-secondary text-white">
                        PERFIL DA VAGA
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-12">
                        <label for="description_activities" class="form-label mb-0">Descrição das
                            atividades</label>
                        <textarea name="description_activities" wire:model="description_activities" id="activities" autocomplete="off"
                            class="form-control form-control-sm" rows="3">
                        </textarea>
                        @error('description_activities')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-12">
                        <label for="knowleadge_and_skills" class="form-label mb-0">Conhecimentos / Habilidades e
                            Atitudes</label>
                        <textarea name="knowleadge_and_skills" wire:model="knowleadge_and_skills" class="form-control form-control-sm"
                            rows="3">
                        </textarea>
                        @error('knowleadge_and_skills')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 d-grid mt-1">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <span class="spinner-border spinner-border-sm" aria-hidden="true" wire:loading wire:target="save"></span>
                        <i class="bi bi-database-fill-up"></i>
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
