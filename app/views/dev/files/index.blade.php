@if(!$files)
<p><i>{{ trans('dev.No_Files') }}</i></p>
@endif

@foreach ($files as $index => $file)
	<span class="pull-right">
		{{ Form::open(['route' => ['dev.files.destroy', $index], 'method' => 'delete']) }}
		<button class="btn btn-danger btn-xs">{{ trans('dev.Delete') }}</button>
		{{ Form::close() }}
	</span>
	<p>
		<span style="margin-right: 10px"><i class="fa {{ FilesHelper::extensionToIcon($file['extension']) }}"></i></span>
		<span>{{ $file['name'] }}</span>
	</p>
	<p class="help-block">
		{{ asset('uploads/files/' . $file['name']) }}
	</p>
	<hr>
@endforeach

<a class="btn btn-default" href="{{ URL::route('dev.files.create') }}">{{ trans('dev.Upload') }}</a>