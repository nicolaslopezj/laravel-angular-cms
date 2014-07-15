{{ Form::open(['route' => ['dev.public-routes.destroy', $public_route->id], 'method' => 'delete']) }}

<p><b>Are you sure you want to delete this route?</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-routes.show', $public_route->id) }}">Cancel</a>
	<button class="btn btn-danger">Delete</button>
</div>

{{ Form::close() }}