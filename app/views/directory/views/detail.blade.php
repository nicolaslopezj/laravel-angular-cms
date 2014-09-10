@extends('directory.layouts.base')

@section('body')

<br><br><br>
<div class="row">
	<div class="col-sm-12">
		<h1>
			<a class="btn btn-primary btn-xs pull-right" href="{{ route('site.directory.index') }}">
				Back
			</a>
			@if (array_key_exists('title', json_decode($route->directory, 1)))
				@evaluate(json_decode($route->directory, 1)['title'])
			@else 
				Directory
			@endif
		</h1>
		@if (array_key_exists('description', json_decode($route->directory, 1)))
			<p>@evaluate(json_decode($route->directory, 1)['description'])</p>
		@endif
		<hr><br>
		@foreach($items as $index => $item)
			@if ($index % 2 == 0)
			<div class="row">
			@endif

			<div class="col-sm-6">
				<div class="well">	
					@include('directory.views.detail-item', compact('route', 'item', 'identifier', 'dependency'))
				</div>
			</div>
			

			@if ($index % 2 == 1 || $index == count($items) - 1)
			</div>
			<hr>
			@endif
		@endforeach  

		<p>
			{{ $items->links() }}
		</p>
	</div>
</div>
<br><br><br>

@stop