<?php namespace Cms\Library\Clases;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cms\Library\Interfaces\ModelDriverInterface;

class ModelDriverWithSlug extends ModelDriver implements ModelDriverInterface {

	public function get($id) {
		$query = $this->query();

		if (is_numeric($id)) {
			$query->where('id', $id);
		} else {
			$query->where('slug', $id);
		}

		$item = $query->first();

		if (!$item) {
			throw (new ModelNotFoundException)->setModel($this->model);
		}

		return $item;
	}

}



