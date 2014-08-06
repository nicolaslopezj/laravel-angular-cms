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
	protected $fillable = ['name', 'content', 'tag'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = [];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'required|alpha_dash|unique:public_views,name',
        'content' => 'required',
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

}
