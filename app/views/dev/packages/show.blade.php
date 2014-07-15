<p>
	<b>{{ $package }}</b>
</p>

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.packages.index') }}">Back</a>
<a class="btn btn-danger" href="{{ URL::route('dev.packages.delete', $package) }}">Delete</a>