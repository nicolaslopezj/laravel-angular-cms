@extends('angular.layouts.layout')

@section('scripts')
<script type="text/javascript" src="{{ asset('src/angular/public-routes/sidebar-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-routes/routes-controller.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/angular/public-routes/route.js') }}"></script>
<script type="text/javascript" src="{{ asset('src/bower_components/angular-ui-ace/ui-ace.js') }}"></script>
@stop


@section('sidebar')
@parent
@include('dev.public-routes.sidebar')
@stop

@section('content')
@include('dev.public-routes.content')

@stop