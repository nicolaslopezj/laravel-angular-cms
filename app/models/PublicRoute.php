<?php

use Watson\Validating\ValidatingTrait;

class PublicRoute extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'public_routes';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'path', 'template', 'controller', 'resolve', 'tag'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['segments'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'required|unique:public_routes,name',
        'path' => 'unique:public_routes,path',
        'tag' => 'alpha_dash',
    ];

    /**
	 * Whether the model should throw a ValidationException if it
	 * fails validation. If not set, it will default to false.
	 *
	 * @var boolean
	 */
	protected $throwValidationExceptions = true;

	/**
	 * Attributes converters
	 */

	public function getIdAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getSegmentsAttribute()
	{
		$segments = explode('.', $this->attributes['name']);
		return $segments;
	}

}
