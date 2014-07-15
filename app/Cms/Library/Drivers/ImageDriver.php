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
		$file->save($path . $name . '.jpg');

		$file->fit(400, 400);
		$file->save($path . 'thumbnails/' . $name . 'lg.jpg');

		$file->fit(200, 200);
		$file->save($path . 'thumbnails/' . $name . 'md.jpg');

		$file->fit(100, 100);
		$file->save($path . 'thumbnails/' . $name . 'sm.jpg');

		$file->fit(50, 50);
		$file->save($path . 'thumbnails/' . $name . 'xs.jpg');

		$analyzer = new Analyzer('uploads/images/' . $name . '.jpg');
        $result = $analyzer->getResult();

		$_data = [];
		$_data['name'] = $data['file']->getClientOriginalName();
		$_data['path'] = 'uploads/images/' . $name . '.jpg';
		$_data['width'] = $width;
		$_data['height'] = $height;
		$_data['background_color'] = $result->background->getHexString();
        $_data['key_color'] = $result->title->getHexString();
        $_data['secondary_color'] = $result->songs->getHexString();

		$image = parent::store($_data);

		return $image;

	}

}