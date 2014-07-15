@foreach ($definitions as $index => $definition)
	@if ($index != 0)
		<hr>
	@endif

	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('admin.definitions.show', $definition->id) }}">View</a>
			<p >
				<b>{{ $definition->identifier }}</b> <br>
				<span class="text-muted">{{ $definition->description }}</span><br>
				{{ $definition->string }}
				{{ str_limit($definition->text, 100) }}
				{{ $definition->integer }}
				@if ($definition->image_id)
					<img class="img-circle" style="margin-top:10px" src="{{ asset($definition->image->thumbnail_xs) }}">
				@endif
			</p>
		</div>
	</div>

@endforeach

{{ $definitions->links() }}