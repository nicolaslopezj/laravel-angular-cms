<?php

use Watson\Validating\ValidatingTrait;

class EntityAttribute extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entity_attributes';

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
	protected $fillable = ['entity_id', 'name', 'type', 'validations', 'options', 'description'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'entity_id' => 'required|exists:entities,id',
		'name' => 'required|max:20|unique:entity_attributes,name',
        'type' => 'required|in:string,text,integer,image,image_array,slug',
    ];

    
    public function setEntityIdAttribute($value){
    	$this->rules['name'] .= ',NULL,id,entity_id,' . $value;
        $this->attributes['entity_id'] = $value;
    }

    public function setNameAttribute($value) {
    	$this->attributes['name'] = strtolower($value);
    }

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

	public function getEntityIdAttribute($attribute)
	{
		return (int) $attribute;
	}

}
