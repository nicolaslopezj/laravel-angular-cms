{{ Form::open(['route' => ['dev.public-views.destroy', $public_view->id], 'method' => 'delete']) }}

<p><b>Are you sure you want to delete this view?</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-views.show', $public_view->id) }}">Cancel</a>
	<button class="btn btn-danger">Delete</button>
</div>

{{ Form::close() }}