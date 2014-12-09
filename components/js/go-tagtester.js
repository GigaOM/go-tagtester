// create an instance of go_tagtester if we haven't already
if ( 'undefined' === typeof go_tagtester) {
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
		this.$title = $( document.getElementById( 'headline' ) );
		this.$title_count_span = $( '.go-tagtester-alert-count' );

		// keep track of the current title length
		this.title_length = 0;

		// set up a callback on keyup events to update the title length
		$( document ).on( 'keyup', '#title', function() {
			go_title_length_alert.update_title_count();
		});

		this.update_title_count();
	};

	/***
	 * the callback function to update the title length count
	 */
	go_tagtester.update_title_count = function() {
		if ( ! this.$title.length ) {
			return;
		}

		// check if we really need to update the count
		var new_title_length = this.$title.val().length;

		if ( new_title_length === this.title_length ) {
			return; // nope. bail.
		}

		// update the title length count
		this.title_length = new_title_length;
		this.$title_count_span.text( this.title_length.toString() );

		// conditionally highlight the length count
		if ( this.title_length >= this.high_alert_threshold ) {
			this.$title.removeClass( 'go-tagtester-alert-alert' ).addClass( 'go-tagtester-alert-high-alert' );
		} else if ( this.title_length >= this.alert_threshold ) {
			this.$title.removeClass( 'go-tagtester-alert-high-alert' ).addClass( 'go-tagtester-alert-alert' );
		} else {
			this.$title.removeClass( 'go-tagtester-alert-alert go-tagtester-alert-high-alert' );
		}
	};//END update_title_count

	$( function() {
		go_tagtester.init();
	});
})( jQuery );
