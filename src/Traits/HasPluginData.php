<?php

namespace Eduframe\Traits;

use Eduframe\Resources\Plugins\Data;

/**
 * Class Storable
 * @package Eduframe|Traits
 */
trait HasPluginData {

	/**
	 * @param $name
	 * @return mixed
	 */
	public function get_plugin_data_value( $title ) {
		$plugin_data = $this->get_plugin_data($title);
		return $plugin_data ? $plugin_data->data : false;
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	private function get_plugin_data( $title ) {
		$results = array_filter( $this->plugin_data, function ( $plugin_data ) use ( $title ) {
			return ( $plugin_data->field->title === $title );
		} );

		return is_array( $results ) && count( $results ) > 0 ? array_values( $results )[0] : false;
	}

	/**
	 * @param $title
	 * @param $data
	 * @return mixed
	 * @throws \Eduframe\Exceptions\ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function set_plugin_data_value( $title, $data ) {
		$plugin_data = $this->get_plugin_data( $title );
		if ( ! $plugin_data ) {
			$plugin_data             = new Data( $this->connection );
			$plugin_data->model_type = ucfirst( $this->namespace );
			$plugin_data->model_id   = $this->attributes[$this->primaryKey];
			$plugin_data->title      = $title;
		}
		$plugin_data->data = $data;
		$plugin_data->save();
	}
}
