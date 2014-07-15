@if(!$files)
<p><i>No files</i></p>
@endif

@foreach ($files as $index => $file)
	<span class="pull-right">
		{{ Form::open(['route' => ['dev.files.destroy', $index], 'method' => 'delete']) }}
		<button class="btn btn-danger btn-xs">Delete</button>
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

<a class="btn btn-default" href="{{ URL::route('dev.files.create') }}">Upload</a>