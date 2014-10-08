{{ Form::open(['route' => ['dev.packages.destroy', $package], 'method' => 'delete']) }}

<p><b>{{ trans('dev.Package_Delete') }}</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.packages.show', $package) }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-danger">{{ trans('dev.Delete') }}</button>
</div>

{{ Form::close() }}