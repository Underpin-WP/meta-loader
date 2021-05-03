<?php

namespace Underpin_Meta\Factories;

use Underpin\Traits\Instance_Setter;
use Underpin_Meta\Abstracts\Meta_Record_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Meta_Record_Type_Instance extends Meta_Record_Type {
	use Instance_Setter;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

}