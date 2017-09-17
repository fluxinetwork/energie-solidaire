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

	<section class="l-col l-col--content l-col--narrow l-innerRythm">	

		<form action="" method="POST" id="don-ponctuel" role="form">

			<fieldset class="c-lightCell c-lightCell--trsp">
				<span class="c-lightCell__title">
					<legend class="c-tiltedTitle">Montant du don</legend>
				</span>
				<div class="form-sentence form-row">
					<h1 class="form-sentence__txt">Je souhaite donner</h1>
					<input class="form-sentence__input js-montant" type="text" name="amount" id="amount" pattern="([0-99999])" maxlength="5" data-validation="required">
					<span class="form-sentence__txt">€</span>
				</div>
			</fieldset>

			<fieldset class="c-lightCell c-lightCell--trsp">
				<span class="c-lightCell__title">
					<legend class="c-tiltedTitle">Contact et facturation</legend>
				</span>

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
						<input class="form-row__input" type="text" maxlength="15" name="telephone" id="telephone" data-validation="required">
						<div class="form-row__afterInput"></div>
					</div>

					<div class="form-row">
						<label for="email" class="form-row__label">Email<span class="i-required">•</span></label>
						<input class="form-row__input" type="email" name="email" data-validation="required">
						<div class="form-row__afterInput"></div>
					</div>
				</div>
			</fieldset>

			<fieldset class="c-lightCell c-lightCell--trsp">
				<span class="c-lightCell__title">
					<legend class="c-tiltedTitle"><i class="fa fa-lock c-tiltedTitle__icon"></i>Vos informations de paiement</legend>
				</span>
				
				<div class="form-row">
					<div class="creditCard">
						<div class="creditCard-row">
							<label class="creditCard-label">Numéro de carte<span class="i-required">•</span></label>
							<input class="js-number-stripe" type="hidden" data-stripe="number" data-validation="required">
							<div class="creditCard-number">
								<input class="creditCard-input js-input js-input-number" type="text" pattern="([0-9]|[0-9]|[0-9]|[0-9])" maxlength="4">
								<input class="creditCard-input js-input js-input-number" type="text" pattern="([0-9]|[0-9]|[0-9]|[0-9])" maxlength="4">
								<input class="creditCard-input js-input js-input-number" type="text" pattern="([0-9]|[0-9]|[0-9]|[0-9])" maxlength="4">
								<input class="creditCard-input js-input js-input-number" type="text" pattern="([0-9]|[0-9]|[0-9]|[0-9])" maxlength="4">
							</div>
						</div>

						<div class="creditCard-row creditCard-row--flex">

							<div class="creditCard-expiration">
								<label class="creditCard-label">Date d'expiration<span class="i-required">•</span></label>

								<div class="creditCard-expiration__select">
									<div class="creditCard-select js-open-list" data-list="month">
										<div class="creditCard-input js-month">Mois</div> 
										<i class="fa fa-angle-down"></i>
										<input class="js-month-stripe" type="hidden" maxlength="2" size="2" data-stripe="exp_month" data-validation="required">
									</div>

									<div class="creditCard-select js-open-list" data-list="year">
										<div class="creditCard-input js-year">Année</div> 
										<i class="fa fa-angle-down"></i>
										<input class="js-year-stripe" type="hidden" maxlength="2" size="2" data-stripe="exp_year" data-validation="required">
									</div>
								</div>
							</div>

							<div class="creditCard-security">
								<label class="creditCard-label">Code sécurité<span class="i-required">•</span></label>
								<input class="creditCard-input js-input" type="text" maxlength="3" pattern="([0-9]|[0-9]|[0-9])" data-stripe="number" data-validation="required">
							</div>
						</div>
						
						<div class="creditCard-list js-month-list" data-list="month">
							<div class="creditCard-list__item js-list-item" data-value="01">Janvier</div>
							<div class="creditCard-list__item js-list-item" data-value="02">Février</div>
							<div class="creditCard-list__item js-list-item" data-value="03">Mars</div>
							<div class="creditCard-list__item js-list-item" data-value="04">Avril</div>
							<div class="creditCard-list__item js-list-item" data-value="05">Mai</div>
							<div class="creditCard-list__item js-list-item" data-value="06">Juin</div>
							<div class="creditCard-list__item js-list-item" data-value="07">Juillet</div>
							<div class="creditCard-list__item js-list-item" data-value="08">Août</div>
							<div class="creditCard-list__item js-list-item" data-value="09">Septembre</div>
							<div class="creditCard-list__item js-list-item" data-value="10">Octobre</div>
							<div class="creditCard-list__item js-list-item" data-value="11">Novembre</div>
							<div class="creditCard-list__item js-list-item" data-value="12">Décembre</div>
						</div>

						<div class="creditCard-list js-year-list" data-list="year">
							<?php $year = date('y'); ?>
							<div class="creditCard-list__item js-list-item" data-value="<?php echo $year; ?>">2017</div>
							<div class="creditCard-list__item js-list-item" data-value="<?php echo $year+1; ?>">2018</div>
							<div class="creditCard-list__item js-list-item" data-value="<?php echo $year+2; ?>">2019</div>
						</div>
					</div>
				</div>

				<p class="form-infos">Paiement sécurisé via <a href="https://stripe.com/fr">Stripe</a></p>
				
				<div class="is-none">
					<div class="form-row form-row--flex">
						<div class="form-row">
							<label class="form-row__label">Numéro de carte<span class="i-required">•</span></label>
							<input class="form-row__input" type="number" maxlength="16" size="18" data-stripe="number" data-validation="required">
							<div class="form-row__afterInput"></div>
						</div>

						<div class="form-row form-row--asy">
							<label class="form-row__label">Cryptogramme<span class="i-required">•</span></label>
							<input class="form-row__input" type="number" maxlength="3" size="4" data-stripe="cvc" data-validation="required">
							<div class="form-row__afterInput"></div>
						</div>
					</div>

					<div class="form-row form-row--flex">
						<div class="form-row">
							<label class="form-row__label">Mois d'expiration (MM)<span class="i-required">•</span></label>
							<input class="form-row__input" type="number" maxlength="2" size="2" data-stripe="exp_month" data-validation="required">
							<div class="form-row__afterInput"></div>
						</div>

						<div class="form-row">
							<label class="form-row__label">Année d'expiration (YY)<span class="i-required">•</span></label>
							<input class="form-row__input" type="number" maxlength="2" size="2" data-stripe="exp_year" data-validation="required">
							<div class="form-row__afterInput"></div>
						</div>
					</div>
				</div>
		  	</fieldset>

		    <input type="hidden" value="698413581217" name="toky_toky">
		    <?php wp_nonce_field( 'fluxi_manage_paiement', 'fluxi_manage_paiement_nonce_field' ); ?>

			<div class="form-notify js-notify"></div>

		  	<div class="form-submit">
		  		<button type="submit" class="c-button c-button--cta js-amount">Faire un don</button>
		  	</div>
		</form>

	</section>

<?php get_footer(); ?>

