@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center g-2">
        @includeIf('layouts.sidebar')
        <div class="col-md-10">
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-header pb-0">
                          <h4 class="card-title">Demanda por Cargos</h4>
                        </div>
                        <table class="table card-table table-vcenter">
                          <thead>
                            <tr>
                              <th>Cargos</th>
                              <th colspan="2">Solicitações</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Ass. Administrativo</td>
                              <td>15</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 15.0%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Téc. de Enfermagem</td>
                              <td>79</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 79.0%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Manutenção</td>
                              <td>1</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 1.9%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Enfermeiro</td>
                              <td>9</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 9.0%"></div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header pb-0">
                          <h4 class="card-title pb-0">Demanda por Empresa</h4>
                        </div>
                        <table class="table card-table table-vcenter">
                          <thead>
                            <tr>
                              <th>Empresa</th>
                              <th colspan="2">Solicitações</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Maria Dirce</td>
                              <td>15</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 15.0%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>UPA Cumbica</td>
                              <td>39</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 39.96%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>UPA São João</td>
                              <td>45</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 45.9%"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>HMCA</td>
                              <td>99</td>
                              <td class="w-50">
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-primary" style="width: 99.72%"></div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-body">{{ __('Painel Home') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
