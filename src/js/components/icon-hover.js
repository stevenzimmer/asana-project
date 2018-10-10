
function iconHover() {
	// Generate tooltips for icons on hover
	$('.task-list-item-icon-wrapper').hover( function() {

		let _this = $(this);

		function tooltipText(text) {

			$(_this).find('.tooltip').addClass('show').html('<p>' + text + '</p>');

		}

		if ( !$(this).parents('.task-list-item').hasClass('complete') && $(this).hasClass('check') ) {

			tooltipText('Mark Item Complete');

		} else if ( $(this).hasClass('dash') ) {

			tooltipText('Remove Item');

		} else {

			tooltipText('Item Complete');

		}


	}, function() {

		$(this).find('.tooltip').removeClass('show');

	}).stop();
}

export default iconHover;
