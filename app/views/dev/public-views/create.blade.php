{{ Form::open(['route' => 'dev.public-views.store']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{{ Input::old('name') }}}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="content" class="form-control">{{{ Input::old('content') }}}</textarea>
	<div class="well" id="content"/>
	{{ $errors->first('content', '<br><div class="alert alert-danger">:message</div>') }}
</div>

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-views.index') }}">Cancel</a>
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