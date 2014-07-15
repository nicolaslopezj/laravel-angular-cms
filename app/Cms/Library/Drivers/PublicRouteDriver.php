<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class PublicRouteDriver extends ModelDriver {

	protected $model = '\\PublicRoute';
	protected $events_name = 'public_routes';

	public function store($data) {

		$public_route = parent::store($data);

		return $public_route;

	}

}