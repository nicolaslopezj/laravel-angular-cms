{{ Form::open(['route' => ['dev.definitions.destroy', $definition->id], 'method' => 'delete']) }}

<p><b>{{ trans('dev.Definition_Delete') }}</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.definitions.show', $definition->id) }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-danger">{{ trans('dev.Delete') }}</button>
</div>

{{ Form::close() }}