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
            $(".fitvids").fitVids();

            // Warning flexbox
            if ($('html').hasClass('detect_no-flexbox')) {
                $('.warning-flexbox').addClass('show-me');
            }

            // Form contact
            initFormContact();
        }
    },    
    home: {
        init: function() {
            isHome = true; 
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

$(document).ready(UTIL.loadEvents);





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
    windowW = $(window).width();
}
// Get height
function calc_windowH() {
    windowH = $(window).height();
}


/*
MAIN RESIZE EVENT
--
Activated by variable in config.js
*/

function resize_handler() {

}
if ( resizeEvent ) { $( window ).bind( "resize", resize_handler() ); }

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
if ( resizeDebouncer ) { $( window ).bind( "resize", debouncer(debouncer_handler) ); }





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
/*======================================================================*\
==========================================================================

                            JS MODULE FLUXI

==========================================================================
\*======================================================================*/

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