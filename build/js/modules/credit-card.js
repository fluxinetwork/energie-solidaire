function credit_card() {

	jQuery('.js-open-list').on('click', function() {

		if ( jQuery(this).data('list') == "month" ) {

			var list = jQuery('.js-list[data-list="month"]');

		} else {

			var list = jQuery('.js-list[data-list="year"]');

		}

		list.toggleClass('is-open');

	});

	jQuery('.js-list-item').on('click', function() {

		var itemContent = jQuery(this).html();

		if ( jQuery(this).parent().data('list') == "month" ) {

			jQuery('.js-month').html(itemContent).addClass('is-valid');
			var list = jQuery('.js-list[data-list="month"]');
			jQuery('.js-month-stripe').val( jQuery(this).data('value') );

			if ( jQuery('.js-year-stripe').val().length != 2 ) {

				jQuery('.js-list[data-list="year"]').toggleClass('is-open');

			}

		} else {

			jQuery('.js-year').html(itemContent).addClass('is-valid');
			var list = jQuery('.js-list[data-list="year"]');
			jQuery('.js-year-stripe').val( jQuery(this).data('value') );

			if ( jQuery('.js-cvv').val().length != 3 ) {

				jQuery('.js-cvv').focus();

			}

		}

		list.toggleClass('is-open');

			check_card();

	});

	jQuery('.js-input').on('keyup', function() {
		var input = jQuery(this);

		if ( input.val().length == input.attr('maxlength') ) {

			if ( input.hasClass('js-card-number') ) {

				input.next().focus();

			} else {

				input.blur();

			}

			jQuery(this).removeClass('has-error').addClass('is-valid');

			check_card();

		} else {

			jQuery(this).addClass('has-error').removeClass('is-valid');

		}
	});

	jQuery('.js-card-number').on('blur', function() {
		var fullNumber = '';

		jQuery('.js-card-number').each(function() {

			fullNumber += jQuery(this).val();

		});

		jQuery('.js-number-stripe').val(fullNumber);
	});

}

function check_card() {

	var nbValid = 0;

	jQuery('.js-check').each(function() {

		if ( jQuery(this).val().length == jQuery(this).attr('maxlength') ) {

			nbValid++;

		}

	});

	if ( nbValid == jQuery('.js-check').length ) {

		jQuery('.js-card-ok').addClass('is-open');

		setTimeout(function() {

			jQuery('.js-card-ok').removeClass('is-open');	

		}, 1000);

		jQuery('.creditCard-input.valid').removeClass('is-valid');

		return true;

	}

}