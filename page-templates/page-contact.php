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

 	<header class="projet-header l-largeCell">
 		<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
 		<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>

 		<hgroup class="projet-header__hgroup">
 			<h1 class="projet-title"><?php echo get_the_title(); ?></h1>
 		</hgroup>
 	</header>

	 <div class="l-col l-col--content l-innerRythm jscontactform">

	 		<?php the_content(); ?>	

	 		<form id="form-contact" role="form" class="form l-vRythm">
	 			<fieldset class="form-fieldset">

	 				<legend class="c-tiltedTitle">Formulaire de contact</legend>
	 				
	 				<div class="form-row">
	 					<label class="form-row__label" for="nom_prenom_contact">Nom et prénom<span class="i-required">•</span></label>
	 			      	<input type="text" class="form-row__input" name="nom_prenom_contact" id="nom_prenom_contact" data-validation="required">
	 			      	<div class="form-row__afterInput"></div>
	 			    </div>
	 				
	 				<div class="form-row">
	 					<label class="form-row__label" for="mail_contact">Email<span class="i-required">•</span></label>
	 			      	<input type="email" class="form-row__input" name="mail_contact" id="mail_contact" data-validation="email">
	 			      	<div class="form-row__afterInput"></div>
	 			    </div>

	 			     <div class="form-row">
	 			    	<label class="form-row__label" for="texte_contact">Message<span class="i-required">•</span></label>
	 			      	<textarea rows="6" class="form-row__input" name="texte_contact" id="texte_contact" data-validation="required"></textarea>
	 			      	<div class="form-row__afterInput"></div>
	 			    </div>

	 			</fieldset>

	 			<input type="hidden" value="3684168161508" name="toky_toky">
	 		    <?php wp_nonce_field( 'fluxi_contact_form', 'fluxi_contact_form_nonce_field' ); ?>

	 		    <div class="form-notify js-notify"></div>

	 			<div class="form-submit">
	 		    	<button type="submit" id="submit-contact" class="c-button c-button--cta c-button--2icon"><i class="fa fa-paper-plane c-button__icon" aria-hidden="true"></i> <i class="fa fa-cog fa-spin c-button__icon" aria-hidden="true"></i>Envoyer</button>
	 		    </div>

	 		</form>
	 </div>

	<?php

    	endwhile;

  	else:

      	include_once( get_template_directory() . '/page-templates-parts/content-none.php' );

  	endif;

?>

<?php get_footer(); ?>
