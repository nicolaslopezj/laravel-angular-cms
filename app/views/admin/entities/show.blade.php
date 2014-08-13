<div class="row">
	@if ($entity->main_image_attribute && $item->{'image_' . $entity->main_image_attribute->name})
		<div class="col-xs-4">
			<br>
			<img class="img-thumbnail img-responsive" src="{{ asset($item->{'image_' . $entity->main_image_attribute->name}->path) }}">
		</div>
		<div class="col-xs-8">
	@else
		<div class="col-xs-12">
	@endif
		<h1>{{ $item->{$entity->main_attribute->name} }}</h1>

		@foreach ($entity->attributes as $index => $attribute)
			@if ($attribute->type == 'string')
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p>{{ $item->{$attribute->name} }}</p>
			@endif
			@if ($attribute->type == 'slug')
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p>{{ $item->{$attribute->name} }}</p>
			@endif
			@if ($attribute->type == 'text')
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p>{{ nl2br(str_limit($item->{$attribute->name}, 300)) }}</p>
			@endif
			@if ($attribute->type == 'integer')
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p>{{ $item->{$attribute->name} }}</p>
			@endif
			@if ($attribute->type == 'image' && $item->{'image_' . $attribute->name})
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p>{{ asset($item->{'image_' . $attribute->name}->path) }}</p>
				<div class="">
					<div class="pull-left image-color" style="background-color:{{ $item->{'image_' . $attribute->name}->key_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $item->{'image_' . $attribute->name}->secondary_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $item->{'image_' . $attribute->name}->background_color }}"></div>
				</div>
				<br>
				<p>{{ $item->{'image_' . $attribute->name}->width }}x{{ $item->{'image_' . $attribute->name}->height }}</p>
			@elseif ($attribute->type == 'image')
				<p><b>{{ ucfirst($attribute->name) }}</b></p>
				<p><i>Empty</i></p>
			@endif
		@endforeach	
	</div>
</div>


<hr>
<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.index') }}">Back</a>
@foreach ($entity->attributes as $index => $attribute)
	@if ($attribute->type == 'image_array')
		<a class="btn btn-primary" href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute->name . '.index', $item->id) }}">
			{{ ucfirst($attribute->name) }}
		</a>
	@endif
@endforeach
<a class="btn btn-warning" href="{{ URL::route('admin.' . $entity->route_name . '.edit', $item->id) }}">Edit</a>
<a class="btn btn-danger" href="{{ URL::route('admin.' . $entity->route_name . '.delete', $item->id) }}">Delete</a>


<style>
.image-color {
	width:20px;
	height:20px;
	margin-right: 10px;
	margin-top: -7px;
	border: 1px solid grey;
}
</style>