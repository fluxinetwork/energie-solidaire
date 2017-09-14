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