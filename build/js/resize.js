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




