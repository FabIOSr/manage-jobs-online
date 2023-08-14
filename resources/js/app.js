import './bootstrap';

import Swal from 'sweetalert2'

window.swal = Swal;


confirm = (id)=>{
    swal.fire({
        title: 'Atenção!',
        text: "você confirmar que deseja exluir este registro?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, exluir!',
        customClass: {
            confirmButton:'btn btn-sm',
            cancelButton:'btn btn-sm',
        }
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(id);
                $('#delete-'+id).submit();
            }
        })
}

