@if (is_array($content))
	@foreach ($content as $index => $cont)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $cont['title'] }}</h3>
			</div>
			<div class="panel-body">
				{{ $cont['content'] }}
			</div>
		</div>
	@endforeach
@else
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">{{ $title }}</h3>
		</div>
		<div class="panel-body">
			{{ $content }}
		</div>
	</div>
@endif