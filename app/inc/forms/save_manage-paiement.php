<?php
/**
* Process Paiement
* ----------------------------------------------------
*/


function fluxi_manage_paiement(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	// vars	
	$redirect_slug = home_url();
	$toky_toky = filter_var( $_POST['toky_toky'], FILTER_SANITIZE_NUMBER_INT);

	$message_response = 'Erreur dans le traitement du paiement. Essayez à nouveau, si le problème persiste, contactez-nous.';

	// Verify nonce & toky_toky
	if ( isset( $_POST['fluxi_manage_paiement_nonce_field'] ) && wp_verify_nonce( $_POST['fluxi_manage_paiement_nonce_field'], 'fluxi_manage_paiement' ) && is_numeric($toky_toky) && $toky_toky == 698413581217 ) :
		
		if ( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['token_s']) && !empty($_POST['amount']) ):

			require (get_template_directory() . '/app/inc/forms/Stripe.php');
			
			$mail_contact = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);			
			$nom_structure_contact = filter_var( $_POST['name'], FILTER_SANITIZE_STRING);
			$adresse = filter_var( $_POST['adresse'], FILTER_SANITIZE_STRING);
			$complement_adresse = filter_var( $_POST['complement_adresse'], FILTER_SANITIZE_STRING);
			$ville = filter_var( $_POST['ville'], FILTER_SANITIZE_STRING);
			$code_postal = filter_var( $_POST['code_postal'], FILTER_SANITIZE_STRING);			
			$telephone = filter_var( $_POST['telephone'], FILTER_SANITIZE_STRING);
			$token_s = filter_var( $_POST['token_s'], FILTER_SANITIZE_STRING);
			$today = date('d/m/Y');
			$date_paiement = date('Ymd');
			$description_charge = 'Don à Énergie Solidaire';

			$montant = filter_var( $_POST['amount'], FILTER_SANITIZE_NUMBER_INT);
			$montant_cent = (int)($montant*100);			

			$stripe = new Stripe(STRIPE_KEY);			

			$customer = $stripe->api('customers',[
				'source' => $token_s,
				'description' => $nom_structure_contact,
				'email' => $mail_contact
			]);

			if( property_exists($customer, 'error') ):
				var_dump($customer->error);
				$reg_errors->add( 'stripefail', $customer->error );
			else:

				$charge = $stripe->api('charges',[
					'amount' => $montant_cent,
					'currency' => 'eur',
					'customer' =>$customer->id,
					'description' => $description_charge
				]);

				if( property_exists($charge,'error') || $charge->status == 'failed'):
					var_dump($charge->error);
					$reg_errors->add( 'stripefail', $message_response );
				else:

					$metas_tab = array(
						'montant' => $montant,
						'mode_paiement'	=> 'cb',
						'date_paiement'	=> $date_paiement,
						'mail_contact' => $mail_contact,
						'nom_structure_contact' => $nom_structure_contact,
						'adresse' 	=> $adresse,
						'complement_adresse' 	=> $complement_adresse,
						'ville' 	=> $ville,
						'code_postal' 	=> $code_postal,
						'telephone' => $telephone						
					);

					$last4 = 'XXXX XXXX XXXX ' . $charge->source->last4;
					$metas_tab['n_transaction'] = $charge->id;
					$metas_tab['id_stripe'] = $customer->id;
					$metas_tab['id_carte'] = $charge->source->id;
					$metas_tab['derniers_chiffres'] = $last4;
					$metas_tab['statut_paiement'] = $charge->status;
					
					$title = $nom_structure_contact.' : '.$mail_contact;
					$content = '';
					
					// Insert post
					$new_paiement_post = array(
					  'post_title'    => $title,
					  'post_content'  => $content,
					  'post_status'   => 'pending',
					  'post_type' 	  => 'dons-ponctuels'
					);

					$the_post_id = wp_insert_post( $new_paiement_post );

					// Insert meta
					foreach( $metas_tab as $key => $value ){
						add_post_meta($the_post_id, $key, $value, true);						
					}

					// Insert Topdon
					/*$datas_topdon = array(
					   'key' => "e8Gpe5G!",
					   'civilite' => 'M',
					   'nom' => 'Rolland',
					   'prenom' => 'Yann',
					   'email' => $mail_contact,
					   'adresse1' => $adresse,
					   'adresse2' => $complement_adresse,
					   'codepostal' => $code_postal,
					   'ville' => $ville,
					   'pays' => 'France',
					   'tel' => $telephone,
					   //'code_aff' => '????',
					   'numtransac' => $charge->id,
					   'dt_paiement' => date("Y-m-d H:i:s"),
					   'amount' => $montant,
					   //'authorisation_id' => '77777',
					   //'payment_certificate' => '1235',
					   'payment_time' => date("Hi"),
					   'payment_date' => $date_paiement,
					   'type_paiement' => 'CBM',
					   'recurrence' => 0,
					   //'date_validite' => 10,
					   'id_mem' => '1234',
				    );

				    $postdata_topdon = http_build_query($datas_topdon);
			        $opts_topdon = array('http' =>
			            array(
			                'method' => 'POST',
			                'header' => 'Content-type: application/x-www-form-urlencoded',
			                'content' => $postdata_topdon
			            )
			        );

			        $context_topdon = stream_context_create($opts_topdon);

			        $result_topdon = file_get_contents('https://ws.topdon.fr/importDonsTopweb.php', false, $context_topdon);*/
			        

					// Notification mail admin
					/*notify_by_mail ( array(CONTACT_ENERCOOP), 'Les Amis d\'Enercoop <' . CONTACT_ENERCOOP . '>','Nouveau don',false,'<h2>Nouveau don de '.$montant.'€</h2><p>' . $nom_structure_contact . ' a donné '.$montant.'€ le '.$today.'.<br><br><a style="background-color:#005d8c; display:inline-block; padding:10px 20px; color:#fff; text-decoration:none;" href="' .home_url() . '/wp-admin/post.php?post=' . $the_post_id . '&action=edit">Accéder au reçu</a></p>');

					// Notification mail user
					$mail_paiement = array(get_footer_mail(), $montant, $nom_structure_contact, $adresse, $complement_adresse, $code_postal, $ville, $today, $last4, 'cb' );
					notify_by_mail (array($mail_contact),'Les Amis d\'Enercoop <' . CONTACT_ENERCOOP . '>', 'Confirmation de don', true, get_template_directory() . '/app/inc/mails/confirmation-paiement.php', $mail_paiement);	*/			

					$message_response = 'Votre don a été pris en compte. Vous allez recevoir une confirmation par email.';
				endif;
			endif;
			

		else:
			// Empty required field
			$reg_errors->add( 'emptyfield', 'Veuillez renseigner tous les champs obligatoires.' );
		endif;
			
			
	else :
		// If invalid nonce or hack toky
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

	die();
}

add_action('wp_ajax_nopriv_fluxi_manage_paiement', 'fluxi_manage_paiement');
add_action('wp_ajax_fluxi_manage_paiement', 'fluxi_manage_paiement');

