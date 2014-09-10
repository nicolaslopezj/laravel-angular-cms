namespace Site;

use Watson\Validating\ValidatingTrait;

class {{ $entity->model_name }} extends \Eloquent {

	use ValidatingTrait;

	protected $table = 'site_{{ $entity->table_name }}';

	public $columns = ['id', 'created_at', 'updated_at', @if ($entity->has_slug)'slug',@endif' {{ join("', '", array_pluck($entity->attributes, 'name')) }}'];

	protected $appends = ['slug_or_id'];

	protected $fillable = [@if ($entity->has_slug)'slug',@endif'{{ join("', '", array_pluck($entity->attributes, 'name')) }}'];

	protected $throwValidationExceptions = true;

	protected $rules = [
@foreach ($entity->attributes as $index => $attribute)
@if ($attribute->type == 'integer')		
		'{{ $attribute->name }}' => 'integer',
@endif
@if ($attribute->type == 'boolean')		
		'{{ $attribute->name }}' => 'boolean',
@endif
@endforeach
@if ($entity->has_slug)		
		'slug' => 'alpha_dash|regex:/[A-Za-z0-9-_]*[^0-9][A-Za-z0-9-_]*/|unique:site_{{ $entity->table_name }},slug',
@endif
	];

	public function getIdAttribute($attribute) {
		return (int) $attribute;
	}

	public function getSlugOrIdAttribute($attribute) {
		if (array_key_exists('slug', $this->attributes)) {
			return $this->attributes['slug'] ? $this->attributes['slug'] : $this->id;
		}
		return $this->id;
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