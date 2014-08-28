@extends('layouts.master')

@section('structure')


	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h1>@yield('title', 'Error')</h1>
				<hr>
				<p>@yield('text', 'A unknown error has ocurred.')</p>
			</div>
		</div>
	</div>

@stop