<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class FileLinkDriver extends ModelDriver {

	protected $model = '\\FileLink';

	public function store($data) {
		$model = new $this->model;
		
		$model->fill($data);
		$model->token = str_random(64);
		$model->name = $model->name ? $model->name : str_random(10);
		$model->isValid('creating', true);
		$model->save();
		
		return $model;
	}

}