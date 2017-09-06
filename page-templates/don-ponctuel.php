<?php
/*
Template Name: Don ponctuel
*/
?>
<?php get_header(); ?>

<?php $amount = 0; ?>

	<section class="landing landing--paiement">	

		<div class="c-form c-form--large c-card">
			<header class="c-card__header">
				<a class="landing--paiement__logo" href="<?php echo home_url();?>"><img width="144" height="150" alt="Energie Solidaire" src="<?php echo THEME_DIR_PATH.'/app/img/landing/svg/logo.svg'; ?>"></a>
				<h1 class="c-card__header__title">Faire un don</h1>
			</header>

			<form action="" method="POST" id="don-ponctuel" role="form" class="c-card__body">

				<fieldset class="c-form__fieldset">
					<legend class="c-form__legend">Montant du don</legend>
					<div class="c-form__fieldset__row">
						<label for="amount" class="c-form__label">Montant en euro <span class="i-required">•</span></label>
				      	<input class="c-form__input" type="text" name="amount" id="amount" data-validation="required">
					</div>
				</fieldset>

				<fieldset class="c-form__fieldset">
					<legend class="c-form__legend">Contact et facturation</legend>

					<div class="c-form__fieldset__row">
						<label for="name" class="c-form__label">Nom / Raison social<span class="i-required">•</span></label>
				      	<input class="c-form__input" type="text" name="name" id="name" data-validation="required">
					</div>

					<div class="c-form__fieldset__row">
						<label for="adresse" class="c-form__label">Adresse<span class="i-required">•</span></label>
				    	<input class="c-form__input" type="text" name="adresse" id="adresse" data-validation="required">
				    </div>

					<div class="c-form__fieldset__row">
						<label for="complement_adresse" class="c-form__label">Complément d'adresse</label>
				    	<input class="c-form__input" type="text" name="complement_adresse" id="complement_adresse">
				    </div>

				    <div class="c-form__fieldset__row">
						<label for="code_postal" class="c-form__label">Code postal<span class="i-required">•</span></label>
				    	<input class="c-form__input" type="text" name="code_postal" id="code_postal" maxlength="5" data-validation="number">
				    </div>

				    <div class="c-form__fieldset__row">
						<label for="ville" class="c-form__label">Ville<span class="i-required">•</span></label>
				    	<input class="c-form__input" type="text" name="ville" id="ville" data-validation="required">
				    </div>

				    <div class="c-form__fieldset__row">
						<label for="email" class="c-form__label">Email de contact<span class="i-required">•</span></label>
					    <input class="c-form__input" type="email" name="email" data-validation="required">
					</div>

				    <div class="c-form__fieldset__row">
						<label for="telephone" class="c-form__label">Téléphone de contact<span class="i-required">•</span></label>
					    <input class="c-form__input" type="text" maxlength="15" name="telephone" id="telephone" data-validation="required">
				    </div>

				</fieldset>

				<fieldset class="c-form__fieldset">
					<legend class="c-form__legend">Vos informations de paiement</legend>

					<p class="c-form--indicateur">Vos informations de paiement ne sont pas conservées sur notre site.</p>
					<a href="https://stripe.com/fr" traget="_blank" class="c-link c-link--shy">Informations sur la plateforme de paiement</a>

					<div class="c-form__fieldset__flexrow c-form__fieldset__flexrow--asy2">
						<div class="c-form__fieldset__row">
							<label class="c-form__label">Numéro de carte<span class="i-required">•</span></label>
						    <input class="c-form__input" type="text" maxlength="16" size="18" data-stripe="number" data-validation="required">
						</div>

						<div class="c-form__fieldset__row">
							<label class="c-form__label">Cryptogramme<span class="i-required">•</span></label>
						    <input class="c-form__input" type="text" maxlength="3" size="4" data-stripe="cvc" data-validation="required">
						</div>
					</div>

					<div class="c-form__fieldset__flexrow">
						<div class="c-form__fieldset__row">
							<label class="c-form__label">Mois d'expiration (MM)<span class="i-required">•</span></label>
						    <input class="c-form__input" type="text" maxlength="2" size="2" data-stripe="exp_month" data-validation="required">
						</div>

						<div class="c-form__fieldset__row">
							<label class="c-form__label">Année d'expiration (YY)<span class="i-required">•</span></label>
						  	<input class="c-form__input" type="text" maxlength="2" size="2" data-stripe="exp_year" data-validation="required">
						</div>
					</div>
			  	</fieldset>

			    <input type="hidden" value="698413581217" name="toky_toky">
			    <?php wp_nonce_field( 'fluxi_manage_paiement', 'fluxi_manage_paiement_nonce_field' ); ?>

				<div class="c-form__notify js-notify"></div>

			  	<div class="c-form__submit">
			  		<button type="submit" class="c-btn js-amount">Faire un don</button>
			  	</div>
			</form>

		</div>

		<?php //get_template_part( 'page-templates-parts/base/footer-landing'); ?>

		<?php get_template_part( 'page-templates-parts/base/warning-flexbox'); ?>

	</section>

<?php get_footer(); ?>

