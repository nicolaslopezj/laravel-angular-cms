@foreach ($entities as $index => $entity)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.entities.show', $entity->id) }}">{{ trans('dev.View') }}</a>
			<p>
				{{ trans('dev.Name') }}:
				<b>{{ $entity->name }}</b>
			</p>
		</div>
	</div>
	<hr>
@endforeach

{{ $entities->links() }}

<a class="btn btn-default" href="{{ URL::route('dev.entities.create') }}">{{ trans('dev.Create') }}</a>