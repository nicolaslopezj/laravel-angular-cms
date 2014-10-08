<?php namespace Cms\Dev\Controllers;

class ImagesController extends BaseController {

	public function index()
	{
		$images = \ImageDriver::index();
		$this->layout->title = trans('dev.Images');
		$this->layout->content = \View::make('dev.images.index', compact('images'));
	}

	public function show($id)
	{
		$image = \ImageDriver::get($id);
		$this->layout->title = 'Image';
		$this->layout->content = \View::make('dev.images.show', compact('image'));
	}

	public function create()
	{
		$this->layout->title = 'Upload a Image';
		$this->layout->content = \View::make('dev.images.create');
	}

	public function store()
	{
		$data = \Input::all();

		try {
			$image = \ImageDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.images.create')
			->withErrors($e->getErrors())
			->withInput();
		}

		return \Redirect::route('dev.images.show', $image->id);
	}

}
