(function ($) {
	// Expressions indented

	console.log(gdprwp);
	var form;
	var formData;

	$(document).on('submit', '#gdpr-export-form', function (e) {
		e.preventDefault();

		form = $(this);

		formData = new FormData(this);
		console.log(formData);

		var type = form.attr('method');

		start_export(form, type);
	});

	var start_export = function (form, type) {
		console.log('started export');
		show_spinner();

		$.ajax({
			url: gdprwp.endpoints.getdata,
			method: type,
			processData: false,
			beforeSend: function ( xhr ) {
				xhr.setRequestHeader( 'X-WP-Nonce', gdprwp.nonce );
			},
			data: form.serialize(),
			// data: data,
			dataType: 'json',
			// cache: false,
			// contentType: false,
		}).done(function (response) {
			console.log(response);

			// var amount = $('<p />').appendTo('#response');
			// amount.text(response.data.length + ' items found');

			print_container_data(response.gdpr_container);

		}).fail(function (response) {
			console.log('Error');
			// var div = $('<p />').appendTo('#response');
			// success.text('Error! Something went wrong.');

		}).always(function (response) {
			hide_spinner();
		})

	}

	var print_container_data = function ( $gdpr_container ) {
	}

	function show_spinner() {
		$('.spinner').css('visibility', 'visible');
	}

	function hide_spinner() {
		$('.spinner').css('visibility', 'hidden');
	}





})(jQuery);