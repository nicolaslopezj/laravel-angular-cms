@extends('directory.layouts.base')

@section('body')

<br><br><br>
<div class="row">
	<div class="col-sm-12">
		<h1>Directory</h1>
		<hr><br>
		@foreach($routes as $index => $route)
			@if ($index % 2 == 0)
			<div class="row">
			@endif

			<div class="col-sm-6">
				<div class="well">	
					@if (!$route->dependencies)
						@include('directory.views.simple-route', compact('route'))
					@else
						@include('directory.views.depended-route', compact('route'))
					@endif
				</div>
			</div>
			

			@if ($index % 2 == 1 || $index == count($routes) - 1)
			</div>
			<hr>
			@endif
		@endforeach  
	</div>
</div>
<br><br><br>

@stop