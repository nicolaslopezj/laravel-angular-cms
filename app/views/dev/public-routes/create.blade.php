{{ Form::open(['route' => 'dev.public-routes.store']) }}


<div class="row">
	<div class="col-sm-7">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" name="name" value="{{ Input::old('name') }}">
			{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<label>Tag</label>
			<input class="form-control" name="tag" value="{{{ Input::old('tag') }}}">
			{{ $errors->first('tag', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
</div>

<div class="form-group">
	<label>Path</label>
	<input class="form-control" name="path" value="{{ Input::old('path') }}">
	{{ $errors->first('path', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Function</label>
	<div class="row">
		<div class="col-sm-3">
			<div class="radio">
				<label>
					<input type="radio" name="function_type" value="view" 
					@if (Input::old('function_type') == 'view')
						checked
					@endif
					>
					Show a view
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="function_type" value="custom"
					@if (Input::old('function_type') == 'custom')
						checked
					@endif
					>
					Custom
				</label>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="form-group function_type_view_container">
				<label>View</label>
				<select class="form-control" name="function_view">
					@foreach (PublicViewDriver::all() as $index => $view)
						<option>{{ $view->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group function_type_custom_container">
				<label>Custom Function</label>
				<textarea name="function_custom" class="form-control">{{ Input::old('function_custom') }}</textarea>
				<div class="well" id="function_custom"/>
			</div>
		</div>
	</div>
	{{ $errors->first('function', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-routes.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

<script>
$(document).ready(function() {
	$("input[name='function_type']").change(function() {
		selectChanged();
	});
	selectChanged();
});
function selectChanged() {
	var value = $('input[name=function_type]:checked').val();
	if (value == 'view') {
		$('.function_type_view_container').show();
		$('.function_type_custom_container').hide();
	} else if (value == 'custom') {
		$('.function_type_view_container').hide();
		$('.function_type_custom_container').show();
	} else {
		$('.function_type_view_container').hide();
		$('.function_type_custom_container').hide();
	}
}
</script>

{{ Form::close() }}

<style type="text/css" media="screen">
    #function_custom { 
        height: 350px;
    }
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("function_custom");
	var textarea = $('textarea[name="function_custom"]').hide();
	editor.getSession().setMode("ace/mode/php");
	editor.getSession().setValue(textarea.val());
	editor.getSession().on('change', function(){
	  textarea.val(editor.getSession().getValue());
	});
</script>




