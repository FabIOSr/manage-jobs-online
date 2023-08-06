<div wire:ignore.self class="modal fade" id="modal_experience_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold poppins" id="exampleModalLabel">Elimanar expêrincia
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="delete">
                <div class="modal-body">
                    Você tem certeza que deseja eliminar o registro ? {{ $selected_id }}
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="close" class="btn btn-sm btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-danger">
                        <span wire:loading class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Sim, Elimanar registro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

