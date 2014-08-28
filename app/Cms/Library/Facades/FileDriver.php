<?php namespace Cms\Library\Facades;

use Illuminate\Support\Facades\Facade;

class FileDriver extends Facade {

    protected static function getFacadeAccessor() { return 'file_driver'; }

}