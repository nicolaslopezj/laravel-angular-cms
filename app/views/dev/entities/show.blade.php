<h4>
	<b>{{ $entity->name }}</b>
</h4>
<p>
	<b>{{ trans('dev.Table_Name') }}:</b>
	<code>{{ $entity->table_name }}</code>
</p>
<p>
	<b>{{ trans('dev.Route_Name') }}:</b>
	<code>{{ $entity->route_name }}</code>
</p>
<p>
	<b>{{ trans('dev.Model_Name') }}:</b>
	<code>{{ $entity->model_name }}</code>
</p>
<p>
	<b>{{ trans('dev.Has_Slug') }}:</b>
	<code>{{ $entity->has_slug ? 'true' : 'false' }}</code>
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
		<b>{{ trans('dev.Type') }}:</b>
		<code>{{ trans('dev.'. ucfirst($attribute->type)) }}</code>
	</p>
	<p>
		<a class="btn btn-danger btn-xs" href="{{ URL::route('dev.entities.attributes.delete', [$entity->id, $attribute->id]) }}">
			{{ trans('dev.Delete') }}
		</a>
	</p>
@endforeach

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.entities.index') }}">{{ trans('dev.Back') }}</a>
<a href="{{ URL::route('dev.entities.database', $entity->id) }}" class="btn btn-warning">{{ trans('dev.Database') }}</a>
<a href="{{ URL::route('dev.entities.delete', $entity->id) }}" class="btn btn-danger">{{ trans('dev.Delete') }}</a>
<a href="{{ URL::route('dev.entities.attributes.create', $entity->id) }}" class="btn btn-primary">{{ trans('dev.Add_Attribute') }}</a>