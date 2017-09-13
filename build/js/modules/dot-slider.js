function dot_slider() {
	var slider = jQuery('.js-dotSlider');
	var slides = jQuery('.js-dotSlider-items');
	var nbItem = jQuery('.js-dotSlider-item').length;
	var slideW = jQuery('.js-dotSlider-item').width();
	var slideOuterW = jQuery('.js-dotSlider-item').outerWidth(true);
	resize_slider();

	var controls = '<div class="l-dotSlider__controls">';
	for (var i = 0; i < nbItem; i++) {
		controls += '<div class="l-dotSlider__controls__dot js-dotSlider-dot"></div>';
	}
	controls += '</div>';
	slider.append(controls);

	jQuery('.js-dotSlider-item, .js-dotSlider-dot').on('click', function() {
		jQuery('.js-dotSlider .is-active').removeClass('is-active');
		var index = jQuery(this).index();
		jQuery('.js-dotSlider-item').eq(index).addClass('is-active');
		jQuery('.js-dotSlider-dot').eq(index).addClass('is-active');

		jQuery('.js-dotSlider-item').each(function() {
			jQuery(this).css('left', -index*slideOuterW);
		})
	});

	jQuery('.js-dotSlider-item').eq(0).click();

	jQuery( window ).on( "resize", debouncer(resize_slider)  );

	function resize_slider() {
		var h = slides.outerHeight(true);
		slideW = jQuery('.js-dotSlider-item').width();
		slideOuterW = jQuery('.js-dotSlider-item').outerWidth(true);

		slider.css('paddingTop', h);
		slides.css('marginLeft', -slideW/2);
		jQuery('.js-dotSlider-item').each(function() {
			jQuery(this).css('left', 0);
		})
	}
}