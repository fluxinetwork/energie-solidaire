var inputField;

function input_number_auto_blur() {

	jQuery('input[type="number').on('keyup', function() {

		inputField = jQuery(this);

		if ( inputField.val().length == inputField.attr('maxlength') ) {

			inputField.blur().parent().next().find('input').focus();

		}

	});

}

function input_auto_validate() {

	jQuery('input[data-validation]').on('blur', function() {

		inputField = jQuery(this);
		var value = inputField.val();
		var ignoreClass = 'js-firstInput';

		if ( !inputField.hasClass(ignoreClass) ) {

			if ( /\S/.test(value) ) { // not empty and not just whitespace

				var typeValidation = inputField.attr('type');

				if ( typeValidation == 'number' ) {

					( inputField.val().length == inputField.attr('maxlength') )  ? input_class('valid') : input_class('error');

				} else if ( typeValidation == 'email' ) {

					if ( value.indexOf('@') !== -1 )  { // has @

						var emailArray = value.split('@')

						if ( emailArray.length == 2 && emailArray[1].indexOf('.') !== -1 )  { // has . somewhere after @

							if ( emailArray[1].slice(-1) != '.' ) { // last character is not .

								var lastPiece = ( emailArray[1].split('.') ).pop();

								if ( lastPiece.length > 1 ) { // domain extension has more than 1 character

									( lastPiece.indexOf('xn--') == -1 ) ? input_class('valid') : input_class('error'); // has unicode encoded character

								} else {

									input_class('error');

								}

							} else {

								input_class('error');

							}

						} else {

							input_class('error');

						}

					} else {

						input_class('error');

						console.log('no @');

					}

				} else {

					( inputField.val().length > 5 ) ? input_class('valid') : input_class('error');

				}

			} else {

				console.log('putain');
				input_class('error');

			}

		}

	});

}

function form_first_step() {

	jQuery('.js-form-hide').hide();

	jQuery('.js-firstInput').on('keyup', function(e) {

		if ( e.keyCode != 16 ) {

			jQuery('.js-firstInput').trigger('change');

		}

	});

	var isOpen = false;
	var timer;

	jQuery('.js-firstInput').on('change', function() {

		inputField = jQuery(this);
		clearTimeout(timer);

		if ( inputField.val() < 1 ||  inputField.val() == '' ) {

			if ( isOpen ) {
				
				jQuery('.js-form-hide').slideUp('fast');
				isOpen = false;
				input_class('error');
				//jQuery('.js-montant').focus();

				timer = setTimeout(function() {

					jQuery('.js-first-fieldset').addClass('is-first');

				}, 250);

			}

		} else {

			if ( !isOpen ) {

				jQuery('.js-first-fieldset').removeClass('is-first');

				timer = setTimeout(function() {

					jQuery('.js-form-hide').slideDown('fast');
					isOpen = true;
					input_class('valid');

				}, 200);

			}
			
		}

	});

}

function input_class(color) {

	if ( color == 'valid' ) {

		inputField.addClass('is-valid').removeClass('has-error');

	} else {

		inputField.addClass('has-error').removeClass('is-valid');

	}

} 