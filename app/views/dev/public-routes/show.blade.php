<p><b>Name</b></p>
<pre>
{{ $public_route->name }}
</pre>

<p><b>Path</b></p>
<pre>
{{ $public_route->path }}
</pre>

<p><b>Function</b></p>
<pre>
{{ $public_route->function }}
</pre>

<hr>
<a class="btn btn-default" href="{{ URL::route('dev.public-routes.index') }}">Back</a>
<a class="btn btn-warning" href="{{ URL::route('dev.public-routes.edit', $public_route->id) }}">Edit</a>
<a class="btn btn-danger" href="{{ URL::route('dev.public-routes.delete', $public_route->id) }}">Delete</a>