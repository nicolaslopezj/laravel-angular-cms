<?php namespace Site;

use Watson\Validating\ValidatingTrait;

class People extends \Eloquent {

	use ValidatingTrait;

	protected $table = 'site_peoples';

	protected $fillable = [''];

	protected $throwValidationExceptions = true;

	protected $rules = [
	];

	public function getIdAttribute($attribute) {
		return (int) $attribute;
	}

}