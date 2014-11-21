// create an instance of go_tagtester if we haven't already
if ( 'undefined' === typeof go_tagtester ) {
	var go_tagtester = {
		event: {}
	};
}

(function( $ ) {
	'use strict';

	/***
	 * constructor
	 */
	go_tagtester.init = function() {
		// add our title char count span
		$( document.getElementById( 'headline' ) );

		// jQuery select these elements once here
		this.$title = $( document.getElementById( 'title' ) );
		this.$title_count_span = $( '.go-title-length-alert-count' );

		// keep track of the current title length
		this.title_length = 0;

		// set up a callback on keyup events to update the title length
		$( document ).on( 'keyup', '#title', function() {
			go_title_length_alert.update_title_count();
		});

		this.update_title_count();
	};



	$( function() {
		go_tagtester();
	});
})( jQuery );
