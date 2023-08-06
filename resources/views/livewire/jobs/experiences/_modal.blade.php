<div wire:ignore.self class="modal fade" id="modal_experience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold poppins" id="exampleModalLabel">Formulario experiencia
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="save" autocomplete="off">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-9">
                            <label for="experience" class="form-label mb-1">Experiência <small class="text-danger">*</small></label>
                            <input wire:model="experience" type="text" class="form-control form-control-sm" id="experience" autocomplete="off">
                            @error('experience')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label mb-1">Status <small class="text-danger">*</small></label>
                            <select wire:model="status" id="status" class="form-select form-select-sm">
                              <option value="" selected>...</option>
                              <option value="ACTIVE">ATIVO</option>
                              <option value="INACTIVE">INATIVO</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input wire:model="check_terms" wire:click="$set('free_trial',{{ $check_terms ? 'false' : 'true' }})" type="checkbox" class="form-check-input" id="check_terms" required>
                                <label class="form-check-label" for="check_terms">
                                    Confirmo que dados estão todos corretamente preenchidos. {{ $selected_id }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="close" class="btn btn-sm btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span wire:loading class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        @if($selected_id)
                        Atualizar
                        @else
                        Registrar
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

