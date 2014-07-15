<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class PublicViewDriver extends ModelDriver {

	protected $model = '\\PublicView';
	protected $events_name = 'public_views';

	public function store($data) {

		$public_view = parent::store($data);

		return $public_view;

	}

}