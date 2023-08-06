@extends('layouts.app')

@section('content')

@livewire('jobs.experiences.index')

@includeIf('experience/_modal')

{{-- <div class="container">
    <div class="row justify-content-center">
        @includeIf('layouts.sidebar')
        <div class="col-md-10">

            <div class="row mb-2 border-bottom pb-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    {{-- <span class="alert alert-success py-2" id="alert" role="alert">
                        Great! created successfully!
                    </span> --}}
                </div>
                <div class="col-md-3 text-end">
                    <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#modal_experience">+ Registrar nova experiência</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="table" class="table table-sm">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">#</th>
                        <th scope="col">Experiência</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="120">Açoes</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@push('_js')
    <script type="module">
        $(function(){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            
            var modalExperience = document.getElementById("modal_experience");
            
            modalExperience.addEventListener('shown.bs.modal',function(){
                $('.text-danger').html('');
                $('#experience').focus();
            })
            modalExperience.addEventListener('hidden.bs.modal',function(){
                $('.text-danger').html('');
                $('#experiences')[0].reset();
            })

            function table_load_data(data){
                let rows = '';
                let i = 0;
                $.each(data, function(key, value){
                    rows = rows + '<tr>';
                    rows = rows + '<td>'+ ++i +'</td>';
                    rows = rows + '<td>'+value.experience+'</td>';
                    rows = rows + '<td>'+value.status+'</td>';
                    rows = rows + '<td>';
                        rows = rows + `                <a href="#"
                                            class="btn btn-sm btn-primary py-0 px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" fill="currentColor"
                                                class="bi bi-pencil-square" viewBox="0 0 12 12">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <button type="button"
                                            class="btn btn-sm btn-danger py-0 px-2 d-inline"
                                            data-bs-toggle="modal"
                                            data-bs-target="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" fill="currentColor"
                                                class="bi bi-trash3-fill" viewBox="0 0 12 12">
                                                <path fill-rule="evenodd"
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 12h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </button>
                            </td>`;
                    rows = rows + '</tr>';
                });
                $('#tbody').html(rows)
                toastr.success('Experiencias carregadas','',{timeOut: 2000});
            }

            function getAll(){
                $.ajax({
                    url: "{{ route('experiences') }}",
                    type:'GET',
                    success: function (data) {
                        table_load_data(data);
                    },
                    error : function (e) {
                        console.log(e)
                    }
                });
            }

            getAll();

            $('#experiences').submit(function(e){
                e.preventDefault();

                if($('input[name="experience"]').val()=='') {
                    $('input[name="experience"]').trigger( "focus" ); 
                    return false
                }

                if($('select[name="status"]').val()=='') {
                    $('select[name="status"]').trigger( "focus" ); 
                    return false
                }

                if($('.form-check-input').is(':checked')){
                    console.log('aceite ok, check');
                }else{
                    $('.form-check-input').trigger( "focus" ); 
                    alert('Marque o check do aceite dos termos');
                    return false
                }

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var data = form.serialize();

                $('.text-danger').html('');

                $.ajax({
                    method:method,
                    url:url,
                    data:data,
                    success:function(response){
                        $('#experiences')[0].reset();
                        $('.close').trigger('click');
                        getAll();
                        toastr.success(response.message,'',{timeOut: 4000});
                    },
                    error:function(xhr,status, error){
                        var responseJson = JSON.parse(xhr.responseText);
                        var message = responseJson.message;
                        var errors = responseJson.errors;
                        $.each(errors, function(key, value){
                            var element = $('[name="'+key+'"]');
                            element.next().html(
                                '<span class="text-danger">'+ value +'</span>'
                            );
                        })

                        
                    },
                })
            })
        })
        
    </script>
@endpush