<?php
/*
Template Name: Don ponctuel
*/
?>
<?php get_header(); ?>

<?php $amount = 0; ?>
	
<header class="projet-header l-largeCell is-none">
	<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
	<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>

	<hgroup class="projet-header__hgroup">
		<h1 class="projet-title"><?php echo get_the_title(); ?></h1>
	</hgroup>
</header>

<section class="l-col l-col--content l-innerRythm form">

	<form action="" method="POST" id="don-ponctuel" role="form">

		<fieldset class="form-fieldset is-first js-first-fieldset transition">
			<div class="form-sentence form-row">
				<h1 class="form-sentence__txt">Je souhaite donner</h1>
				<input class="form-sentence__input js-montant js-firstInput" type="number" name="amount" id="amount" min= "1" max="99999" maxlength="5" data-validation="required">
				<span class="form-sentence__txt">€</span>
			</div>
		</fieldset>

		<div class="form-fieldset js-form-hide">

			<fieldset class="form-fieldset">
				<legend class="c-tiltedTitle">Contact et facturation</legend>

				<div class="form-row">
					<label for="name" class="form-row__label">Nom / Raison social<span class="i-required">•</span></label>
			    	<input class="form-row__input" type="text" name="name" id="name" data-validation="required">
			    	<div class="form-row__afterInput"></div>
			    </div>

				<div class="form-row">
					<label for="adresse" class="form-row__label">Adresse<span class="i-required">•</span></label>
			  		<input class="form-row__input" type="text" name="adresse" id="adresse" data-validation="required">
			  		<div class="form-row__afterInput"></div>
			  	</div>

				<div class="form-row">
					<label for="complement_adresse" class="form-row__label">Complément d'adresse</label>
			  		<input class="form-row__input" type="text" name="complement_adresse" id="complement_adresse">
			  		<div class="form-row__afterInput"></div>
			  	</div>
				
				<div class="form-row form-row--flex">
					<div class="form-row form-row--asy">
						<label for="code_postal" class="form-row__label">Code postal<span class="i-required">•</span></label>
				  		<input class="form-row__input" type="number" name="code_postal" id="code_postal" maxlength="5" data-validation="number">
				  		<div class="form-row__afterInput"></div>
				  	</div>
			
					<div class="form-row">
						<label for="ville" class="form-row__label">Ville<span class="i-required">•</span></label>
				  		<input class="form-row__input" type="text" name="ville" id="ville" data-validation="required">
				  		<div class="form-row__afterInput"></div>
				  	</div>
			  	</div>

				<div class="form-row form-row--flex">
					<div class="form-row form-row--asy">
						<label for="telephone" class="form-row__label">Téléphone<span class="i-required">•</span></label>
						<input class="form-row__input" type="number" maxlength="10" name="telephone" id="telephone" data-validation="number">
						<div class="form-row__afterInput"></div>
					</div>

					<div class="form-row">
						<label for="email" class="form-row__label">Email<span class="i-required">•</span></label>
						<input class="form-row__input js-auto-validate" type="email" name="email" data-validation="required">
						<div class="form-row__afterInput"></div>
					</div>
				</div>
			</fieldset>

			<fieldset class="form-fieldset">
				<legend class="c-tiltedTitle"><i class="fa fa-lock c-tiltedTitle__icon"></i>Vos informations de paiement</legend>
				
				<?php

				if ( $isMobile ) {

					require_once( get_template_directory() . '/page-templates-parts/form/stripe-basic-form.php' );

				} else {

					require_once( get_template_directory() . '/page-templates-parts/form/stripe-credit-card-form.php' );

				}

				?>
		  	</fieldset>

		    <input type="hidden" value="698413581217" name="toky_toky">
		    <?php wp_nonce_field( 'fluxi_manage_paiement', 'fluxi_manage_paiement_nonce_field' ); ?>

			<div class="form-notify js-notify"></div>

		  	<div class="form-submit">
		  		<button type="submit" class="c-button c-button--cta js-amount">Faire un don</button>
		  	</div>

	  	</div>
	</form>

</section>

<?php get_footer(); ?>

