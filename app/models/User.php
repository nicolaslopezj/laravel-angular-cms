<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Watson\Validating\ValidatingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The attributes that can be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'role'];

	/**
	 * Validation Rules
	 *
	 * @var array
	 */
    protected $rulesets = [
		'creating' => [
	        'password' => 'required|min:6|max:100',
		],
		'password' => [
	        'password' => 'required|min:6|max:100',
		],
		'saving' => [
			'name' => 'required|min:4|max:50',
	        'email' => 'required|max:100|unique:users,email',
	        'password' => 'min:6|max:100',
	        'role' => 'required|in:normal,editor,admin,dev',
		],
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

	public function getIsDevAttribute() {
		return $this->attributes['role'] == 'dev';
	}

	public function getIsAdminAttribute() {
		return $this->attributes['role'] == 'admin';
	}

	public function getIsEditorAttribute() {
		return $this->attributes['role'] == 'editor';
	}

	public function getIsNormalAttribute() {
		return $this->attributes['role'] == 'normal';
	}



}
