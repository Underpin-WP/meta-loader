<?php

namespace Underpin_Meta\Factories;

use Underpin\Traits\Instance_Setter;
use Underpin_Meta\Abstracts\Meta_Record_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Meta_Record_Type_Instance extends Meta_Record_Type {

	use Instance_Setter;

	protected $sanitize_callback;

	protected $has_permission_callback;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

	public function sanitize( $meta_value, $meta_key, $object_type ) {
		if ( is_callable( $this->sanitize_callback ) ) {
			return $this->set_callable( $this->sanitize_callback, $meta_value, $meta_key, $object_type );
		}

		return parent::sanitize( $meta_value, $meta_key, $object_type );
	}

	public function has_permission() {
		return $this->set_callable( $this->has_permission_callback );
	}

}