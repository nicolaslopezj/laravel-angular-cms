<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class PublicRouteDriver extends ModelDriverWithTag {

	protected $model = '\\PublicRoute';
	protected $events_name = 'public_routes';

	public function delete($id) {
		$model = $this->get($id);

		$model->delete();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.deleted');
		}
	}

}