/**
 * Tab from the title to the subtitle, rather than the post content.
 */
(function( $ ) {

	'use strict';

	if ( $( '#title' ).is( ':focus' ) ) {

		$( '#honorific' ).focus();

	}

	$( '#title' ).on( 'keydown', function( event ) {

		if ( event.keyCode === 9 && ! event.ctrlKey && ! event.altKey && ! event.shiftKey ) {

			$( '#honorific' ).focus();

			event.preventDefault();

		}

	});

	$( '#honorific' ).on( 'keydown', function( event ) {

		if ( event.keyCode === 9 && ! event.ctrlKey && ! event.altKey && ! event.shiftKey ) {

			$( '#first-name' ).focus();

			event.preventDefault();

		}

	});

	$( '#first-name' ).on( 'keydown', function( event ) {

		if ( event.keyCode === 9 && ! event.ctrlKey && ! event.altKey && ! event.shiftKey ) {

			$( '#last-name' ).focus();

			event.preventDefault();

		}

	});

	$( '#last-name' ).on( 'keydown', function( event ) {

		if ( event.keyCode === 9 && ! event.ctrlKey && ! event.altKey && ! event.shiftKey ) {

			$( '#job-title' ).focus();

			event.preventDefault();

		}

	});

	// Tab from last name directly to post content. Borrowed from post.js.
	$( '#job-title' ).on( 'keydown.editor-focus', function( event ) {

		var editor, $textarea;

		if ( event.keyCode === 9 && ! event.ctrlKey && ! event.altKey && ! event.shiftKey ) {

			editor = typeof tinymce !== 'undefined' && tinymce.get( 'content' );
			$textarea = $( '#content' );

			if ( editor && ! editor.isHidden() ) {
				editor.focus();
			} else if ( $textarea.length ) {
				$textarea.focus();
			} else {
				return;
			}

			event.preventDefault();
		}
	});

})( jQuery );