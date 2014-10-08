{{ Form::open(['route' => ['dev.entities.destroy', $entity->id], 'method' => 'delete']) }}

<p><b>{{ trans('dev.Entity_Delete') }}</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.show', $entity->id) }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-danger">{{ trans('dev.Delete') }}</button>
</div>

{{ Form::close() }}