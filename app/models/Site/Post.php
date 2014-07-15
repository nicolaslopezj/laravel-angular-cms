<?php namespace Site;

use Watson\Validating\ValidatingTrait;

class Post extends \Eloquent {

	use ValidatingTrait;

	protected $table = 'site_posts';

	protected $fillable = ['title', 'content', 'image', 'happy', 'sad'];

	protected $throwValidationExceptions = true;

	protected $rules = [
		'title' => 'required|min:4',
		'content' => 'required|min:4',
	];

	public function getIdAttribute($attribute) {
		return (int) $attribute;
	}

	public function getImageAttribute($attribute) {
		return (int) $attribute;
	}

	public function getSadAttribute($attribute) {
		return (int) $attribute;
	}

	public function image_image() {
		return $this->belongsTo('Image', 'image');
	}

}