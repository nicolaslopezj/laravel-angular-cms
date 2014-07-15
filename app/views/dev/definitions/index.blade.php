@foreach ($definitions as $index => $definition)
	<div class="row">
		<div class="col-xs-12">
			<div style="padding-left: 15px">
				<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.definitions.show', $definition->id) }}">View</a>
				<p >
					@if (!$definition->editable)
						<i class="fa fa-lock" style="margin-left: -20px; margin-right: 8px"></i>
					@endif
					<b>{{ $definition->identifier }}</b> <br>
					<span class="text-muted">{{ $definition->description }}</span><br>
					{{ $definition->string }}
					{{ str_limit($definition->text, 100) }}
					{{ $definition->integer }}
					@if ($definition->image_id)
						<img class="img-circle" style="margin-top:10px" src="{{ asset($definition->image->thumbnail_xs) }}">
					@endif
				</p>
				<hr>
			</div>
		</div>
	</div>

@endforeach

{{ $definitions->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.definitions.create') }}">Create</a>