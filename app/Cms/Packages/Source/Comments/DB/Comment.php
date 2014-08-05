<?php namespace Cms\Packages\Source\Comments\DB;

use Watson\Validating\ValidatingTrait;

class Comment extends \Eloquent {

	use ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * The table dates
	 *
	 * @var string
	 */
	protected $dates = ['readed_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id', 'updated_at', 'readed_at', 'readed'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'message', 'reason'];

	/**
	 * The attributes are not in the database
	 *
	 * @var array
	 */
	protected $appends = ['readed'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
	protected $rules = [
		'email' => 'required|email',
        'message' => 'required',
        'reason' => 'required',
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

	public function getReadedAttribute()
	{
		return (boolean) $this->attributes['readed_at'];
	}

}
