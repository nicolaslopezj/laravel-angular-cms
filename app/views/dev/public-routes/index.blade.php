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

@foreach ($public_routes as $index => $public_route)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.public-routes.show', $public_route->id) }}">View</a>
			<p>
				Name:
				<b>{{ $public_route->name }}</b>
			</p>
			<p>
				Path:
				<code>{{ $public_route->path }}</code>
			</p>
			@if ($public_route->tag)
				<p>
					<span class="label label-danger" style="margin-right: 10px">
						<a href="?tag={{ $public_route->tag }}" style="color: white">
							{{ $public_route->tag }}
						</a>
					</span>
				</p>
			@endif
		</div>
	</div>
	<hr>
@endforeach

{{ $public_routes->appends(array('tag' => Input::get('tag') ))->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.public-routes.create') }}">Create</a>