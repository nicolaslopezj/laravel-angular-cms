{{ Form::open(['route' => ['dev.public-routes.update', $public_route->id], 'method' => 'put']) }}

<div class="row">
	<div class="col-sm-7">
		<div class="form-group">
			<label>Name</label>
			<input name="name" class="form-control" value="{{{ $public_route->name }}}">
			{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<label>Tag</label>
			<input class="form-control" name="tag" value="{{{ $public_route->tag }}}">
			{{ $errors->first('tag', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
</div>

<div class="form-group">
	<label>Path</label>
	<input name="path" class="form-control" value="{{{ $public_route->path }}}">
	{{ $errors->first('path', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Function</label>
	<textarea name="function" class="form-control">{{{ $public_route->function }}}</textarea>
	<div class="well" id="function"/>
	{{ $errors->first('function', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-routes.show', $public_route->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}

<style type="text/css" media="screen">
    #function { 
        height: 350px;
    }
</style>
<script>
    var editor = ace.edit("function");
	var textarea = $('textarea[name="function"]').hide();
	editor.getSession().setMode("ace/mode/php");
	editor.getSession().setValue(textarea.val());
	editor.getSession().on('change', function(){
	  textarea.val(editor.getSession().getValue());
	});
</script>
