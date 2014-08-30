@extends('angular.layouts.layout')

@section('scripts')
<script type="text/javascript" src="{{ asset('src/angular/files/tree-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/files/folder-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/files/active-file-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/files/uploads-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/files/file.js') }}"></script>
@stop

@section('main_url'){{ route('admin.ajax') }}@stop

@section('sidebar')
<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
    	@include('admin.layouts.sidebar')
    </ul>
	<a href="http://nicolaslopez.co" target="_BLANK" class="creator-link">
		Nicolás López
	</a>
</div>
@stop

@section('content')
		@include('admin.files.content')
@stop