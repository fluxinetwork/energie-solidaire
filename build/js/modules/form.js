var inputField;

function input_number_limit() {

	jQuery('input[type="number').on('keyup', function() {

		inputField = jQuery(this);
		var value = inputField.val();
		var max = inputField.data('length');

		if (  value.length > max ) {

			inputField.val( value.substring(0, max) );
			notify('Ce champ ne doit pas contenir plus de '+max+' caractères ', 'error');

		}

	});

}

function input_number_auto_blur() {

	jQuery('input[type="number').on('keyup', function(e) {

		var authorisedKeyArray = [37, 38, 39, 40];

		if ( authorisedKeyArray.indexOf( e.keyCode ) == -1 ) {

			inputField = jQuery(this);

			if ( inputField.val().length == inputField.data('length') ) {

				if ( inputField.next().is('input') ) {

					inputField.blur().next().focus();

				} else {

					inputField.blur().parent().next('.form-row').find('input').focus();

				}

			}

		} 

	});

}

function input_auto_validate() {

	jQuery('[required]').on('blur', function() {

		inputField = jQuery(this);
		var value = inputField.val();
		var ignoreClass = 'js-firstInput';

		if ( !inputField.hasClass(ignoreClass) ) {

			if ( /\S/.test(value) ) { // not empty and not just whitespace

				var typeValidation = inputField.attr('type');

				if ( typeValidation == 'number' ) {

					var max = inputField.data('length')

					if ( value.length ==  max )  {

						input_class('valid');

					} else {

						input_class('error');
						notify('Ce champ doit contenir '+max+' caractères ', 'error');

					}
				} else if ( typeValidation == 'email' ) {

					if ( value.indexOf('@') !== -1 )  { // has @

						var forbiddenCharArray = '#&/\\<>!?"\',;:%€()[]'.split('');

						for ( var i = 0; i < forbiddenCharArray.length; i++ ) {

							if ( value.indexOf( forbiddenCharArray[i] ) != -1 ) { 

								input_class('error');
								notify('Votre email ne doit pas contenir de caractères spéciaux', 'error');
								break;
								
							} else if ( i == forbiddenCharArray.length-1 ) { // pas de caracteres speciaux

								var emailArray = value.split('@')

								if ( emailArray.length == 2 && emailArray[1].indexOf('.') !== -1 )  { // has . somewhere after @

									if ( emailArray[1].slice(-1) != '.' ) { // last character is not .

										var lastPiece = ( emailArray[1].split('.') ).pop();

										if ( lastPiece.length > 1 ) { // domain extension has more than 1 character

											if ( lastPiece.indexOf('xn--') == -1 ) { // has no unicode encoded character

												input_class('valid');

											} else {

												input_class('error');
												notify('Votre email ne doit pas contenir de caractères accentués', 'error');
											}

										} else {

											input_class('error');
											notify('Un email valide doit contenir le symbole <i class="fa fa-at"></i>', 'error');

										}

									} else {

										input_class('error');
										notify('Votre email ne doit pas finir par un point', 'error');

									}

								} else { 

									input_class('error');
									notify('La fin de votre email ne semble pas valide', 'error');

								}

							}

						}

					} else { // Pas d'@

						input_class('error');
						notify('Votre email doit contenir le symbole <i class="fa fa-at"></i>', 'error');

					}

				} else {

					input_class('valid');

				}


			} else { // Champ vide

				input_class('error');
				var label = $.parseHTML( inputField.prev('label').html() )[0].data;
				notify('Le champ "'+label+'" est obligatoire', 'error');

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