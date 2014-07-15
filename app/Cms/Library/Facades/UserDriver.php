<?php namespace Cms\Library\Facades;

use Illuminate\Support\Facades\Facade;

class UserDriver extends Facade {

    protected static function getFacadeAccessor() { return 'user_driver'; }

}