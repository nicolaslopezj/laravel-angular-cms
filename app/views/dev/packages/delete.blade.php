{{ Form::open(['route' => ['dev.packages.destroy', $package], 'method' => 'delete']) }}

<p><b>Are you sure you want to uninstall this package?</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.packages.show', $package) }}">Cancel</a>
	<button class="btn btn-danger">Delete</button>
</div>

{{ Form::close() }}