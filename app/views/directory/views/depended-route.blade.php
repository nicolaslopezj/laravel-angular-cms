<!--{{ $route->name }}-->
<div class="clearfix">
	<h3>{{ $route->name }}</h3>
	<br>
	<br>
	<a class="btn btn-primary btn-xs pull-right" href="{{ route('site.directory.depended', $route->id) }}">
		Go
	</a>
</div>
