<?php namespace Cms\Admin\Controllers;

class DefinitionsController extends BaseController {

	public function index()
	{
		$definitions = \DefinitionDriver::index();

		$this->layout->title = 'Dictionary';
		$this->layout->content = \View::make('admin.definitions.index', compact('definitions'));
	}

	public function show($id)
	{
		$definition = \DefinitionDriver::get($id);

		$this->layout->title = $definition->identifier;
		$this->layout->content = \View::make('admin.definitions.show', compact('definition'));
	}

	public function edit($id)
	{
		$definition = \DefinitionDriver::get($id);

		$this->layout->title = $definition->identifier . ' - Edit';
		$this->layout->content = \View::make('admin.definitions.edit', compact('definition'));
	}

	public function update($id){
		$data = \Input::all();

		try {
			$definition = \DefinitionDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('admin.definitions.edit')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('admin.definitions.show', $definition->id);
	}

}
