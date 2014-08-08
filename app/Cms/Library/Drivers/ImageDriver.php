<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;
use Cms\Library\Helpers\ColorAnalizer\Analyzer;

class ImageDriver extends ModelDriver {


	protected $model = '\\Image';


	public function store($data) {

		$validator = \Validator::make($data, ['file' => 'required|image']);

		if ($validator->fails())
		{
			$exception = new \Watson\Validating\ValidationException('Model failed validation');
            $exception->setErrors($validator->messages());
            throw $exception;
		}

		$path = public_path() . '/uploads/images/';
		$name = uniqid();
		$file = \ImageIntervention::make($data['file']);
		$width = $file->width();
		$height = $file->height();
		$file->save($path . $name . '.png');

		$file->fit(400, 400);
		$file->save($path . 'thumbnails/' . $name . 'lg.png');

		$file->fit(200, 200);
		$file->save($path . 'thumbnails/' . $name . 'md.png');

		$file->fit(100, 100);
		$file->save($path . 'thumbnails/' . $name . 'sm.png');

		$file->fit(50, 50);
		$file->save($path . 'thumbnails/' . $name . 'xs.png');

		$analyzer = new Analyzer('uploads/images/' . $name . '.png');
        $result = $analyzer->getResult();

		$_data = [];
		$_data['name'] = $data['file']->getClientOriginalName();
		$_data['path'] = 'uploads/images/' . $name . '.png';
		$_data['width'] = $width;
		$_data['height'] = $height;
		$_data['background_color'] = $result->background->getHexString();
        $_data['key_color'] = $result->title->getHexString();
        $_data['secondary_color'] = $result->songs->getHexString();

		$image = parent::store($_data);

		return $image;

	}

	public function delete($id) {

		return parent::delete($id);
	}

}