(function($){
	'use strict';

	go_tagtester.init = function() {
		$(document).on( 'click', '#submit', go_tagtester.form_headline );
		$(document).on( 'click', '#submit', go_tagtester.form_summary );
		$(document).on( 'click', '#submit', go_tagtester.form_body );

		go_opencalais.enrich();
	};


	// Toggle taglist
	go_tagtester.form_headline = function( e ) {
		alert("headline");
		var headline = $( '#headline' ).val();
		var headline_weight = $( '#headline_weight' ).val();
	};
	go_tagtester.form_summary = function( e ) {
		alert("summary");
		var summary = $( '#summary' ).val();
		var summary_weight = $( '#summary_weight' ).val();
	};
	go_tagtester.form_body = function( e ) {
		alert("body");
		var body = $( '#body' ).val();
		var body_weight = $( '#body_weight' ).val();

	};

	$(function() {
		go_tagtester.init();
	});
})(jQuery);
