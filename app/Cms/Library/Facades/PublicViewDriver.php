<?php namespace Cms\Library\Facades;

use Illuminate\Support\Facades\Facade;

class PublicViewDriver extends Facade {

    protected static function getFacadeAccessor() { return 'public_view_driver'; }

}