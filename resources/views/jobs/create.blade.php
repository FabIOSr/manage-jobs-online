@extends('layouts.app')

@section('content')
    <div class="container">
        @livewire('company.create')
    </div>
@endsection

{{-- @push('_js')
    <script type="module">
        $(function(){

            function clearFields(){
                $("input[name='street']").val('');
                $("input[name='complement']").val('');
                $("input[name='state']").val('');
                $("input[name='city']").val('');
                $("input[name='neighborhood']").val('');

            }

            function searchZipcode(url){
                $.getJSON(url , function (data) {

                    if (!("erro" in data)) {
                        $("input[name='street']").val(data.logradouro);
                        $("input[name='complement']").val(data.complemento);
                        $("input[name='neighborhood']").val(data.bairro);
                        $("input[name='city']").val(data.localidade);
                        $("input[name='state']").val(data.uf);
                        $("input[name='number']").trigger('focus')
                    } else {
                        alert("CEP não encontrado.");
                        $("input[name='zipcode']").val('');
                        clearFields();
                        $("input[name='zipcode']").trigger('focus');
                    }
                });
            }

            $('input[name="zipcode"]').blur(function(){
                
                let zipcode = $(this).val().replace(/[^0-9]+/g,'');
                const url = `https://viacep.com.br/ws/${zipcode}/json/`;
                
                clearFields();

                searchZipcode(url)
                
            });
            

            $('#company').submit(function(e){                
                
                // $('.form-control,.form-select').each(function(k,v){
                //     console.log(v);

                //     if($(this).attr('name') !='complement'){
                //         if($("input[name="+ $(this).attr('name')+ "]").val()==''){
                //             $("input[name="+ $(this).attr('name')+ "]").trigger( "focus" ); 
                //             return false
                //         }
                //     }
                // })

                
                if($('input[name="document"]').val()==''){
                    $('input[name="document"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="social_name"]').val()==''){
                    $('input[name="social_name"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="alias_name"]').val()==''){
                    $('input[name="alias_name"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="zipcode"]').val()==''){
                    $('input[name="zipcode"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="street"]').val()=='') {
                    $('input[name="street"]').trigger( "focus" ); 
                    return false
                }
                
                if($('input[name="number"]').val()=='') {
                    $('input[name="number"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="neighborhood"]').val()=='') {
                    $('input[name="neighborhood"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="city"]').val()=='') {
                    $('input[name="city"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="state"]').val()=='') {
                    $('input[name="state"]').trigger( "focus" ); 
                    return false
                }

                if($('input[name="email"]').val()=='') {
                    $('input[name="email"]').trigger( "focus" ); 
                    return false
                }

                if($('select[name="due_date"]').val()=='') {
                    $('select[name="due_date"]').trigger( "focus" ); 
                    return false
                }

                if($('.form-check-input').is(':checked')){
                    console.log('aceite ok, check');
                }else{
                    $('.form-check-input').trigger( "focus" ); 
                    alert('Marque o check do aceite dos termos');
                    return false
                }
                
                // e.preventDefault();
                // $('.errors').addClass('d-none');               
                // $('.spinner-border').removeClass('d-none');
                // $('.btn-primary').attr('disabled',true);
                
                // var form =$(this);
                // var url = form.attr('action');
                // var method = form.attr('method');
                // var data = form.serialize();
                // $.ajax({
                //     method:method,
                //     url:url,
                //     data:data,
                //     success:function(response){
                //         console.log(response.redirect);
                //         $('.spinner-border').addClass('d-none');
                //         $('.btn-primary').attr('disabled',false);
                //         window.location.href = response.redirect
                //     },
                //     error:function(xhr,status, error){
                //         var responseJson = JSON.parse(xhr.responseText);
                //         var message = responseJson.message;
                //         var errors = responseJson.errors;
                //         $('.errors').removeClass('d-none')
                //         $('.spinner-border').addClass('d-none');
                //         $('.btn-primary').attr('disabled',false);
                //         $('#li').html('');
                //         $.each(errors, function(key, value){
                //             $('#li').append('<li class="text-danger">'+value+'</li>');
                //         });
                //     }
                // })
            })
        })
    </script>
@endpush --}}
