<?php

use Watson\Validating\ValidatingTrait;

class Image extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images';

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
	protected $fillable = ['name', 'path', 'width', 'height', 'background_color', 'key_color', 'secondary_color'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['thumbnail_xs', 'thumbnail_sm', 'thumbnail_md', 'thumbnail_lg'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'name' => 'min:4',
        'path' => 'required|min:4',
        'width' => 'required|numeric',
        'height' => 'required|numeric',
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

	public function getPathAttribute() {
		$path = $this->attributes['path'];
		return asset($path);
	}

	public function getThumbnailXsAttribute()
	{	
		$path = $this->attributes['path'];
		$parts = explode('/', $path);
		$parts[2] = str_replace('.png', '', $parts[2]);
		$thumbnail = $parts[0] . '/' . $parts[1] . '/thumbnails/' . $parts[2] . 'xs.png';
		return asset($thumbnail);
	}

	public function getThumbnailSmAttribute()
	{
		$path = $this->attributes['path'];
		$parts = explode('/', $path);
		$parts[2] = str_replace('.png', '', $parts[2]);
		$thumbnail = $parts[0] . '/' . $parts[1] . '/thumbnails/' . $parts[2] . 'sm.png';
		return asset($thumbnail);
	}

	public function getThumbnailMdAttribute()
	{
		$path = $this->attributes['path'];
		$parts = explode('/', $path);
		$parts[2] = str_replace('.png', '', $parts[2]);
		$thumbnail = $parts[0] . '/' . $parts[1] . '/thumbnails/' . $parts[2] . 'md.png';
		return asset($thumbnail);
	}

	public function getThumbnailLgAttribute()
	{
		$path = $this->attributes['path'];
		$parts = explode('/', $path);
		$parts[2] = str_replace('.png', '', $parts[2]);
		$thumbnail = $parts[0] . '/' . $parts[1] . '/thumbnails/' . $parts[2] . 'lg.png';
		return asset($thumbnail);
	}

}
