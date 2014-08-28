@extends('layouts.master')

@section('sidebar')
@include('admin.layouts.sidebar')
@stop

@section('content')
<br>
<div class="row">
	@include('layouts.panel')
</div>

@stop