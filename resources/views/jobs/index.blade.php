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
                <div class="col-md-3 text-end pe-0">
                    <a wire:navigate href="{{ route('companies.create') }}" class="btn btn-sm btn-secondary">+ Registrar nova empresa +</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="table" class="table table-sm">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Razão Social</th>
                            <th scope="col">Nº Solicitações</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($companies as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->document }}</td>
                            <td>{{ $item->social_name }}</td>
                            <td></td>
                            <td class="text-secondary">{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('jobs._modal-add')

@endsection

@push('_css')
<link href="{{ asset('plugins/simple-datatables/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/simple/simple-datatables.css') }}">
@endpush

@push('_js')
<script src="{{ asset('plugins/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('plugins/simple/simple-datatables.js') }}"></script>
<script type="module">
    $(function(){
        @if(session()->has('success'))
            console.log('success');
            removeAlert();
        @endif
    })
</script>
{{-- <script type="module">
    $(function(){

        function getAll(){
            $.ajax({
                url: "{{ route('companies.all') }}",
                type:'GET',
                data: { },
                success: function (data) {
                    table_data_row(data);
                },
                error : function (e) {
                    console.log(e)
                }
            });
        }

        getAll()


        function table_data_row(data){
            let rows = '';
            let i = 0;
            $.each(data, function(key, value){
                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.document+'</td>';
                rows = rows + '<td>'+value.alias_name+'</td>';
                rows = rows + '<td>'+''+'</td>';
                rows = rows + '<td>'+value.status+'</td>';
                rows = rows + '</tr>';
            });
            $('#tbody').html(rows)

        }

       
        $('#company').submit(function(event){

            event.preventDefault();
            var dados = new FormData(this);

            console.log(dados);

            $('.text-danger').text('');

            axios.post("{{ route('companies.store') }}", dados)
            .then(function (response) {
                console.log('response: ' +response);
                if(response.flag == 'INSERT'){
                    bootstrap.Modal.getOrCreateInstance('#addCompany').hide();
                }
            })
            .catch(function (error) {
                $.each(error.response.data.errors, function(key, value){
                    $('.'+key).text(value)
                })
            });         
   
        
            // $.ajax({
            //     url: "{{ route('companies.store') }}",
            //     type: "POST",
            //     data: dados,
            //     processData: false,
            //     cache: false,
            //     contentType: false,
            //     success: function(response) {
            //         console.log(response);
            //         if(response.data == 422){
            //             console.log('validação');
            //         }
            //         removeRequestHeader();
            //     },
            //     error: function (request, status, error) {
            //         removeRequestHeader();
            //         if(request.status == 422){
            //             $.each(request.responseJSON.errors, function(key, val){
            //                 $('.'+key).text(val);
            //             })
            //         }
            //     }
            // });
        });

            let messageBox = bootstrap.Alert.getOrCreateInstance('#alert');
            setTimeout(() => {
                messageBox.close();
            }, 2000);

            function validarCNPJ(cnpj) {

                cnpj = cnpj.replace(/[^\d]+/g,'');
                console.log(cnpj);

                if(cnpj == '') return false;
                
                if (cnpj.length != 14)
                    return false;

                // Elimina CNPJs invalidos conhecidos
                if (cnpj == "00000000000000" || 
                    cnpj == "11111111111111" || 
                    cnpj == "22222222222222" || 
                    cnpj == "33333333333333" || 
                    cnpj == "44444444444444" || 
                    cnpj == "55555555555555" || 
                    cnpj == "66666666666666" || 
                    cnpj == "77777777777777" || 
                    cnpj == "88888888888888" || 
                    cnpj == "99999999999999")
                    return false;
                    
                // Valida DVs
                let tamanho = cnpj.length - 2
                let numeros = cnpj.substring(0,tamanho);
                let digitos = cnpj.substring(tamanho);
                let soma = 0;
                let pos = tamanho - 7;
                for (let i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0))
                    return false;
                    
                tamanho = tamanho + 1;
                numeros = cnpj.substring(0,tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (let i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1))
                    return false;
                        
                return true;
                
            };

            $('.document').blur(function(){
                
                let cnpj = $(this).val().replace(/[^0-9]+/g,'');

                if(validarCNPJ(cnpj)){
                    $("input[name='social_name']").val('');
                    $("input[name='alias_name']").val('');
                    $("input[name='zipcode']").val('');
                    $("input[name='street']").val('');
                    $("input[name='complement']").val('');
                    $("input[name='state']").val('');
                    $("input[name='number']").val('');
                    $("input[name='city']").val('');
                    $("input[name='neighborhood']").val('');


                    $.getJSON("https://api-publica.speedio.com.br/buscarcnpj?cnpj=" + cnpj , function (data) {

                        if (!("erro" in data)) {
                            $("input[name='social_name']").val(data["RAZAO SOCIAL"]);
                            $("input[name='alias_name']").val(data["NOME FANTASIA"]);
                            $("input[name='zipcode']").val(data.CEP);
                            $("input[name='street']").val(data["TIPO LOGRADOURO"] +' '+data.LOGRADOURO);
                            $("input[name='complement']").val(data.COMPLEMENTO);
                            $("input[name='number']").val(data.NUMERO);
                            $("input[name='neighborhood']").val(data.BAIRRO);
                            $("input[name='city']").val(data.MUNICIPIO);
                            $("input[name='state']").val(data.UF);
                        } else {
                            alert("CNPJ não encontrado.");
                            $("input[name='social_name']").val('');
                            $("input[name='alias_name']").val('');
                            $("input[name='zipcode']").val('');
                            $("input[name='street']").val('');
                            $("input[name='complement']").val('');
                            $("input[name='state']").val('');
                            $("input[name='number']").val('');
                            $("input[name='city']").val('');
                            $("input[name='neighborhood']").val('');
                        }
                    });

                }else{
                    alert('formato invalido');
                    $("input[name='social_name']").val('');
                    $("input[name='alias_name']").val('');
                    $("input[name='zipcode']").val('');
                    $("input[name='street']").val('');
                    $("input[name='complement']").val('');
                    $("input[name='state']").val('');
                    $("input[name='number']").val('');
                    $("input[name='city']").val('');
                    $("input[name='neighborhood']").val('');
                }
            });        

            

            
        });
</script> --}}
@endpush