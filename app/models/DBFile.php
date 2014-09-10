<?php

use Watson\Validating\ValidatingTrait;

class DBFile extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'files';

	/**
	 * The database colums
	 *
	 * @var array
	 */
	protected $columns = ['id', 'created_at', 'updated_at', 'name', 'size', 'mime', 'system_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['system_name'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'size', 'mime'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['filename', 'path', 'extension'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'required',
        'system_name' => 'required|unique:files,system_name',
        'size' => 'required|numeric',
        'mime' => 'required',
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

	public function getDownloadsAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getExtensionAttribute() {
		$parts = explode('.', $this->attributes['name']);
		return array_pop($parts);
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

	public function getSystemPathAttribute() {
		return app_path() . '/storage/files/' . $this->attributes['system_name'];
	}

}
