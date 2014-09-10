<!--{{ $route->name }}-->
<div class="clearfix">
	@if (array_key_exists('title', json_decode($route->directory, 1)))
		<h3>@evaluate(json_decode($route->directory, 1)['title'])</h3>
		<br>
	@endif
	@if (array_key_exists('image', json_decode($route->directory, 1)))
		<img style="max-width: 100%; margin-top: 10px; margin-bottom: 10px;" src="
		@evaluate(json_decode($route->directory, 1)['image'])
		" alt="
		@evaluate(json_decode($route->directory, 1)['title'])
		">
	@endif
	@if (array_key_exists('description', json_decode($route->directory, 1)))
		<p>@evaluate(json_decode($route->directory, 1)['description'])</p>
	@endif
	<br>
	<a class="btn btn-primary btn-xs pull-right" href="{{ route($route->name) }}">
		{{ $route->path ? $route->path : '/' }}
	</a>
</div>
