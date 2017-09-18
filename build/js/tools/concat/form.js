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

		if ( /\S/.test(value) ) { // not empty and not just whitespace

			var typeValidation = inputField.attr('type');

			if ( typeValidation == 'number' ) {

				( inputField.val().length == inputField.attr('maxlength') )  ? border_color('valid') : border_color('error');

			} else if ( typeValidation == 'email' ) {

				if ( value.indexOf('@') !== -1 )  { // has @

					var emailArray = value.split('@')

					if ( emailArray.length == 2 && emailArray[1].indexOf('.') !== -1 )  { // has . somewhere after @

						if ( emailArray[1].slice(-1) != '.' ) { // last character is not .

							var lastPiece = ( emailArray[1].split('.') ).pop();

							if ( lastPiece.length > 1 ) { // domain extension has more than 1 character

								( lastPiece.indexOf('xn--') == -1 ) ? border_color('valid') : border_color('error'); // has unicode encoded character

							} else {

								border_color('error');

							}

						} else {

							border_color('error');

						}

					} else {

						border_color('error');

					}

				} else {

					border_color('error');

					console.log('no @');

				}

			} else {

				( inputField.val().length > 5 ) ? border_color('valid') : border_color('error');

			}

		} else {

			border_color('error');

		}

	});

}

function border_color(color) {

	if ( color == 'valid' ) {

		inputField.addClass('is-valid').removeClass('has-error');

	} else {

		inputField.addClass('has-error').removeClass('is-valid');

	}

} 