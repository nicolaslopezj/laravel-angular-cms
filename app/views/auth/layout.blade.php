@extends('layouts.master')

@section('structure')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			{{ $content }}
		</div>
	</div>
</div>
@stop