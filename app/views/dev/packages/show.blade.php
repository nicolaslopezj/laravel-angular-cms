<p>
	<b>{{ $package }}</b>
</p>

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.packages.index') }}">{{ trans('dev.Back') }}</a>
<a class="btn btn-danger" href="{{ URL::route('dev.packages.delete', $package) }}">{{ trans('dev.Delete') }}</a>