<div class="form-row">
	<div class="creditCard">
		<div class="creditCard-row">
			<label class="creditCard-label">Numéro de carte<span class="i-required">•</span></label>
			<input class="js-number-stripe js-check" type="number" data-stripe="number" min="1" max="9999999999999999" maxlength="16">
			<div class="creditCard-number">
				<input class="creditCard-input js-input js-card-number" type="number" max="9999" maxlength="4">
				<input class="creditCard-input js-input js-card-number" type="number" max="9999" maxlength="4">
				<input class="creditCard-input js-input js-card-number" type="number" max="9999" maxlength="4">
				<input class="creditCard-input js-input js-card-number" type="number" max="9999" maxlength="4">
			</div>
		</div>

		<div class="creditCard-row creditCard-row--flex">

			<div class="creditCard-expiration">
				<label class="creditCard-label">Date d'expiration<span class="i-required">•</span></label>

				<div class="creditCard-expiration__select">
					<div class="creditCard-select js-open-list" data-list="month">
						<div class="creditCard-input js-month">Mois</div> 
						<i class="fa fa-angle-down"></i>
						<input class="js-month-stripe js-check" type="hidden" maxlength="2" max="12" data-stripe="exp_month">
					</div>

					<div class="creditCard-select js-open-list" data-list="year">
						<div class="creditCard-input js-year">Année</div> 
						<i class="fa fa-angle-down"></i>
						<input class="js-year-stripe js-check" type="hidden" maxlength="2" max="<?php echo $year+2; ?>" data-stripe="exp_year">
					</div>
				</div>
			</div>

			<div class="creditCard-security">
				<label class="creditCard-label">Code sécurité<span class="i-required">•</span></label>
				<input class="creditCard-input js-cvv js-input js-check" type="number" maxlength="3" max="999" data-stripe="number">
			</div>
		</div>
		
		<div class="creditCard-list js-list" data-list="month">
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

		<div class="creditCard-list js-list" data-list="year">
			<?php $year = date('y'); ?>
			<div class="creditCard-list__item js-list-item" data-value="<?php echo $year; ?>">2017</div>
			<div class="creditCard-list__item js-list-item" data-value="<?php echo $year+1; ?>">2018</div>
			<div class="creditCard-list__item js-list-item" data-value="<?php echo $year+2; ?>">2019</div>
		</div>

		<div class="creditCard-ok js-card-ok">
			<i class="creditCard-ok__check fa fa-check"></i>
		</div>
	</div>
</div>