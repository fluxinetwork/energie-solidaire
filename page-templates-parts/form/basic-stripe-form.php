<div class="form-row form-row--flex">
	<div class="form-row">
		<label class="form-row__label">Numéro de carte<span class="i-required">•</span></label>
		<input class="form-row__input" type="number" maxlength="16" data-stripe="number">
		<div class="form-row__afterInput"></div>
	</div>

	<div class="form-row form-row--asy">
		<label class="form-row__label">Cryptogramme<span class="i-required">•</span></label>
		<input class="form-row__input" type="number" maxlength="3" data-stripe="cvc">
		<div class="form-row__afterInput"></div>
	</div>
</div>

<div class="form-row form-row--flex">
	<div class="form-row">
		<label class="form-row__label">Mois d'expiration (MM)<span class="i-required">•</span></label>
		<input class="form-row__input" type="number" maxlength="2" data-stripe="exp_month">
		<div class="form-row__afterInput"></div>
	</div>

	<div class="form-row">
		<label class="form-row__label">Année d'expiration (YY)<span class="i-required">•</span></label>
		<input class="form-row__input" type="number" maxlength="2" data-stripe="exp_year">
		<div class="form-row__afterInput"></div>
	</div>
</div>