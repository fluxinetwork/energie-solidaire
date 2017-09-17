function credit_card() {
	jQuery('.js-open-list').on('click', function() {
		if ( jQuery(this).data('list') == "month" ) {

			var list = jQuery('.js-month-list');

		} else {

			var list = jQuery('.js-year-list');

		}

		list.toggleClass('is-open');
	});

	jQuery('.js-list-item').on('click', function() {
		var itemContent = jQuery(this).html();

		if ( jQuery(this).parent().data('list') == "month" ) {

			jQuery('.js-month').html(itemContent);
			var list = jQuery('.js-month-list');
			var itemValue = jQuery(this).data('value');
			jQuery('.js-month-stripe').val(itemValue);

		} else {

			jQuery('.js-year').html(itemContent);
			var list = jQuery('.js-year-list');
			var itemValue = jQuery(this).data('value');
			jQuery('.js-year-stripe').val(itemValue);

		}

		list.toggleClass('is-open');
	});

	jQuery('.js-input').on('click', function() {
		jQuery(this).val('');
	})

	jQuery('.js-input-number').on('blur', function() {
		var fullNumber = '';
		jQuery('.js-input-number').each(function() {
			fullNumber += jQuery(this).val();
		})
		jQuery('.js-number-stripe').val(fullNumber);
	}).on('keyup', function() {
		if ( jQuery(this).val().length == 4 ) {
			jQuery(this).next().focus();
		}
	})
}