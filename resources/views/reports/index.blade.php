@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @includeIf('layouts.sidebar')
        <div class="col-md-10">

            <div class="row mb-2 border-bottom pb-3 ms-1">
                <div class="col-md-2 ps-0">
                    <label class="form-label mb-0">Data Inicio</label>
                    <input type="date" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label class="form-label mb-0">Data Final</label>
                    <input type="date" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label for="inputState" class="form-label mb-0">Empresa</label>
                    <select id="inputState" class="form-select form-select-sm">
                        <option selected>Selecione...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputState" class="form-label mb-0">Status</label>
                    <select id="inputState" class="form-select form-select-sm">
                        <option selected>Selecione...</option>
                        <option>SOLICITADO</option>
                        <option>EM PROCESSO</option>
                        <option>REJEITADO</option>
                        <option>APROVADO</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="d-grid pb-0 text-end">
                        <button class="btn btn-primary btn-sm" style="margin-top: 22px;" type="button">Pesquisar</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="table" class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Solicitante</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Nº de vagas</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">01210</th>
                        <td>Manuel Gomes</td>
                        <td>P.A Maria Dirce</td>
                        <td>Analista de processos</td>
                        <td>03</td>
                        <td>15/05/2023</td>
                        <td class="text-info">EM PROCESSO</td>
                      </tr>
                      <tr>
                        <th scope="row">10101</th>
                        <td>Manuel Gomes</td>
                        <td>Hospital Municipal da Criança</td>
                        <td>Analista de Qaulidade</td>
                        <td>01</td>
                        <td>25/05/2023</td>
                        <td class="text-danger">REJEITADA</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('_js')
    <script type="module">
        $(function(){
            let messageBox = bootstrap.Alert.getOrCreateInstance('#alert');
            setTimeout(() => {
                messageBox.close();
            }, 2000);
        });
    </script>
@endpush