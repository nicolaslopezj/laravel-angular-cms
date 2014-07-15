@foreach ($entity->attributes as $index => $attribute)
	@if ($index != 0) 
		<hr>
	@endif
	<h4>
		<b>{{ $attribute->name }}</b>
	</h4>
	<p>
		<b>Type:</b>
		<code>{{ $attribute->type }}</code>
	</p>
	@if ($attribute->validations) 
		<p>
			<b>Validations:</b>
			<code>{{ $attribute->validations }}</code>
		</p>
	@endif
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