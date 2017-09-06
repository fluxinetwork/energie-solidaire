/*------------------------------*\

    #  Paiement

\*------------------------------*/

$( document ).ready(function() {
	if($('#don-ponctuel').length){
        initaddPay();
		initDisplayAmount();
    }
});

// Custom display charges
function initDisplayAmount(){

	displayAmount($('input[name="amount"]').val());

	$('input[name="amount"]').on( 'change', function(){
		var current_amount = $('input[name="amount"]').val();
		displayAmount(current_amount);
	});

	$('input[name="amount"]').on( 'focus', function(){
		var current_amount = $('input[name="amount"]').val();
		displayAmount(current_amount);		
	});
}

function displayAmount(amount){
	if( amount != '' && $.isNumeric(amount) ){
		$('.js-amount').html( 'Faire un don de '+amount+',00 €');
	}else{
		$('.js-amount').html( 'Faire un don');	
	}
}

// Paiement don ponctuel
function initaddPay(){	

	Stripe.setPublishableKey('pk_test_vVfhSNv1SsueVCKsQZ0NchPM');

    var formID = '#don-ponctuel';

    $(formID+' button[type=submit]').prop('disabled', false);
    $formObj = $('#don-ponctuel');

	$formObj.submit(function (e) {

		e.preventDefault();
		$formObj.find('button[type=submit]').prop('disabled', true).html('<i class="spinner"></i> En cours ...'); // On désactive le bouton submit

		Stripe.card.createToken($formObj, function (status, response) {

		    if (response.error) { 

		    	var type_error = response.error.type;
		    	var error_mess;
		    	var error_mess_1 = 'Erreur dans l\'envoie du formulaire. Essayez de l\'envoyer à nouveau. Contacter-nous si le problème persiste.';


			    switch (type_error){
					case "api_connection_error":
						error_mess = error_mess_1;
						break;
					case "api_error":
						error_mess = error_mess_1;
						break;
					case "authentication_error":
						error_mess = error_mess_1;
						break;
					case "card_error":
						switch (response.error.code){

							case "incorrect_number":
							case "invalid_number":
								error_mess = 'Votre numéro de carte bancaire est invalide.';
							    break;
							case "invalid_expiry_month":
								error_mess = 'Le mois d\'expiration de votre carte bancaire est invalide.';
								break;

							case "invalid_expiry_year":
								error_mess = 'L\'année d\'expiration de votre carte bancaire est invalide.';
								break;

							case "incorrect_cvc":
							case "invalid_cvc":
								error_mess = 'Le cryptogramme de votre carte bancaire est invalide.';
								break;

							case "expired_card":
								error_mess = 'Votre carte bancaire a expirée.';
								break;

							case "incorrect_zip":
								error_mess = 'Votre code postal est invalide.';
								break;

							case "card_declined":
								error_mess = 'Votre carte bancaire a été refusée.';
								break;

							case "missing":
								error_mess = 'Votre carte bancaire n\'est pas référencée.';
								break;

							case "processing_error":
								error_mess = error_mess_1;
								break;

							default:
								error_mess = 'Il y a une erreur dans vos informations de carte bancaire.';
								break;

						}
						break;
					case "invalid_request_error":
						error_mess = 'Veuillez renseigner tous les champs et renvoyer le formulaire.';
						break;
					case "rate_limit_error":
						error_mess = error_mess_1;
					    break;
					default:
				    	error_mess = error_mess_1;
				    	break;
				}

				// On affiche les erreurs
			    $formObj.find('.js-notify').html('<span class="error">' + error_mess + '</span>');
				// On réactive le bouton
				$formObj.find('button[type=submit]').prop('disabled', false).html('Faire un don');

		    } else { // Le token a bien été créé

			    var token = response.id; // On récupère le token
			    var params = $formObj.serialize();

			    $.ajax({
	                type: 'POST',
	                dataType: 'JSON',
	                url: ajax_object.ajax_url,
	                data: 'token_s='+token+'&action=fluxi_manage_paiement&'+params,
	                success: function(data){

	                    if(data[0].validation == 'error'){
	                        $formObj.find('button[type=submit]').prop('disabled', false).html('Faire un don');
	                    }else{
	                        $formObj.find('button[type=submit]').remove();
	                        $formObj.find('.form__buttons').html('<a href="'+data[0].redirect+'" class="button">Retour</a>');
	                    }
	                    $formObj.find('.js-notify').html('<span class="'+data[0].validation+'">'+data[0].message+'</span>');

	                },
	                error : function(jqXHR, textStatus, errorThrown) {
	                    //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
	                    $formObj.find('button[type=submit]').prop('disabled', false).html('Faire un don');
	                }

	            });
	            return false;

			}

		});

	});



}

