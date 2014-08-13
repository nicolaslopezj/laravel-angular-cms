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
	protected $hidden = ['id', 'editable', 'hidden', 'tag', 'description'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['identifier', 'description', 'type', 'editable', 'hidden', 'string', 'text', 'integer', 'image_id', 'image', 'tag', 'code'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['code'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'identifier' => 'required|alpha_dash|unique:definitions,identifier',
        'type' => 'required|in:string,text,integer,image,code',
        'editable' => 'boolean',
        'hidden' => 'boolean',
        'string' => '',
        'text' => '',
        'integer' => 'numeric',
        'image_id' => 'exists:images,id',
        'tag' => 'alpha_dash',
        'code' => '',
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

	public function getHiddenAttribute($attribute)
	{
		return (boolean) $attribute;
	}

	public function image() {
		return $this->belongsTo('Image');
	}

	public function setCodeAttribute($attribute)
	{
		$this->attributes['text'] = $attribute;
	}

	public function getCodeAttribute()
	{
		return $this->attributes['text'];
	}

}
