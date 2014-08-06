<?php

use Watson\Validating\ValidatingTrait;

class Definition extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'definitions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id', 'editable'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['identifier', 'description', 'type', 'editable', 'string', 'text', 'integer', 'image_id', 'image', 'tag'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'identifier' => 'required|alpha_dash|unique:definitions,identifier',
        'type' => 'required|in:string,text,integer,image',
        'editable' => 'boolean',
        'string' => '',
        'text' => '',
        'integer' => 'numeric',
        'image_id' => 'exists:images,id',
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

	public function getEditableAttribute($attribute)
	{
		return (boolean) $attribute;
	}

	public function image() {
		return $this->belongsTo('Image');
	}

}
