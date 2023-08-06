{{-- MODAL EXP --}}
<div class="modal fade" id="modal_experience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold poppins" id="exampleModalLabel">Formulario experiencia
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="experiences" autocomplete="off" action="{{ route('experiences.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-9">
                            <label for="experience" class="form-label mb-1">Experiência <small class="text-danger">*</small></label>
                            <input name="experience" type="text" class="form-control form-control-sm" id="experience">
                            <span></span>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label mb-1">Status <small class="text-danger">*</small></label>
                            <select name="status" id="status" class="form-select form-select-sm">
                              <option value="" selected>...</option>
                              <option value="ACTIVE">ATIVO</option>
                              <option value="INACTIVE">INATIVO</option>
                            </select>
                            <span></span>
                          </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_terms">
                                <span class="text-danger "></span>
                                <label class="form-check-label" for="check_terms">
                                    Confirmo que dados estão todos corretamente preenchidos.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>