<?php

use Watson\Validating\ValidatingTrait;
use Carbon\Carbon;

class FileLink extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'file_link';

	/**
	 * The database colums
	 *
	 * @var array
	 */
	protected $columns = ['id', 'created_at', 'updated_at', 'file_id', 'name', 'token', 'expires_on', 'max_downloads', 'title', 'description'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['token'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['file_id', 'name', 'token', 'expires_on', 'max_downloads', 'title', 'description'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['is_valid', 'url', 'expires_text', 'downloads_left', 'seconds_left'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'file_id' => 'required|exists:files,id',
        'name' => 'required|alpha_dash',
        'token' => 'required',
        'max_downloads' => 'numeric',
        'expires_on' => 'date_format:"Y-m-d H:i:s"',
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
	public function file() {
		return $this->belongsTo('DBFile');
	}

	/**
	 * Attributes converters
	 */
	
	public function getDates()
	{
	    return ['created_at', 'updated_at', 'expires_on'];
	}

	public function getIdAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getFileIdAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getDownloadsAttribute($attribute)
	{
		return (int) $attribute;
	}

	public function getMaxDownloadsAttribute($attribute)
	{
		if (!$attribute) {
			return null;
		}
		return (int) $attribute;
	}

	public function getUrlAttribute() {
		return route('files.file.show', $this->attributes['name']);
	}

	public function getIsValidAttribute() {
		if (array_key_exists('max_downloads', $this->attributes)) {
			if ($this->max_downloads) {
				if ($this->downloads >= $this->max_downloads) {
					return false;
				}
			}
		}

		if (array_key_exists('expires_on', $this->attributes)) {
			if ($this->expires_on) {
				if ($this->expires_on < \Carbon\Carbon::now()) {
					return false;
				}
			}
		}
		
		return true;
	}

	public function getDownloadsLeftAttribute() {
		if (array_key_exists('max_downloads', $this->attributes)) {
			if ($this->max_downloads) {
				return $this->max_downloads - $this->downloads;
			}
		}
		return null;
	}

	public function getSecondsLeftAttribute() {
		if (array_key_exists('expires_on', $this->attributes)) {
			if ($this->expires_on) {
				return Carbon::now()->diffInSeconds($this->expires_on);
			}
		}
		return null;
	}

	public function getExpiresTextAttribute() {
		if (!$this->getIsValidAttribute()) {
			return null;
		}

		$downloads_left = null;
		if (array_key_exists('max_downloads', $this->attributes)) {
			if ($this->max_downloads) {
				$downloads_left = $this->getDownloadsLeftAttribute() . ' downloads more';
			}
		}

		$time_left = null;
		if (array_key_exists('expires_on', $this->attributes)) {
			if ($this->expires_on) {
				$time_left = Carbon::now()->addSeconds($this->seconds_left)->diffForHumans(); 
			}
		}

		if ($downloads_left && $time_left) {
			return 'Expires in ' . $downloads_left . ' or ' . $time_left;
		}

		if ($downloads_left && !$time_left) {
			return 'Expires in ' . $downloads_left;
		}

		if (!$downloads_left && $time_left) {
			return 'Expires in ' . $time_left;
		}

		return null;
	}

}
