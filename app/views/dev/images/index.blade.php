@foreach ($images as $index => $image)
	<div class="row">
		<div class="col-xs-2">
			<img class="img-responsive" src="{{ asset($image->thumbnail_xs) }}">
		</div>
		<div class="col-xs-10">
			<p>
				<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.images.show', $image->id) }}">View</a>
				{{ $image->name }}

				<div class="">
					<div class="pull-left image-color" style="background-color:{{ $image->key_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $image->secondary_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $image->background_color }}"></div>
				</div>
			</p>
		</div>
	</div>

	<br>
@endforeach

{{ $images->links() }}

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.images.create') }}">Upload</a>

<style>
.image-color {
	width:20px;
	height:20px;
	margin-right: 10px;
	margin-top: -7px;
	border: 1px solid grey;
}
</style>