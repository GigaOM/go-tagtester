// create an instance of go_title_length_alert if we haven't already
if ( 'undefined' === typeof go_tagtester ) {
	var go_tagtester = {
		event: {}
	};
}
(function($){
	'use strict';

	go_tagtester.init = function() {
		$(document).on( 'click', '#submit', go_tagtester.submit );

		//
	};
	go_tagtester.submit = function( e ) {
		e.preventDefault();
		$( '#body input:first' );
		alert('body');
		go_tagtester.enrich();

	}

	go_tagtester.enrich = function( ) {
		var params = {
			'action': 'go_tagtester_enrich',
			'post_id': go_tagtester.post_id,
			'nonce': go_tagtester.nonce
		};

		$.getJSON( ajaxurl, params, go_tagtester.enrich_callback );
	};


	go_tagtester.enrich_callback = function( data, text_status, xhr ) {
		var taxonomies = {};

		for ( var prop in go_opencalais.taxonomy_map ) {
			taxonomies[ go_opencalais.taxonomy_map[ prop ] ] = [];
		}//end for

		// Look at terms returned and add terms to their matching local taxonomy
		$.each( data, function( idx, obj ) {
			var type = obj._type;

			if ( go_opencalais.taxonomy_map.hasOwnProperty( type ) ) {
				taxonomies[ go_opencalais.taxonomy_map[ type ] ].push( obj );
			}//end if
		});

		$.each( go_opencalais.local_taxonomies, function( taxonomy ) {
			if ( taxonomies.hasOwnProperty( taxonomy ) && taxonomies[ taxonomy ].length  ) {
				go_opencalais.enrich_taxonomy( taxonomy, taxonomies[ taxonomy ] );
			} else {
				go_opencalais.enrich_taxonomy( taxonomy, false );
			}
		});

		$(document).trigger( 'go-tagtester.complete' );


	};


	$(function() {
		go_tagtester.init();
	});
})(jQuery);
