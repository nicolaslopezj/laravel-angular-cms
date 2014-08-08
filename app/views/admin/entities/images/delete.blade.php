{{ Form::open(['route' => ['admin.' . $entity->route_name . '.' . $attribute . '.destroy', $item->id, $image->id], 'method' => 'delete']) }}

<p><b>Are you sure you want to delete this image?</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.show', [$item->id, $image->id]) }}">
		Cancel
	</a>
	<button class="btn btn-danger">Delete</button>
</div>

{{ Form::close() }}