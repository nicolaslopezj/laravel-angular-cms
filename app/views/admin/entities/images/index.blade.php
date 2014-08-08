@foreach ($images as $index => $image)
	
	@if ($index % 4 == 0) 
		@if ($index != 0)
			<hr>
		@endif
		<div class="row">
	@endif	
	
	<div class="col-sm-3">
		<center>
			<a href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.show', [$item->id, $image->id]) }}">
				<img class="img-circle" width="60" src="{{ asset($image->thumbnail_sm) }}">
			</a>
		</center>
	</div>
		
	@if ($index % 4 == 3 || $index == count($images) -1) 
		</div>
	@endif	

@endforeach

@if (count($images) == 0) 
<p><i>No images.</i></p>
@endif

<hr>
<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.show', $item->id) }}">Back</a>
<a class="btn btn-primary" href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.create', $item->id) }}">Upload</a>