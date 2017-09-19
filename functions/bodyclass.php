<?php 
/*
BODY CLASSES
--
Add custom body class
*/


global $isMobile;
$isMobile = false;


// ADD BODY CLASSES

function custom_bodyclass( $classes ) {

	// BASIC TOUCH DETECT

	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

	if ( $iphone == true || $ipad == true || $android == true || $windowsphone == true ) { 

		$classes[] = 'touch';
		$isMobile = true;

	} else {

		$classes[] = 'no-touch';

	}

	if ( $iphone == true || $ipad == true ) { 

		$classes[] = 'ios';

	}


	// FILTERS

	if ( is_page_template( 'page-templates/don-ponctuel.php' ) ) {

		$classes[] = 'form-don bg-wormz';

	}

	if ( is_page_template( 'page-templates/page-contact.php' ) ) {

		$classes[] = 'form-contact';

	}


	// RETURN

    return $classes;
}

add_filter( 'body_class','custom_bodyclass' );
