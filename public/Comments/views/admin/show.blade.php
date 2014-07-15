<p>
	By: 
	<b>{{ $comment->email }}</b>
</p>
<p>
	On: 
	<b>{{ $comment->created_at }}</b>
</p>
<hr>
<p>
	{{{ $comment->message }}}
</p>
<hr>
{{ Form::open(['route' => ['admin.comments.destroy', $comment->id], 'method' => 'delete']) }}
<a class="btn btn-default" href="{{ URL::route('admin.comments.index') }}">Back</a>
<button class="btn btn-danger">Delete</button>
{{ Form::close() }}