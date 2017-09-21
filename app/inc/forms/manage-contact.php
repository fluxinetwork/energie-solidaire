<?php
/**
* Process "Contact form"
* ----------------------------------------------------
*/

/**
 * Send by mail a "Contact form"
 */

function fluxi_contact_form(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	// vars		
	$toky_toky = filter_var( $_POST['toky_toky'], FILTER_SANITIZE_NUMBER_INT);

	$message_response = 'Erreur dans l\'envoie du formulaire. Essayez de l\'envoyer à nouveau. Contacter-nous si le problème persiste.';

	// Verify nonce
	if ( isset( $_POST['fluxi_contact_form_nonce_field'] ) && wp_verify_nonce( $_POST['fluxi_contact_form_nonce_field'], 'fluxi_contact_form' )) :
		// Verify email & token
		if ( is_numeric($toky_toky) && $toky_toky == 3684168161508 ):

			if ( !empty($_POST['nom_prenom_contact']) && !empty($_POST['mail_contact']) && !empty($_POST['texte_contact']) ):	

					$metas_tab = array(
						'nom_prenom_contact'=> filter_var( $_POST['nom_prenom_contact'], FILTER_SANITIZE_STRING),						
						'texte_contact'		=> filter_var( $_POST['texte_contact'], FILTER_SANITIZE_STRING),
						'mail_contact'		=> filter_var( $_POST['mail_contact'], FILTER_SANITIZE_EMAIL)						
					);
					
					// Notification admin					
					notify_by_mail (array(CONTACT_ENERCOOP),'Énergie Solidaire <' . CONTACT_ENERCOOP . '>', 'Nouveau message de contact', false, '<h2>Demande d\'informations via formulaire</h2>'.	
						'<p><strong>Nom et prénom :</strong><br> ' . $metas_tab['nom_prenom_contact'] . '</p>'.
						'<p><strong>Email :</strong><br> ' . $metas_tab['mail_contact'] . '</p>'.					
						'<p><strong>Texte :</strong><br> ' . nl2br($metas_tab['texte_contact']) . '</p>');

					$message_response = 'Votre message a été envoyé avec succès.';

			else:
				// Empty required field
				$reg_errors->add( 'emptyfield', 'Veuillez renseigner tous les champs obligatoires.' );
			endif;

		else:
			// If invalid mail
			$reg_errors->add( 'toky', $message_response );

		endif;

	else :
		// If invalid nonce
		$reg_errors->add( 'nonce', $message_response );
	endif;

	if ( is_wp_error( $reg_errors ) && count( $reg_errors->get_error_messages() ) > 0):
 		$output_errors = '';
		foreach ( $reg_errors->get_error_messages() as $error ) {
			$output_errors .= $error . '<br>';
		}
		$data = array(
			'validation' => 'error',
			'message' => $output_errors
		);
		$results[] = $data;
	else:
		$data = array(
			'validation' => 'success',			
			'message' => $message_response
		);
		$results[] = $data;
	endif;

	// Output JSON
	wp_send_json($results);
}

add_action('wp_ajax_nopriv_fluxi_contact_form', 'fluxi_contact_form');
add_action('wp_ajax_fluxi_contact_form', 'fluxi_contact_form');


