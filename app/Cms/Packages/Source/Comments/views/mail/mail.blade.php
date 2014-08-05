@extends('emails.layouts.base')

@section('content')

<p>
	<b>
		{{ $comment->name }}
	</b>
	<br>
	{{ $comment->email }}
</p>

<p>
	<i style="color:darkgray">
		{{ $comment->reason }}
	</i>
</p>

<p>
	"{{ $comment->message }}"
</p>

@stop