/**
 * Saves the honorific, first name, and last name fields on auto-save.
 */
(function( $ ) {

	'use strict';

	var prefix, firstname, lastname, post_id, suffix;

	prefix = $( '#honorific-prefix' );
	firstname = $( '#first-name' );
	lastname = $( '#last-name' );
	suffix = $( '#honorifix-suffix' );
	post_id = $( 'post_id' );

	var data {
		prefix: prefix.val(),
		post_id: post_id.val(),
		firstname: firstname.val(),
		lastname: lastname.val(),
		suffix: suffix.val(),
		action: 'employees_autosave'
	};

	jQuery.post({ employees_autosaver.ajaxurl, data, function( response ) {
		alert( response );
	});

})( jQuery );