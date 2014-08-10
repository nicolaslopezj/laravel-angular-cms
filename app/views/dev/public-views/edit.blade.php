{{ Form::open(['route' => ['dev.public-views.update', $public_view->id], 'method' => 'put']) }}

<div class="form-group">
	<label>Content</label>
	<textarea name="content" class="form-control">{{{ $public_view->content }}}</textarea>
	<div class="well" id="content"/>
	{{ $errors->first('content', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Tag</label>
	<input class="form-control" name="tag" value="{{{ $public_view->tag }}}">
	{{ $errors->first('tag', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-views.show', $public_view->id) }}">Back</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}

<style type="text/css" media="screen">
    #content { 
        height: 600px;
    }
</style>
