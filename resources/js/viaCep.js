$("input[name=zipcode]").blur(function(){
    var cep = $(this).val().replace(/[^0-9]/, '');
    if(cep.length == 8){
        var url = 'https://viacep.com.br/ws/'+cep+'/json/';
        $.ajax({
                url: url,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                success : function(json){
                    if(json.logradouro){
                        $("input[name=street]").val(json.logradouro);
                        $("input[name=neighborhood]").val(json.bairro);
                        $("input[name=city]").val(json.localidade);
                        $("input[name=state]").val(json.uf);
                        $('input[name="number"]').focus();
                    }else{
                        toastr.error('CEP não encontrado');
                    }
                },
                error:function(xhr, status, error){
                    console.log(response);
                }
        });
    }                   
});