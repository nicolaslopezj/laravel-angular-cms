<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class PublicViewDriver extends ModelDriverWithTag {

	protected $model = '\\PublicView';
	protected $events_name = 'public_views';

	public function store($data) {

		$public_view = parent::store($data);

		return $public_view;

	}

	public function update($id, $data) {
		$view = $this->get($id);

		$coder = new \Cms\Library\Helpers\Coder\ViewsCoder;
        $coder->deleteView($view);

		return parent::update($id, $data);
	}

}