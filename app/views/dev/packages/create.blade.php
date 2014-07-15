{{ Form::open(['route' => 'dev.packages.store', 'files' => true]) }}

<div class="form-group">
	<label>Upload the package</label>
	<div>
		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			<div class="form-control" data-trigger="fileinput">
				<i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span>
			</div>
			<span class="input-group-addon btn btn-default btn-file">
				<span class="fileinput-new">Select file</span>
				<span class="fileinput-exists">Change</span>
				<input type="file" name="file">
			</span>
			<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		</div>
	</div>
	{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.files.index') }}">Cancel</a>
	<button class="btn btn-primary">Upload</button>
</div>

{{ Form::close() }}