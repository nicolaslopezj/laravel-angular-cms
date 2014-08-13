@extends('angular.layouts.layout')

@section('scripts')
<script type="text/javascript" src="{{ asset('src/angular/public-views/sidebar-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-views/views-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-views/view.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/bower_components/angular-ui-ace/ui-ace.js') }}"></script>
@stop


@section('sidebar')
@parent
@include('dev.public-views.sidebar')
@stop

@section('content')
@include('dev.public-views.editor')

@stop