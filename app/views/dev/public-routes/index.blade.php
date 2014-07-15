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
		</div>
	</div>
	<hr>
@endforeach

{{ $public_routes->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.public-routes.create') }}">Create</a>