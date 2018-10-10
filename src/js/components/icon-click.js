function iconClick() {

	$('.task-list-item-icon-wrapper').on('click', function() {

		// Mark tasks complete
		if ( !$(this).parents('.task-list-item').hasClass('complete') && $(this).hasClass('check') ) {

			// Cache this keyword
			let _this = $(this);

			// Payload sent with POST call
			let data = {
				'task_id': $(this).data('task-id')
			};

			// Post call to PHP file to Curl tasks complete
			$.post({
				url: '../../inc/task_complete.php',
				data
			});

			// Add complete class to update icon styles
			$(this).parents('.task-list-item').addClass('complete');
			$(this).find('.tooltip').html('<p>Item Complete</p>');
		}

		// Remove tasks
		if ( $(this).hasClass('dash') ) {

			$(this).parents('.task-list-item').remove();

		}

	});
}

export default iconClick;

