$('#company').submit(function(e){

    if($('input[name="document"]').val()=='' || $('input[name="document"]').val().length < 14){
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

    var zip = $('input[name="zipcode"]').val();
    zip.replace(/[^0-9]+/g,'');
    if($('input[name="zipcode"]').val()=='' || zip.length < 8){
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
})