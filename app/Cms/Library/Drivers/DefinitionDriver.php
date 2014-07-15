<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class DefinitionDriver extends ModelDriver {

	protected $model = '\\Definition';

	public function getByIdentifier($identifier) {
		$class = $this->model;
		return $class::where('identifier', $identifier)->first();
	}

	public function index($page = 1, $per_page = 20) {
		$class = $this->model;

		if (\Auth::user()->role != 'dev') {
			return $class::where('editable', true)
			->paginate($per_page);
		} else {
			return $class::paginate($per_page);
		}
	}

	public function update($id, $data) {
		$definition = $this->get($id);

		if ($definition->type == 'image' && $data['file']) {
			$image = \ImageDriver::store(['file' => $data['file']]);
			$data['image_id'] = $image->id;
		}
		
		return parent::update($id, $data);
	}
	
}