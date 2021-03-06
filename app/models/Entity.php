<?php

use Watson\Validating\ValidatingTrait;

class Entity extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entities';

	/**
	 * The database colums
	 *
	 * @var array
	 */
	protected $columns = ['id', 'created_at', 'updated_at', 'name', 'table_name', 'route_name', 'model_name', 'has_slug'];

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
	protected $fillable = ['name', 'table_name', 'route_name', 'model_name', 'has_slug'];

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
        'name' => 'required|min:3|max:20',
        'table_name' => 'required|min:3|max:20|alpha_dash',
        'route_name' => 'required|min:3|max:20|alpha_dash',
        'model_name' => 'required|min:3|max:20|alpha',
        'has_slug' => 'boolean',
    ];

    /**
	 * Whether the model should throw a ValidationException if it
	 * fails validation. If not set, it will default to false.
	 *
	 * @var boolean
	 */
	protected $throwValidationExceptions = true;

	/**
	 * Relations
	 */

	public function attributes() {
		return $this->hasMany('EntityAttribute');
	}

	/**
	 * Attributes converters
	 */

	public function getIdAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getHasSlugAttribute($attribute)
	{
		return (boolean) $attribute;
	}

	public function getMainAttributeAttribute()
	{
		$attributes = \DB::table('entity_attributes')
		->where('entity_id', $this->attributes['id'])
		->where('type', 'string')
		->get();
		foreach ($attributes as $index => $attribute) {
			if ($attribute->name == 'name' || $attribute->name == 'title') {
				return $attribute;
			}
		}
		if (count($attributes)) {
			return $attributes[0];
		}
	}

	public function getMainImageAttributeAttribute()
	{
		$attributes = \DB::table('entity_attributes')
		->where('entity_id', $this->attributes['id'])
		->where('type', 'image')
		->get();
		if (!$attributes) {
			return null;
		}
		foreach ($attributes as $index => $attribute) {
			if ($attribute->name == 'image' || $attribute->name == 'picture') {
				return $attribute;
			}
		}
		if (count($attributes)) {
			return $attributes[0];
		}
	}

}
