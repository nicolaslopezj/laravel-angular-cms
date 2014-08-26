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
	protected $fillable = ['name', 'path', 'template', 'controller', 'resolve', 'tag', 'until_resolved', 'is_default', 'meta_tags', 'meta_title', 'meta_description', 'meta_image'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['segments', 'dependencies', 'laravel_format', 'variables'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'required|unique:public_routes,name',
        'path' => 'unique:public_routes,path',
        'tag' => 'alpha_dash',
        'is_default' => 'boolean',
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

	public function getIsDefaultAttribute($attribute)
	{
		return (boolean) $attribute;
	}

	public function getSegmentsAttribute()
	{
		$segments = explode('.', $this->attributes['name']);
		return $segments;
	}

	public function getDependenciesAttribute()
	{
		$name = $this->attributes['path'];
		$re = "/:[a-zA-Z0-9-_]+/"; 
		preg_match_all($re, $name, $matches);
		return str_replace(':', '', $matches[0]);
	}

	public function getVariablesAttribute()
	{
		$resolve = $this->attributes['resolve'];
		$regex = "/\"?([a-zA-Z0-9]+)\"?:/"; 
		preg_match_all($regex, $resolve, $matches);
		return $matches[1];
	}

	public function getLaravelFormatAttribute() {
		$name = $this->attributes['path'];
		if (!$name) {
			return '/';
		}

		$dependencies = $this->getDependenciesAttribute();
		foreach ($dependencies as $index => $dependency) {
			$name = str_replace(':' . $dependency, '{' . $dependency . '}', $name);
		}
		
		return $name;
	}

}
