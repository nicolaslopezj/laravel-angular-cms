<?php namespace Cms\Library\Clases;

use Cms\Library\Interfaces\ModelDriverInterface;

class ModelDriverWithTag extends ModelDriver implements ModelDriverInterface {

	public function index($tag = null, $page = 1, $per_page = 20) {
		$model = $this->model;

		if ($tag) {
			$query = $model::where('tag', $tag);
			return $query->paginate($per_page);
		}

		return $model::paginate($per_page);
	}
	
	public function getTags() {
		$model = $this->model;

		$query = $model::select('tag')
		->whereNotNull('tag')
		->groupBy('tag')
		->orderBy('tag');
		$results = $query->get();

		$tags = array_pluck($results, 'tag');
		
		return $tags;
	}
}



