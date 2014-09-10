<?php

use Watson\Validating\ValidatingTrait;

class PublicView extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'public_views';

	/**
	 * The database colums
	 *
	 * @var array
	 */
	protected $columns = ['id', 'name', 'content', 'created_at', 'updated_at'];

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
	protected $fillable = ['name', 'content'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['filename', 'path'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'required|unique:public_views,name',
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

	public function getFilenameAttribute() {
		$parts = explode('/', $this->attributes['name']);
		return array_pop($parts);
	}

	public function getPathAttribute() {
		$parts = explode('/', $this->attributes['name']);
		array_pop($parts);
		return $parts;
	}

}
