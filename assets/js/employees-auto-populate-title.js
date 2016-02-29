/**
 * Auto-populates the title field as you select an honorific and/or type in the first name and last name fields.
 *
 * The special_honors variable comes from wp_localize_script, which gets the array from
 * Employees_Admin_Metaboxes::get_special_honorifics()
 */
(function( $ ) {

	'use strict';

	var title, firstname, lastname, honorprefix, label, honorsuffix;

	title = $( '#title' );
	honorprefix = $( '#honorific-prefix' );
	firstname = $( '#first-name' );
	lastname = $( '#last-name' );
	label = $( '#title-prompt-text' );
	honorsuffix = $( '#honorific-suffix' );

	$( function() {

		$( '#honorific-prefix,#first-name,#last-name,#honorific-suffix' ).on( 'keypress keyup blur change', function() {

			var prefix = honorprefix.val();
			var suffix = honorsuffix.val();
			var punct1 = '. ';
			var punct2 = ', ';
			var punct3 = ' ';

			if ( $.inArray( honorprefix.val(), special_honors ) > -1 ) {

				punct1 = ' ';

			}

			if ( 0 === honorprefix.val().length ) {

				punct1 = '';

			}

			if ( 0 === honorsuffix.val().length ) {

				punct2 = '';

			}

			if ( 0 === lastname.val().length ) {

				punct3 = '';

			}

			label.addClass( 'screen-reader-text' );
			title.val( prefix + punct1 + firstname.val() + punct3 + lastname.val() + punct2 + suffix );

		});

	});

})( jQuery );
