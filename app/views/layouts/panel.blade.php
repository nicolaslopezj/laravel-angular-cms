<div class="col-sm-8 col-sm-offset-2">
	@if (is_array($content))
		@foreach ($content as $index => $cont)
			<h3>{{ $cont['title'] }}</h3>
			<hr><br>
			<div class="well clearfix">
				{{ $cont['content'] }}
			</div>
			<br><br>
		@endforeach
	@else
		<h3>{{ $title }}</h3>
		<hr><br>
		<div class="well clearfix">
			{{ $content }}
		</div>
		
	@endif
</div>
