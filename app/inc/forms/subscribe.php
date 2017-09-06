<?php
/**
 * Subscription
 */

function fluxi_subscribe(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	// vars
	$redirect_slug = home_url();
	$toky_toky = $_POST['toky_toky'];
	$contact_email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);

	$message_response = 'Erreur dans l\'envoie du formulaire. Essayez à nouveau, contacter-nous si le problème persiste.';

	// Verify nonce
	if ( isset( $_POST['fluxi_subscribe_nonce_field'] ) && wp_verify_nonce( $_POST['fluxi_subscribe_nonce_field'], 'fluxi_subscribe' )) :

		// Verify email & token
		if ( is_numeric($toky_toky) && $toky_toky == 9439541686 ):

			if ( !empty( $contact_email ) && is_email( $contact_email ) ):			

				$metas_tab = array(
					'email'	=> $contact_email
				);
				$message_response = 'Votre demande a bien été prise en compte';
				// Notification mail admin
				notify_by_mail (array(CONTACT_GENERAL),'Contact Energie Solidaire <'.CONTACT_GENERAL.'>','Nouvelle de demande d\'information',false,'<h2>Nouvelle de demande d\'information</h2><p>Email du contact : '.$metas_tab['email'].' </p>');

			else:
				// Empty required field
				$reg_errors->add( 'emptyfield', 'Veuillez renseigner le champ' );
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
			'redirect' => $redirect_slug,
			'message' => $message_response
		);
		$results[] = $data;
	endif;

	// Output JSON
	wp_send_json($results);
}

add_action('wp_ajax_nopriv_fluxi_subscribe', 'fluxi_subscribe');
add_action('wp_ajax_fluxi_subscribe', 'fluxi_subscribe');

?>