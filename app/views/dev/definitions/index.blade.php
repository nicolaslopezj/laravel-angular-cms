<div class="row">
	<div class="col-sm-12">
		<span class="label label-{{ !Input::get('tag') ? 'danger' : 'default' }}" style="margin-right: 10px">
			<a href="?" style="color: white">
				all
			</a>
		</span>
		@foreach ($tags as $tag)
			<span class="label label-{{ $tag == Input::get('tag') ? 'danger' : 'default' }}" style="margin-right: 10px">
				<a href="?tag={{ $tag }}" style="color: white">
					{{ $tag }}
				</a>
			</span>
		@endforeach
	</div>
</div>
<hr>

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
				@if ($definition->tag)
					<p>
						<span class="label label-danger" style="margin-right: 10px">
							<a href="?tag={{ $definition->tag }}" style="color: white">
								{{ $definition->tag }}
							</a>
						</span>
					</p>
				@endif
				<hr>
			</div>
		</div>
	</div>

@endforeach

{{ $definitions->appends(array('tag' => Input::get('tag') ))->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.definitions.create') }}">Create</a>