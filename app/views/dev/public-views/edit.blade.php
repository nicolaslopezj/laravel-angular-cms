{{ Form::open(['route' => ['dev.public-views.update', $public_view->id], 'method' => 'put']) }}

<div class="form-group">
	<label>Content</label>
	<textarea name="content" class="form-control">{{{ $public_view->content }}}</textarea>
	<div class="well" id="content"/>
	{{ $errors->first('content', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-views.show', $public_view->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}

<style type="text/css" media="screen">
    #content { 
        height: 600px;
    }
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("content");
	var textarea = $('textarea[name="content"]').hide();
	editor.getSession().setMode("ace/mode/php");
	editor.getSession().setValue(textarea.val());
	editor.getSession().on('change', function(){
	  textarea.val(editor.getSession().getValue());
	});
</script>