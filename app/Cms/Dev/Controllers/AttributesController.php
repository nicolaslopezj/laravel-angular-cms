<?php namespace Cms\Dev\Controllers;

class AttributesController extends BaseController {

	public function delete($entity_id, $attribute_id)
	{
		$entity = \EntityDriver::get($entity_id);
		$attribute = \EntityDriver::getAttribute($entity_id, $attribute_id);

		$this->layout->title = 'Delete - ' . $attribute->name;
		$this->layout->content = \View::make('dev.entities.attributes.delete', compact('entity', 'attribute'));
	}

	public function create($id)
	{
		$entity = \EntityDriver::get($id);

		$this->layout->title = 'Create Entity';
		$this->layout->content = \View::make('dev.entities.attributes.create', compact('entity'));
	}

	public function store($id){
		$data = \Input::all();

		try {
			$attribute = \EntityDriver::addAttribute($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.entities.attributes.create', $id)
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.entities.show', $id);
	}

	public function destroy($entity_id, $attribute_id) {
		$attribute = \EntityDriver::getAttribute($entity_id, $attribute_id);
		\EntityDriver::deleteAttribute($attribute);

		return \Redirect::route('dev.entities.show', $entity_id);
	}

}
