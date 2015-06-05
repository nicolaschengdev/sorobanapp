/*
	Tessellate by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 1000px)',
		mobile: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			interval = 5000,
			index = 0,
			loop = undefined;

		// Disable animations/transitions until the page has loaded.
		$body.addClass('is-loading');

		$window.on('load', function() {
			$body.removeClass('is-loading');
		});

		// Fix: Placeholder polyfill.
		$('form').placeholder();

		// CSS polyfills (IE<9).
		if (skel.vars.IEVersion < 9)
			$(':last-child').addClass('last-child');

		// Scrolly links.
		$('.scrolly').scrolly();

		// Prioritize "important" elements on narrow.
		skel.on('+narrow -narrow', function() {
			$.prioritize(
				'.important\\28 narrow\\29',
				skel.breakpoint('narrow').active
			);
		});

		// Carousel
		loop = setInterval(
			function(){ 
				var oldIndex = index;

				index++;
				if (index >= 2) {
					index = 0;
				}

				var item = $('.screenshot-' + index);
				item.prependTo(item.parent()).css({ opacity:1 });

				item = $('.screenshot-' + oldIndex);
				item.fadeTo(1000, 0);
			}, 
			interval
		);

		// email

		/*
		$('.btn_precommand').on('click', function(e) {
			_gaq.push(['_trackEvent', 'Precommand', 'See', label]);
		});
		*/

		/*
		$('#emailForm').submit(function( event ) {
			var email = $('#emailForm input[type=email]').val();
			var isEmail = validator.isEmail(email);

			if (isEmail) {
				_gaq.push(['_trackEvent', 'Precommand', 'Subscribe', label]);
			} else {
				event.preventDefault();
			}
		});
		*/

		if (window.sorobanapp.email_was_posted == true) {
			if (window.sorobanapp.error_message.length > 0) {
				swal("Oups...", window.sorobanapp.error_message, "error");
			} else {
				swal("Merci!", "Votre addresse email a été enregistré avec succès.", "success")
			}
		}


		// typeform
	});

})(jQuery);