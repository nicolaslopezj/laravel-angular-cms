<h4>
	<b>{{ $entity->name }}</b>
</h4>
<p>
	<b>Table Name:</b>
	<code>{{ $entity->table_name }}</code>
</p>
<p>
	<b>Route Name:</b>
	<code>{{ $entity->route_name }}</code>
</p>
<p>
	<b>Model Name:</b>
	<code>{{ $entity->model_name }}</code>
</p>

<hr>
@foreach ($entity->attributes as $index => $attribute)
	@if ($index != 0) 
		<hr>
	@endif
	<h4>
		<b>{{ $attribute->name }}</b>
	</h4>
	<p class="help-block">
		{{ $attribute->description }}
	</p>
	<p>
		<b>Type:</b>
		<code>{{ $attribute->type }}</code>
	</p>
	<p>
		<a class="btn btn-danger btn-xs" href="{{ URL::route('dev.entities.attributes.delete', [$entity->id, $attribute->id]) }}">
			Delete
		</a>
	</p>
@endforeach

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.entities.index') }}">Back</a>
<a href="{{ URL::route('dev.entities.database', $entity->id) }}" class="btn btn-warning">Database</a>
<a href="{{ URL::route('dev.entities.delete', $entity->id) }}" class="btn btn-danger">Delete</a>
<a href="{{ URL::route('dev.entities.attributes.create', $entity->id) }}" class="btn btn-primary">Add Attribute</a>