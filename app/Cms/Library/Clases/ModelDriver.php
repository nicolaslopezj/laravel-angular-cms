<?php namespace Cms\Library\Clases;

use Cms\Library\Interfaces\ModelDriverInterface;

Class ModelDriver implements ModelDriverInterface {

	public function all() {
		$class = $this->model;

		return $class::all();
	}

	public function index($page = 1, $per_page = 20) {
		$class = $this->model;

		return $class::paginate($per_page);
	}

	public function get($id) {
		$class = $this->model;
		return $class::findOrFail($id);
	}

	public function store($data) {
		$model = new $this->model;

		$model->fill($data);
		$model->isValid();
		$model->save();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.created', $model);
		}
		
		return $model;
	}

	public function update($id, $data) {
		$model = $this->get($id);

		$model->fill($data);
		$model->isValid();
		$model->save();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.updated', $model);
		}

		return $model;
	}

	public function delete($id) {
		$model = $this->get($id);

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.deleted', $model);
		}

		$model->delete();
	}

}