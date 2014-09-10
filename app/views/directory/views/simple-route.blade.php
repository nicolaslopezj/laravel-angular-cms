<!--{{ $route->name }}-->
<div class="clearfix">
	@if ($route->meta_title)
		<h3>@evaluate($route->meta_title)</h3>
		<br>
	@endif
	@if ($route->meta_image)
		<img style="max-width: 100%; margin-top: 10px; margin-bottom: 10px;" src="
		@evaluate($route->meta_image)
		" alt="
		@evaluate($route->meta_title)
		">
	@endif
	@if ($route->meta_description)
		<p>@evaluate($route->meta_description)</p>
	@endif
	<br>
	<a class="btn btn-primary btn-xs pull-right" href="{{ route($route->name) }}">
		{{ $route->path ? $route->path : '/' }}
	</a>
</div>
