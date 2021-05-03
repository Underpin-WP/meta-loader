<?php

namespace Underpin_Meta\Loaders;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Underpin\Abstracts\Registries\Loader_Registry;

class Meta extends Loader_Registry {

	protected $abstraction_class = 'Underpin_Meta\Abstracts\Meta_Record_Type';

	protected $default_factory = 'Underpin_Meta\Factories\Meta_Record_Type_Instance';

	protected function set_default_items() {
	}

	/**
	 * @param string $key
	 *
	 * @return \Underpin_Meta\Abstracts\Meta_Record_Type|\WP_Error Post Meta instance, if it exists. WP_Error, otherwise.
	 */
	public function get( $key ) {
		return parent::get( $key );
	}

	/**
	 * Fetch metadata for a single field.
	 *
	 * @param string $key       The registered key to fetch
	 * @param int    $object_id ID of the object metadata is for.
	 * @param bool   $single    Optional. If true, return only the first value of the specified meta_key.
	 *                          This parameter has no effect if meta_key is not specified. Default false.
	 *
	 * @return mixed|\Underpin_Meta\Abstracts\Meta_Record_Type|void|\WP_Error
	 */
	public function get_meta( $key, $object_id, $single = false ) {
		$value = $this->get( $key );

		if ( is_wp_error( $value ) ) {
			return $value;
		}

		return $value->get( $object_id, $single );
	}

}