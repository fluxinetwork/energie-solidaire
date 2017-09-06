<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php

  	if ( have_posts() ) :

    	while ( have_posts() ) : the_post();

 	?>

	 <div class="single-content jscontactform">
	 	<div class="c-fadingBg l-largeCell">
	 		<?php the_content(); ?>	

	 		<form id="form-contact" role="form" class="c-form l-vRythm">
	 			<fieldset class="c-form__fieldset">

	 				<legend class="c-form__legend">Formulaire de contact</legend>
	 				
	 				<div class="c-form__fieldset__row">
	 					<label class="c-form__label" for="nom_prenom_contact">Nom et prénom<span class="i-required">•</span></label>
	 			      	<input type="text" placeholder="" class="c-form__input" name="nom_prenom_contact" id="nom_prenom_contact" data-validation="required">
	 			      	<div class="c-form__afterInput"></div>
	 			    </div>
	 				
	 				<div class="c-form__fieldset__row">
	 					<label class="c-form__label" for="mail_contact">Email<span class="i-required">•</span></label>
	 			      	<input type="text" placeholder="" class="c-form__input" name="mail_contact" id="mail_contact" data-validation="email">
	 			      	<div class="c-form__afterInput"></div>
	 			    </div>

	 			     <div class="c-form__fieldset__row">
	 			    	<label class="c-form__label" for="texte_contact">Message<span class="i-required">•</span></label>
	 			      	<textarea rows="6" placeholder="" class="c-form__input c-form__textarea" name="texte_contact" id="texte_contact" data-validation="required"></textarea>
	 			    </div>

	 			</fieldset>

	 			<input type="hidden" value="3684168161508" name="toky_toky">
	 		    <?php wp_nonce_field( 'fluxi_contact_form', 'fluxi_contact_form_nonce_field' ); ?>

	 		    <div class="c-form__notify js-notify"></div>

	 			<div class="c-form__submit">
	 		    	<button type="submit" id="submit-contact" class="c-button c-button--cta"><i class="icon-send c-button__icon" aria-hidden="true"></i>Envoyer</button>
	 		    </div>

	 		</form>
	 	</div>
	 </div>

	<?php

    	endwhile;

  	else:

      	include_once( get_template_directory() . '/page-templates-parts/content-none.php' );

  	endif;

?>

<?php get_footer(); ?>
