<div class="row">
	<div class="col-sm-12">
		
		<div class="row">
			<div class="col-sm-6">
				<img class="img-thumbnail img-responsive" src="{{ asset($image->path) }}">
			</div>
			<div class="col-sm-6">
				<p>{{ $image->path }}</p>
				<div class="">
					<div class="pull-left image-color" style="background-color:{{ $image->key_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $image->secondary_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $image->background_color }}"></div>
				</div>
				<br>
				<p>{{ $image->width }}x{{ $image->height }}</p>
			</div>
		</div>

		<hr>

		<a href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.index', $item->id) }}" class="btn btn-default">
			Back
		</a>
		<a href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.delete', [$item->id, $image->id]) }}" class="btn btn-danger">
			Delete
		</a>
	</div>
</div>

<style>
.image-color {
	width:20px;
	height:20px;
	margin-right: 10px;
	margin-top: -7px;
	border: 1px solid grey;
}
</style>