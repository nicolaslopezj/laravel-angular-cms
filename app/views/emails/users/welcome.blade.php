@extends('emails.layouts.base')

@section('content')

<p>
	<b>
		Welcome
	</b>
</p>

<p>
	{{ $user->first_name }}, welcome to Vendik.
</p>

@stop