( function () {

	var $nav = jQuery( '#nav' );
	var $btn = jQuery( '#burger' );

	function Toggle( event ) {
		event.preventDefault();
		$nav.toggleClass( 'active' );
	}

	$btn.on( 'click', Toggle );

} )();