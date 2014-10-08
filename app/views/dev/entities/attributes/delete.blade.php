{{ Form::open(['route' => ['dev.entities.attributes.destroy', $entity->id, $attribute->id], 'method' => 'delete']) }}

<p><b>{{ trans('dev.Attribute_Delete') }}</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.show', $entity->id) }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-danger">{{ trans('dev.Delete') }}</button>
</div>

{{ Form::close() }}