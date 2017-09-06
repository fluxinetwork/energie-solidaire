/*------------------------------*\

    #SUBSCRIBE

\*------------------------------*/

/**
 * Subscription form
 */	

function subscription(){

    $('.landing__subscribe').on('submit', 'form#subscribe', function(e){

        var params = $(this).serialize();

        $('.subscribe__input__button').html('<span class="spinner"></span>');

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_subscribe&'+params,
            success: function(data){
                if(data[0].validation == 'error'){
                     $('.landing__notify').html('<span class="error">'+data[0].message+'</span>');                       
                }else{                    
                    $('.landing__notify').html('<span class="success">'+data[0].message+'</span>'); 
                    $('.subscribe__input__button').prop('disabled', true);                      
                }
                $('.subscribe__input__button').html('Ok');
            },
            error : function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                $('.subscribe__input__button').html('Ok');
            }

        });
        return false;
    });

}