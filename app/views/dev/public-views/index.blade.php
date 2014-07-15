@foreach ($public_views as $index => $public_view)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.public-views.show', $public_view->id) }}">View</a>
			<p>
				Name:
				<b>{{ $public_view->name }}</b>
			</p>
			<p>
				File:
				<b>site/{{ $public_view->name }}.blade.php</b>
			</p>
		</div>
	</div>
	<hr>
@endforeach

{{ $public_views->links() }}


<a class="btn btn-default" href="{{ URL::route('dev.public-views.create') }}">Create</a>