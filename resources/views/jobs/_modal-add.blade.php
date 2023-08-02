{{-- MODAL HAPUS --}}
<div class="modal fade" id="addCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold poppins" id="exampleModalLabel">Formulario de cadastro nova empresa
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="company" id="company" autocomplete="off" action="{{ route('companies.store') }}">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label for="document" class="form-labelmb-0">CNPJ</label>
                            <input name="document" type="text" class="document form-control form-control-sm" id="document">
                            <span class="text-danger document"></span>
                        </div>
                        <div class="col-md-8">
                            <label for="social_name" class="form-label mb-0">Razão Social</label>
                            <input name="social_name" type="text" class="form-control form-control-sm" id="social_name">
                            <span class="text-danger social_name"></span>
                        </div>
                        <div class="col-10">
                            <label for="alias_name" class="form-label mb-0">Nome Fantasia</label>
                            <input name="alias_name" type="text" class="form-control form-control-sm" id="alias_name">
                            <span class="text-danger alias_name"></span>
                        </div>
                        <div class="col-2">
                            <label for="zipcode" class="form-label mb-0">Cep</label>
                            <input name="zipcode" type="text" class="form-control form-control-sm" id="zipcode">
                            <span class="text-danger zipcode"></span>
                        </div>
                        <div class="col-10">
                            <label for="street" class="form-label mb-0">Endereço</label>
                            <input name="street" type="text" class="form-control form-control-sm" id="street"
                            placeholder="1234 Main St">
                            <span class="text-danger street"></span>
                        </div>
                        <div class="col-2">
                            <label for="number" class="form-label mb-0">Número</label>
                            <input name="number" type="text" class="form-control form-control-sm" id="number">
                            <span class="text-danger number"></span>
                        </div>
                        <div class="col-10">
                            <label for="complement" class="form-label mb-0">Cmplemento</label>
                            <input name="complement" type="text" class="form-control form-control-sm" id="complement"                            
                                placeholder="Apartment, studio, or floor">
                                <span class="text-danger complement"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="neighborhood" class="form-label mb-0">Bairro</label>
                            <input name="neighborhood" type="text" class="form-control form-control-sm"
                            id="neighborhood">
                            <span class="text-danger neighborhood"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label mb-0">Cidade</label>
                            <input name="city" type="text" class="form-control form-control-sm" id="city">
                            <span class="text-danger city"></span>
                        </div>
                        <div class="col-md-2">
                            <label for="state" class="form-label mb-0">Estado</label>
                            <input name="state" type="text" class="form-control form-control-sm" id="state">
                            <span class="text-danger state"></span>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label mb-0">E-mail responsável</label>
                            <input name="email" type="email" class="form-control form-control-sm" id="email">
                            <span class="text-danger email"></span>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <span class="text-danger "></span>
                                <label class="form-check-label" for="gridCheck">
                                    Estou ciente que as informações acima são veridicas.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>