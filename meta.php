<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observer( 'meta', [
	'update' => function ( Underpin $plugin ) {
	require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/Meta_Record_Type.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Meta_Record_Type_Instance.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/loaders/Meta.php' );
		$plugin->loaders()->add( 'meta', [
		'registry' => 'Underpin_Meta\Loaders\Meta',
	] );
	},
] ) );