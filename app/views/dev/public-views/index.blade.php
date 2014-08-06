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
			@if ($public_view->tag)
				<p>
					<span class="label label-danger" style="margin-right: 10px">
						<a href="?tag={{ $public_view->tag }}" style="color: white">
							{{ $public_view->tag }}
						</a>
					</span>
				</p>
			@endif
		</div>
	</div>
	<hr>
@endforeach

{{ $public_views->appends(array('tag' => Input::get('tag') ))->links() }}


<a class="btn btn-default" href="{{ URL::route('dev.public-views.create') }}">Create</a>