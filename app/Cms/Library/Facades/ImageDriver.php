<?php namespace Cms\Library\Facades;

use Illuminate\Support\Facades\Facade;

class ImageDriver extends Facade {

    protected static function getFacadeAccessor() { return 'image_driver'; }

}