<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class PublicViewDriver extends ModelDriverWithTag {

	protected $model = '\\PublicView';
	protected $events_name = 'public_views';

	public function tree() {
		$items = $this->query()->get();
		$tree = [];
		foreach ($items as $index => $item) {
			$parts = explode('/', $item->name);
			$last = array_pop($parts);
			$cursor = &$tree;

			foreach ($parts as $part) {
				if (array_key_exists($part, $cursor)) {
					if (!is_array($cursor[$part])) {
						$cursor[$part] = array();
					}
				} else {
					$cursor[$part] = array();
				}
				
				$cursor = &$cursor[$part];
			}

			$cursor[$last] = $item->toArray();
		}

		return $tree;
	}


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