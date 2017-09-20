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
            

            // Init form
            if (  jQuery('.js-dotSlider').length  ) {  //#temp
                dot_slider();
            }
            
        }
    },    
    home: {
        init: function() {
            isHome = true; 
            //dot_slider();
        }
    },
    single_projets: {
        init: function() {
            //dot_slider();
        }
    },
    form_don: {
        init: function() {
            jQuery('.js-montant').focus();
            //form_first_step();
            input_auto_validate();
            input_number_auto_blur();
            input_number_limit();
            credit_card();
        }
    },
    form_contact: {
        init: function() {
            init_form_contact();
            input_auto_validate();
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




