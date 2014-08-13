<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class DefinitionDriver extends ModelDriverWithTag {

	protected $model = '\\Definition';

	public function getByIdentifier($identifier) {
		$class = $this->model;
		return $class::where('identifier', $identifier)->first();
	}

	public function all($site = 'admin', $tag = null) {
		$model = $this->model;

		if ($tag) {
			$query = $model::where('tag', $tag);
		} else {
			$query = $model::where('id', '>', '0');
		}

		if ($site == 'admin') {
			$query = $query->where('editable', true);
		}

		if ($site == 'site') {
			$query = $query->where('hidden', false);
		}

		return $query->get();
	}

	public function index($site = 'admin', $tag = null, $page = 1, $per_page = 20) {
		$model = $this->model;

		if ($tag) {
			$query = $model::where('tag', $tag);
		} else {
			$query = $model::where('id', '>', '0');
		}

		if ($site == 'admin') {
			$query = $query->where('editable', true);
		}

		if ($site == 'site') {
			$query = $query->where('hidden', false);
		}

		return $query->paginate($per_page);
	}

	public function update($id, $data) {
		$definition = $this->get($id);

		if ($definition->type == 'image' && $data['file']) {
			$image = \ImageDriver::store(['file' => $data['file']]);
			$data['image_id'] = $image->id;
		}
		
		return parent::update($id, $data);
	}

	public function getTags($site = 'admin') {
		$model = $this->model;

		$query = $model::select('tag')
		->whereNotNull('tag')
		->where('tag', '!=', '')
		->groupBy('tag')
		->orderBy('tag');

		if ($site != 'dev') {
			$query = $query->where('editable', true);
		}

		$results = $query->get();

		$tags = array_pluck($results, 'tag');
		
		return $tags;
	}
	
}