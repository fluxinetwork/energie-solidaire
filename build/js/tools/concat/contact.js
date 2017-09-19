/*======================================================================*\
==========================================================================

                              JS CONTACT

==========================================================================
\*======================================================================*/

function init_form_contact() {

    var formID = '#form-contact';
    jQuery(formID+' button[type=submit]').prop('disabled', false);
    $formObj = jQuery(formID);
   
    var labelBtn = 'Envoyer';   

    $formObj.submit(function (e) {
        e.preventDefault();
        var params = $formObj.serialize(); 

        $formObj.find('button[type=submit]').toggleClass('icon2').prop('disabled', true);

        jQuery.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_contact_form&'+params,
            success: function(data){
                $formObj.find('button[type=submit]').removeClass('icon2');

                if(data[0].validation == 'error'){
                    $formObj.find('button[type=submit]').prop('disabled', false);
                }

                $formObj.find('.js-notify').html('<span class="'+data[0].validation+'">'+data[0].message+'</span>');

            },
            error : function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                $formObj.find('button[type=submit]').prop('disabled', false).removeClass('icon2');
            }

        });
        return false;
    });
}
