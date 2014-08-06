<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class PublicRouteDriver extends ModelDriverWithTag {

	protected $model = '\\PublicRoute';
	protected $events_name = 'public_routes';

}