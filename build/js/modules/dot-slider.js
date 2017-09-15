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