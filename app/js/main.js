/*======================================================================*\
==========================================================================

                                 JS CONFIG

==========================================================================
\*======================================================================*/

var siteURL = '';
var isHome = false;

// Activate resize events
var resizeEvent = false;
var resizeDebouncer = true;

// Store window sizes
var windowH; 
var windowW; 
calc_window();

// Breakpoint
var bpSmall;
var bpMedium;
var bpLarge;
var bpXlarge;




/*======================================================================*\
==========================================================================

                                 JS LOAD

==========================================================================
\*======================================================================*/


$(window).load(function() {
	// Manage label animation
	 //$('.form__row .js-input-effect').val('');
	
});


/*======================================================================*\
==========================================================================

                                 JS READY

==========================================================================
\*======================================================================*/

var FOO = {
    common: {
        init: function() {
            // Fitvids
            jQuery(".js-fitVids").fitVids({
                customSelector: 'iframe[src*="dailymotion.com"]'
            });

            // Warning flexbox
            if (jQuery('html').hasClass('detect_no-flexbox')) {
                jQuery('.warning-flexbox').addClass('show-me');
            }

            // Form contact
            initFormContact();
        }
    },    
    home: {
        init: function() {
            isHome = true; 
            dot_slider();
        }
    },
    single_projets: {
        init: function() {
            dot_slider();
        }
    },
    don: {
        init: function() {
            jQuery('.js-montant').focus();
            form_first_step();
            input_auto_validate();
            input_number_auto_blur();
            credit_card();
        }
    }
    
};

var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = FOO;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
          namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire('common');
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
          UTIL.fire(classnm);
        });
    }
};

jQuery(document).ready(UTIL.loadEvents);





/*======================================================================*\
==========================================================================

                                 JS RESIZE

==========================================================================
\*======================================================================*/

/*
Get window sizes
--
Store results in windowW and windowH vars
*/

// Get width and height
function calc_window() {
    calc_windowW();
    calc_windowH();
}
// Get width
function calc_windowW() {
    windowW = jQuery(window).width();
}
// Get height
function calc_windowH() {
    windowH = jQuery(window).height();
}


/*
MAIN RESIZE EVENT
--
Activated by variable in config.js
*/

function resize_handler() {

}
if ( resizeEvent ) { jQuery( window ).bind( "resize", resize_handler() ); }

/*
DEBOUNCER
--
Fire event when stop resizing
Activated by variable in config.js
*/

function debouncer( func , timeout ) {
    var timeoutID;
    var timeoutVAR;

    if (timeout) {
        timeoutVAR = timeout;
    } else {
        timeoutVAR = 200;
    }

    return function() {
        var scope = this , args = arguments;
        clearTimeout( timeoutID );
        timeoutID = setTimeout( function () {
            func.apply( scope , Array.prototype.slice.call( args ) );
        }, timeoutVAR );
    };

}

function debouncer_handler() {
    calc_window();
}
if ( resizeDebouncer ) { jQuery( window ).on( "resize", debouncer(debouncer_handler) ); }





/*======================================================================*\
==========================================================================

                              JS CONTACT

==========================================================================
\*======================================================================*/

function initFormContact() {

    var formID = '#form-contact';
    jQuery(formID+' button[type=submit]').prop('disabled', false);
    $formObj = jQuery(formID);
   
    var labelBtn = 'Envoyer';   

    $formObj.submit(function (e) {
        e.preventDefault();
        var params = $formObj.serialize(); 

         $formObj.find('button[type=submit]').html('Chargement...').prop('disabled', true);

        jQuery.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_contact_form&'+params,
            success: function(data){
                $formObj.find('button[type=submit]').html(labelBtn);

                if(data[0].validation == 'error'){
                    $formObj.find('button[type=submit]').prop('disabled', false);
                }

                $formObj.find('.js-notify').html('<span class="'+data[0].validation+'">'+data[0].message+'</span>');

            },
            error : function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                $formObj.find('button[type=submit]').prop('disabled', false).html(labelBtn);
            }

        });
        return false;
    });
}

/*======================================================================*\
==========================================================================

                              JS FLEX WARNING

==========================================================================
\*======================================================================*/

/*
Add an overlay for browsers which doesn't support flexbox with links to update them
Flexbox support detection use Modernizr : https://modernizr.com/download?flexbox&q=flex
*/


if (!Modernizr.flexbox) {
	var ieLink = 'http://windows.microsoft.com/fr-fr/internet-explorer/download-ie';
	var edgeLink = 'https://www.microsoft.com/fr-fr/windows/microsoft-edge';
	var ffLink = 'https://www.mozilla.org/fr/firefox/new/';
	var gcLink = 'https://www.google.com/chrome/browser/desktop/index.html'
	var cliqzLink = 'https://cliqz.com/fr/download';
	var operaLink = 'http://www.opera.com/fr/computer';

	var typo = 'font-family:Helvetica,Tahoma,Arial!important;';
	var h3Style = 'style="color:#F44336;margin-top:32px;background-color:#fff;display:inline-block;padding:8px 16px;border-radius:3px;'+typo+'"';
	var ulStyles = 'style="list-style:none;padding-left:16px;margin-top:24px;"';
	var liStyle = 'style="display:inline-block;margin-right:24px;"';
	var linkStyle = 'style="font-weight:700;color:#fff;text-decoration:none;display:inline-block;'+typo+'"';
	var buttonStyle = 'style="position:absolute;bottom:0;left:0;background-color:#000;padding:16px 80px 16px 80px;width:100%;color:#fff;text-align:left;'+typo+'"';
	var displayIcon = 'display:inline-block';

	var dom = '<div style="position:fixed;left:0;top:0;z-index:100000;width:100%;height:100%;background-color:#F44336;padding:64px;" class="flexwarning">';

	dom += '<h1 style="color:#fff;'+typo+'">Votre navigateur est obsolète,<br> la mise en page du site risque d\'être endommagée.</h1>';
	dom += '<h2 style="color:#fff;margin-top:40px;'+typo+'">Nous vous conseillons de le mettre à jour !</h2>';

	dom += '<h3 '+h3Style+'"><i class="fa fa-windows" style="margin-right:8px;'+displayIcon+'"></i><i class="fa fa-apple" style="margin-right:16px;'+displayIcon+'"></i>Navigateurs multi-plateformes</h3>';
	dom += '<ul '+ulStyles+'>';
	dom += '<li '+liStyle+'><a href="'+ffLink+'" '+linkStyle+'"><i class="fa fa-firefox" style="margin-right:8px;'+displayIcon+'"></i>Firefox</a></li>';
	dom += '<li '+liStyle+'><a href="'+gcLink+'" '+linkStyle+'"><i class="fa fa-chrome" style="margin-right:8px;'+displayIcon+'"></i>Chrome</a></li>';
	dom += '<li '+liStyle+'><a href="'+operaLink+'" '+linkStyle+'"><i class="fa fa-opera" style="margin-right:8px;'+displayIcon+'"></i>Opera</a></li>';
	dom += '</ul>';

	dom += '<h3 '+h3Style+'"><i class="fa fa-windows" style="margin-right:16px;'+displayIcon+'"></i>Navigateurs pour Windows</h3>';
	dom += '<ul '+ulStyles+'>';
	dom += '<li '+liStyle+'><a href="'+ieLink+'" '+linkStyle+'"><i class="fa fa-internet-explorer" style="margin-right:8px;'+displayIcon+'"></i>Internet Explorer</a></li>';
	dom += '<li '+liStyle+'><a href="'+edgeLink+'" '+linkStyle+'"><i class="fa fa-edge" style="margin-right:8px;'+displayIcon+'"></i>Edge pour Windows 10</a></li>';
	dom += '</ul>';

	dom += '<h3 '+h3Style+'">À découvrir</h3>';
	dom += '<ul '+ulStyles+'>';
	dom += '<li '+liStyle+'><a href="'+cliqzLink+'" '+linkStyle+'"><i class="fa fa-shield" style="margin-right:8px;'+displayIcon+'"></i>Cliqz, le navigateur qui respecte la vie privée</a></li>';
	dom += '</ul>';

	dom += '<button '+buttonStyle+' class="js-close-warning"><i class="fa fa-times-circle" style="color:#fff;margin-right:8px;'+displayIcon+'"></i>Fermer cet avertissement (on vous aura prévenu...)</button>';

	dom += '</div>';

	$('body').append(dom);

	if(!$('html').is('[class*="fa-events"]')) {
		$('.flexwarning .fa').css('display','none');
	}

	$('.js-close-warning').on('click', function(){
		$('.flexwarning').remove();
	})
}


/*======================================================================*\
==========================================================================

                              JS TOOL SCROLL TO

==========================================================================
\*======================================================================*/

$('.js-scroll-to').click(function(e){
	e.preventDefault();
	id = $($(this).attr('href'));
	scroll_to(id);
})

$('.js-scroll-top').click(function(e){
	scroll_to('top');
})

$('.js-scroll-bottom').click(function(e){
	scroll_to('bottom');
})

function scroll_to(position, duration, relative) {
	var coef;
	var top;
	var bottom;

	if (position === 'top') {
		position = 0;
		top = true;
	} else if (position === 'bottom') {
		position = $(document).height();
		bottom = true;
	} else {
		position = position.offset().top;
	}

	if (duration === 'fast') {
		coef = 0.1;
		duration = 200;
	} else if (duration === 'slow') {
		coef = 0.4;
		duration = 600;
	} else {
		coef = 0.25;
		duration= 400;
	}

	if (relative === true) {
		calc_windowH();
		if (top) {
			duration = $(document).scrollTop()*coef;
		} else if (bottom) {
			duration = ($(document).height()-$(document).scrollTop())*coef;
		}
	}

	$('html, body').animate({scrollTop: position}, duration);
}

/*======================================================================*\
==========================================================================

                             JS TOOL SHARE

==========================================================================
\*======================================================================*/

/*
SHARE BUTTONS 
--
Need data attributes on .js-share DOM element
data-network = facebook || twitter
data-url: url to sharer
Set var origin if network == twitter
*/

$('.js-share').on('click', function(e){
	e.preventDefault();

	var network = $(this).attr('data-network');
	var url = $(this).attr('data-url');
	var shareUrl;

	if (network == 'facebook') {
		shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Facebook");
	} if (network == 'twitter') {
		var origin = "Energie_SolidR";
		shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
            "&via=" + origin + "" +
            "&url=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Twitter");
	}
});

var popupCenter = function(url, title, width, height){
	var popupWidth = width || 640;
	var popupHeight = height || 320;
	var windowLeft = window.screenLeft || window.screenX;
	var windowTop = window.screenTop || window.screenY;
	var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	var windowHeight = window.innerHeight || document.documentElement.clientHeight;
	var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
	var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
	var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
	popup.focus();
	return true;
};


/*------------------------------*\

    #SUBSCRIBE

\*------------------------------*/

/**
 * Subscription form
 */	

function subscription(){

    $('.landing__subscribe').on('submit', 'form#subscribe', function(e){

        var params = $(this).serialize();

        $('.subscribe__input__button').html('<span class="spinner"></span>');

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_subscribe&'+params,
            success: function(data){
                if(data[0].validation == 'error'){
                     $('.landing__notify').html('<span class="error">'+data[0].message+'</span>');                       
                }else{                    
                    $('.landing__notify').html('<span class="success">'+data[0].message+'</span>'); 
                    $('.subscribe__input__button').prop('disabled', true);                      
                }
                $('.subscribe__input__button').html('Ok');
            },
            error : function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                $('.subscribe__input__button').html('Ok');
            }

        });
        return false;
    });

}
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
	})

	jQuery('.js-card-number').on('blur', function() {

		var fullNumber = '';

		jQuery('.js-card-number').each(function() {

			fullNumber += jQuery(this).val();

		})

		jQuery('.js-number-stripe').val(fullNumber);

	})

}

function check_card() {

	var nbValid = 0;

	jQuery('.js-check').each(function() {

		if ( jQuery(this).val().length == jQuery(this).attr('maxlength') ) {

			nbValid++;

		}

	})

	if ( nbValid == jQuery('.js-check').length ) {

		jQuery('.js-card-ok').addClass('is-open');

		setTimeout(function() {

			jQuery('.js-card-ok').removeClass('is-open');	

		}, 1000);

		jQuery('.creditCard-input.valid').removeClass('is-valid');

		return true;

	}

}
function dot_slider() {
	var slider = jQuery('.js-dotSlider');
	var slides = jQuery('.js-dotSlider-items');
	var nbItem = jQuery('.js-dotSlider-item').length;

	var index;
	var slideW;
	var slideOuterW;
	var slidesH;


	// INIT

	var controls = '<div class="l-dotSlider__controls">';
	for (var i = 0; i < nbItem; i++) {
		controls += '<div class="l-dotSlider__controls__dot js-dotSlider-dot"></div>';
	}
	controls += '</div>';
	slider.append(controls);

	resize_slider();

	jQuery('.js-dotSlider-item, .js-dotSlider-dot').on('click', function() {
		jQuery('.js-dotSlider .is-active').removeClass('is-active');
		index = jQuery(this).index();
		jQuery('.js-dotSlider-item').eq(index).addClass('is-active');
		jQuery('.js-dotSlider-dot').eq(index).addClass('is-active');
		move_items();
	});

	jQuery('.js-dotSlider-item').eq(0).click();


	// TOOLS

	function get_sizes() {
		slidesH = slides.outerHeight();
		slideW = jQuery('.js-dotSlider-item').width();
		slideOuterW = jQuery('.js-dotSlider-item').outerWidth(true);
	}

	function  move_items() {
		jQuery('.js-dotSlider-item').each(function() {
			jQuery(this).css('left', -index*slideOuterW);
		})
	}

	function resize_slider() {
		get_sizes();
		slider.css('paddingTop', slidesH);
		slides.css('marginLeft', -slideW/2);
		move_items();
	}

	jQuery( window ).on( "resize", debouncer(resize_slider)  );
}
/*======================================================================*\
==========================================================================

                            JS MODULE FLUXI

==========================================================================
\*======================================================================*/

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

	jQuery('.js-form-hide').slideToggle(0);

	var isOpen = false;

	jQuery('.js-firstInput').on('keyup', function(e) {

		if ( e.keyCode != 16 ) {

			jQuery('.js-firstInput').trigger('change');

		}

	});

	var timer;

	jQuery('.js-firstInput').on('change', function() {

		inputField = jQuery(this);

		clearTimeout(timer);

		if ( inputField.val() < 1 ||  inputField.val() == '' ) {

			( isOpen ) ? jQuery('.js-form-hide').slideToggle() : '';
			isOpen = false;
			input_class('error');
			
			timer = setTimeout(function() {

				jQuery('.js-first-fieldset').addClass('is-first');

			}, 250);

		} else {

			jQuery('.js-first-fieldset').removeClass('is-first');

			timer = setTimeout(function() {

				( !isOpen ) ? jQuery('.js-form-hide').slideToggle() : '';
				isOpen = true;
				input_class('valid');
	
			}, 250);
			
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
/*------------------------------*\

    #LANDING

\*------------------------------*/

function activeTheLights(){	

	var nb_amp = $('.landing .icon-ampoule').length;

	//console.log(nb_amp);

	var waypoints = $('.icon-ampoule').waypoint({
		handler: function(direction) {
	    	//console.log(direction);
	    	//console.log(this);
	    	//console.log(this.element.className + '');
	    	$(this.element).addClass('active');
	  	},
	  	offset: '50%'
	});

}
var breakpoint = 760;

jQuery('.js-toggle-menu').on('click', function() {
	jQuery(this).toggleClass('icon2');
	jQuery('.js-nav').toggleClass('is-open');

	if ( windowW >= breakpoint) {
		jQuery('.js-nav-secondary').toggleClass('is-open');
	} else {
		jQuery('body').toggleClass('has-no-scroll');
	}

})