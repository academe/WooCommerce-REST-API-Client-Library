<?php
/**
 * WC API Client Products resource class
 *
 * @since 2.0
 */
class WC_API_Products extends WC_API_Client_Resource {


	/**
	 * Setup the resource
	 *
	 * @since 2.0
	 * @param WC_API_Client $client class instance
	 */
	public function __construct( $client ) {

		parent::__construct( 'products', $client );
	}


	/**
	 * Get Products
	 *
	 * GET /products
	 * GET /products/#{id}
	 * GET /products/sku/#{sku}
	 *
	 * @since 2.0
	 * @param null|int $id product ID or null to get all products
	 * @param array $args acceptable product endpoint args, like `status`
	 * @return array|object orders!
	 *
	 * Note that slashes in SKUs can be a bit of a problem, so try to avoid.
	 */
	public function get( $id = null, $args = array() ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => $id,
			'params' => $args,
		) );

		return $this->do_request();
	}


	/**
	 * Create a product
	 *
	 * POST /products
	 *
	 * @since 2.0
	 * @param array $data valid product data
	 * @return array|object your newly-created product
	 */
	public function create( $data ) {

		$this->set_request_args( array(
			'method' => 'POST',
			'path'   => null,
			'body'   => $data,
		) );

		return $this->do_request();
	}


	/**
	 * Update a product
	 *
	 * PUT /products/#{id}
	 *
	 * @since 2.0
	 * @param int $id product ID
	 * @param array $data product data to update
	 * @return array|object your newly-updated product
	 */
	public function update( $id, $data ) {

		$this->set_request_args( array(
			'method' => 'PUT',
			'path'   => $id,
			'body'   => $data,
		) );

		return $this->do_request();
	}


	/**
	 * Delete a product
	 *
	 * DELETE /products/#{id}
	 *
	 * @since 2.0
	 * @param int $id product ID
	 * @param bool $force true to permanently delete the product, false to trash it
	 * @return array|object response
	 */
	public function delete( $id, $force = false ) {

		$this->set_request_args( array(
			'method' => 'DELETE',
			'path'   => $id,
			'params' => array( 'force' => $force ),
		) );

		return $this->do_request();
	}


	/**
	 * Get a count of products
	 *
	 * GET /products/count
	 *
	 * @param array $args acceptable product endpoint args, like `status`
	 * @return array|object the count
	 */
	public function get_count( $args = array() ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => 'count',
			'params' => $args,
		) );

		return $this->do_request();
	}

	/**
	 * Get a preduct category
	 *
	 * GET /products/categories
	 * GET /products/categories/#{id}
	 *
	 * @param array $args acceptable product endpoint args, like `status`
	 * @return array|object the count
	 */
	public function get_category( $id = null ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => array('categories', $id),
		) );

		return $this->do_request();
	}


}
