<div class="clearfix">
	<img class="img-responsive" style="
	float:left;
	" src="{{ asset($image->path) }}">
	<div style="
	position: absolute;
	left:15;
	padding: 20px;
	">
		<h4 style="color:{{ $image->key_color }}; text-shadow: 0px 0px 15px {{ $image->background_color }};">
			<b>{{ $image->name }}</b>
		</h4>
	</div>
	
</div>
<hr>
<a class="btn btn-default" href="{{ URL::route('dev.images.index') }}">Back</a>