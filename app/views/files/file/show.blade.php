@extends('files.layouts.base')

@section('body')


<br><br><br>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<div class="well text-center file-box" ng-init="downloaded = false;">
			<h3 class="title">{{{ $file_link->title ? $file_link->title : 'Download File' }}}</h3>
			<p class="description">{{{ $file_link->description }}}</p>

			<i class="icon fa {{ Helper::fileExtensionToFA($file->extension) }}"></i>

			<p class="filename"><code>{{{ $file->filename }}}</code></p>
			@if ($file_link->is_valid)
			<a ng-click="downloaded = true" ng-disabled="downloaded" class="download btn btn-default" href="{{ route('files.file.download', [$file->id, $file_link->token]) }}">
				{{ Dict::get('download_page_file_button', 'Download') }}
			</a>
			<p class="expire"><i>{{ $file_link->expires_text }}</i></p>
			@else
			<a class="download btn btn-default disabled">
				{{ Dict::get('download_page_file_button_expired', 'Link Expired') }}
			</a>
			@endif
		</div>
	</div>
</div>
<br><br><br>

<style>

{{ Dict::get('download_page_file_style', '.title{margin-top:0}.icon{margin-top:25px;font-size:200px;color:#bbb}.description{color:#888;}.filename{margin-top:25px;font-size:18px}.download{margin-top:25px}.expire{margin-top:10px;color:#aaa;}') }}

/*
.title{
	margin-top: 0px;
}

.icon{
	margin-top: 25px;
	font-size: 200px;
	color: #bbb;
}

.filename {
	margin-top: 25px;
	font-size: 18px;
}

.download {
	margin-top: 25px;
}
*/
</style>

@stop