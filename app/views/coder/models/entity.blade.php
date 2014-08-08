namespace Site;

use Watson\Validating\ValidatingTrait;

class {{ $entity->model_name }} extends \Eloquent {

	use ValidatingTrait;

	protected $table = 'site_{{ $entity->table_name }}';

	protected $fillable = ['{{ join("', '", array_pluck($entity->attributes, 'name')) }}'];

	protected $throwValidationExceptions = true;

	protected $rules = [
@foreach ($entity->attributes as $index => $attribute)
@if ($attribute->validations)		
		'{{ $attribute->name }}' => '{{ $attribute->validations }}',
@endif
@endforeach
	];

	public function getIdAttribute($attribute) {
		return (int) $attribute;
	}

@foreach ($entity->attributes as $index => $attribute)
@if ($attribute->type == 'integer' || $attribute->type == 'image')
	public function get{{ studly_case($attribute->name) }}Attribute($attribute) {
		return (int) $attribute;
	}
@endif
@endforeach

@foreach ($entity->attributes as $index => $attribute)
@if ($attribute->type == 'image')
	public function image_{{ $attribute->name }}() {
		return $this->belongsTo('Image', '{{ $attribute->name }}');
	}
@endif

@if ($attribute->type == 'image_array')
	public function images_{{ $attribute->name }}() {
		return $this->belongsToMany('Image', 'site_{{ $entity->table_name }}_{{ $attribute->name }}_images', 'site_{{ $entity->table_name }}_id', 'image_id');
	}
@endif
@endforeach

}