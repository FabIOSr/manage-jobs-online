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
                        {{-- <a wire:navigate href="{{ route('vagas.solicitar') }}" class="btn btn-sm btn-secondary"><i class="bi bi-plus"></i> Solicitar Vaga</a> --}}
                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#addVaga" aria-controls="staticBackdrop">
                            Requisição de Vaga
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">Vaga</th>
                                <th scope="col">Contrato</th>
                                <th scope="col">Cargo / Qtd</th>
                                <th scope="col">Status</th>
                                <th scope="col" width=80>Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    Manuel Gomes <br>
                                    <small class="text-muted">Enfermeiro</small>
                                </td>
                                <td>
                                    P.A Maria Dirce <br>
                                    <small class="text-muted">16165611165</small>
                                </td>
                                <td>Integral</td>
                                <td>Temporário</td>
                                <td>
                                    Téc. Enfermagem - <small>02</small>
                                </td>
                                <td class="text-secondary">SOLICITADO</td>
                                <td>
                                    <a href="#" type="button" class="btn btn-success btn-sm py-0"
                                        data-bs-toggle="modal" data-bs-target="#modalShow/id">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-list-columns-reverse" viewBox="0 0 12 12">
                                            <path fill-rule="evenodd"
                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                        </svg>
                                    </a>

                                    <a href="#" class="btn btn-sm btn-primary py-0 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 12 12">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <th scope="row">2</th>
                            <td>
                                João das Neves <br>
                                <small class="text-muted">Coord. Administrativo</small>
                            </td>
                            <td>
                                Hospital Municipal da Criança <br>
                                <small class="text-muted">46319000002012</small>
                            </td>
                            <td>Integral</td>
                            <td>Efetivo</td>
                            <td>
                                Ass. Administrativo - <small>05</small>
                            </td>
                            <td class="text-secondary">EM PROCESSO</td>
                            <td>
                                <a href="#" type="button" class="btn btn-success btn-sm py-0" data-bs-toggle="modal"
                                    data-bs-target="#modalInfo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-list-columns-reverse" viewBox="0 0 12 12">
                                        <path fill-rule="evenodd"
                                            d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-sm btn-primary py-0 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 12 12">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @includeIf('jobs.vagas_solicitadas.offcanvas')

    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold poppins" id="exampleModalLabel">Detalhes vaga solicitada
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%" class="mb-4">
                        <tr>
                            <td class="ms-5 fw-bold" width="33%">SOLICITANTE: &nbsp;</td>
                            <td class="" width="33%"></td>
                            <td class="text-end fw-bold">Data Solicitação</td>
                        </tr>
                        <tr>
                            <td class="ms-5 text-primary">João das Neves: &nbsp;</td>
                            <td class=""></td>
                            <td class="text-end text-secondary"> {{ date('d/m/Y') }}</td>
                        </tr>
                    </table>


                    <table width="100%">
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Razão Social: &nbsp;</td>
                            <td class=""> Hospital Municipal da Criança e Adolescente</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Nº de Vaga: &nbsp;</td>
                            <td class=""> 01</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Cargo: &nbsp;</td>
                            <td class=""> Assistente Administrativo</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold"width=125>Departamento: &nbsp;</td>
                            <td class=""> Administração</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Tipo de Vaga: &nbsp;</td>
                            <td class=""> Integral</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Tipo de Contrato: &nbsp;</td>
                            <td class=""> Efetivo</td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ms-5 fw-bold">Status: &nbsp;</td>
                            <td class="text-primary"> SOLICITADO</td>
                        </tr>
                        <tr>
                            <td class="ms-5 fw-bold">Obs Solicitante:</td>
                            <td class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid eligendi
                                aperiam eveniet earum nihil? Nam aliquid tempora pariatur, commodi obcaecati quos natus
                                exercitationem facere quis?</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aprovar
                        Direto</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('_css')
    <link href="{{ asset('plugins/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/simple/simple-datatables.css') }}">
@endpush

@push('_js')
    <script src="{{ asset('plugins/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('plugins/simple/simple-datatables.js') }}"></script>

    <script type="module">
        $(document).ready(function() {
            $(document).on('change', 'select[name="reasonof_request"]', function() {

                console.log($(this).val());

                let reasons = ['SUBSTITUICAO POR PROMOCAO', 'SUBSTITUICAO POR PEDIDO DE DEMISSAO',
                    'SUBSTITUICAO GESTANTE'
                ];

                if (reasons.includes($(this).val())) {
                    $('#data-name').removeClass('d-none')
                    $('input[name="employee_name"]').attr('disabled', false);
                } else {
                    $('#data-name').addClass('d-none')
                    $('input[name="employee_name"]').attr('disabled', true);
                }
            })

            $('#activities').on('input', function() {
                let texto = $(this).val().replace(/\s{2,}/g, ' ');
                $(this).val($(this).val().replace(/\r?\n|\r/g, '').replace(/\s{2,}/g, ' '));
                $('#activities').val(texto);
            });
        });
    </script>
@endpush
