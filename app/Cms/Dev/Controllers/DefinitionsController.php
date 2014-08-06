<?php namespace Cms\Dev\Controllers;

class DefinitionsController extends BaseController {

	public function index()
	{
		$tag = \Input::get('tag');
		$definitions = \DefinitionDriver::index('dev', $tag);
		$tags = \DefinitionDriver::getTags('dev');

		$this->layout->title = 'Dictionary';
		$this->layout->content = \View::make('dev.definitions.index', compact('definitions', 'tags'));
	}

	public function show($id)
	{
		$definition = \DefinitionDriver::get($id);

		$this->layout->title = $definition->identifier;
		$this->layout->content = \View::make('dev.definitions.show', compact('definition'));
	}

	public function edit($id)
	{
		$definition = \DefinitionDriver::get($id);

		$this->layout->title = $definition->identifier . ' - Edit';
		$this->layout->content = \View::make('dev.definitions.edit', compact('definition'));
	}

	public function delete($id) {
		$definition = \DefinitionDriver::get($id);

		$this->layout->title = $definition->identifier . ' - Delete';
		$this->layout->content = \View::make('dev.definitions.delete', compact('definition'));
	}

	public function create()
	{
		$this->layout->title = 'Create a Definition';
		$this->layout->content = \View::make('dev.definitions.create');
	}


	public function update($id){
		$data = \Input::all();

		try {
			$definition = \DefinitionDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.definitions.edit')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.definitions.show', $definition->id);
	}

	public function store(){
		$data = \Input::all();

		try {
			$definition = \DefinitionDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.definitions.create')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.definitions.show', $definition->id);
	}

	public function destroy($id) {
		\DefinitionDriver::delete($id);

		return \Redirect::route('dev.definitions.index');
	}

}
