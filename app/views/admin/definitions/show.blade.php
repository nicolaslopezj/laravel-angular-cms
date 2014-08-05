<div class="row">
	<div class="col-sm-12">
		<p><b>{{ $definition->identifier }}</b></p>
		<p>
			<span class="text-muted">{{ $definition->description }}</span>
		</p>
		<hr>
		@if ($definition->type == 'string')

		<p>Value: <b>{{ $definition->string }}</b></p>

		@elseif ($definition->type == 'text')

		<p><b>Value:</b></p>
		{{ nl2br($definition->text) }}

		@elseif ($definition->type == 'integer')

		<p>Value: <b>{{ $definition->integer }}</b></p>

		@elseif ($definition->type == 'image' && $definition->image)

		<div class="row">
			<div class="col-sm-6">
				<img class="img-thumbnail img-responsive" src="{{ asset($definition->image->path) }}">
			</div>
			<div class="col-sm-6">
				<p>{{ $definition->image->path }}</p>
				<div class="">
					<div class="pull-left image-color" style="background-color:{{ $definition->image->key_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $definition->image->secondary_color }}"></div>
					<div class="pull-left image-color" style="background-color:{{ $definition->image->background_color }}"></div>
				</div>
				<br>
				<p>{{ $definition->image->width }}x{{ $definition->image->height }}</p>
			</div>
		</div>

		@endif

		<hr>
		<a href="{{ URL::route('admin.definitions.index') }}" class="btn btn-default">Back</a>
		<a href="{{ URL::route('admin.definitions.edit', $definition->id) }}" class="btn btn-default">Edit</a>
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