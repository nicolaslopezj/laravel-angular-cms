<?php

use Watson\Validating\ValidatingTrait;

class FolderLink extends Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'folder_link';

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
	protected $fillable = ['path', 'name', 'token', 'expires_on', 'title', 'description'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['is_valid', 'expires_text', 'seconds_left'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'path' => 'required',
        'name' => 'required|alpha_dash',
        'token' => 'required',
        'expires_on' => 'date_format:"Y-m-d H:i:s"|after:Now',
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

	public function getIsValidAttribute() {

		if (array_key_exists('expires_on', $this->attributes)) {
			if ($this->expires_on) {
				if ($this->expires_on < \Carbon\Carbon::now()) {
					return false;
				}
			}
		}
		
		return true;
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

		$time_left = null;
		if (array_key_exists('expires_on', $this->attributes)) {
			if ($this->expires_on) {
				$time_left = Carbon::now()->addSeconds($this->seconds_left)->diffForHumans(); 
			}
		}

		if ($time_left) {
			return 'Expires in ' . $downloads_left . ' or ' . $time_left;
		}

		return null;
	}

}
