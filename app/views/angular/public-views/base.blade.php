@extends('angular.layouts.layout')

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-views/sidebar-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-views/views-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-views/view.js') }}"></script>
@stop


@section('sidebar')
@parent
@include('angular.public-views.views.sidebar')
@stop

@section('content')
@include('angular.public-views.views.editor')
@stop