<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $instance ) {
	require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/Meta_Record_Type.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Meta_Record_Type_Instance.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/loaders/Meta.php' );
	$instance->loaders()->add( 'meta', [
		'registry' => 'Underpin_Meta\Loaders\Meta',
	] );
} );