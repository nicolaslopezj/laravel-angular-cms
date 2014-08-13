@foreach ($items as $index => $item)
	@if ($index != 0)
		<hr>
	@endif
	<div class="row">
		@if ($entity->main_image_attribute && $item->{'image_' . $entity->main_image_attribute->name})
			<div class="col-xs-2">
				<img class="img-circle pull-right" width="60" src="{{ asset($item->{'image_' . $entity->main_image_attribute->name}->thumbnail_sm) }}">
			</div>
			<div class="col-xs-10">
		@elseif ($entity->main_image_attribute)
			<div class="col-xs-2">
				
			</div>
			<div class="col-xs-10">
		@else
			<div class="col-xs-12">
		@endif
			<div class="pull-right">
				<a class="btn btn-default btn-xs" href="{{ URL::route('admin.' . $entity->route_name . '.show', $item->id) }}">View</a>
			</div>
			<h4>
				@if ($entity->main_attribute)
					{{ $item->{$entity->main_attribute->name} }}
				@else
					<code>{{ $item->id }}</code>
				@endif
			</h4>
		</div>
	</div>

@endforeach

@if (count($items) == 0) 
<p><i>No items.</i></p>
@endif

{{ $items->links() }}

<hr>
<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.create') }}">Create</a>