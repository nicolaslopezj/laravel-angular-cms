<p><b>Content</b></p>
<pre>
{{{ $public_view->content }}}
</pre>

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.public-views.index') }}">Back</a>
<a class="btn btn-warning" href="{{ URL::route('dev.public-views.edit', $public_view->id) }}">Edit</a>
<a class="btn btn-danger" href="{{ URL::route('dev.public-views.delete', $public_view->id) }}">Delete</a>