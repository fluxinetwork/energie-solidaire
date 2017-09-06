/*======================================================================*\
==========================================================================

                              JS NOTIFY

==========================================================================
\*======================================================================*/

function notify(message) {
	$('.js-baseNotify-message').html(message);

	setTimeout(function(){
		$('.js-baseNotify').addClass('is-open');
		setTimeout(function() {
		    $('.js-baseNotify').removeClass('is-open');
		}, 10000);
	}, 1000);
}

$('.js-baseNotify-close').on('click', function(){
	 $('.js-baseNotify').removeClass('is-open');
})

