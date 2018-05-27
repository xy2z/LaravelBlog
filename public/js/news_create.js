$(function() {

	$(document).on('keyup', '#form_title', function() {
		var val = $(this).val().toLowerCase()

		// Replaces non alphanumerics with "-"
		val = val.replace(/[^A-Za-z0-9]+/g, '-')

		// Trim first/last dashes.
		val = val.replace(/^\-/, '')
		val = val.replace(/\-$/, '')

		$('#form_pretty_url').val(val)
	})

})
