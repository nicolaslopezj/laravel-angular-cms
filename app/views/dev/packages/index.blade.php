@foreach ($packages as $index => $package)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('dev.packages.show', $package) }}">{{ trans('dev.View') }}</a>
			<p>
				<b>{{ $package }}</b>
			</p>
		</div>
	</div>
	<hr>
@endforeach

<a class="btn btn-default" href="{{ URL::route('dev.packages.create') }}">{{ trans('dev.Install') }}</a>
