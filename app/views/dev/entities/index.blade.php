@foreach ($entities as $index => $entity)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.entities.show', $entity->id) }}">View</a>
			<p>
				Name:
				<b>{{ $entity->name }}</b>
			</p>
		</div>
	</div>
	<hr>
@endforeach

{{ $entities->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.entities.create') }}">Create</a>