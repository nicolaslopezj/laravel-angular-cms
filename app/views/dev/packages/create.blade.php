{{ Form::open(['route' => 'dev.packages.store', 'files' => true]) }}

<div class="form-group">
	<label>{{ trans('dev.Upload_The_Package') }}</label>
	<div>
		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			<div class="form-control" data-trigger="fileinput">
				<i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span>
			</div>
			<span class="input-group-addon btn btn-default btn-file">
				<span class="fileinput-new">{{ trans('dev.Select_File') }}</span>
				<span class="fileinput-exists">{{ trans('dev.Change') }}</span>
				<input type="file" name="file">
			</span>
			<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('dev.Delete') }}</a>
		</div>
	</div>
	{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Enter_Github_URL') }}</label>
	<div>
		<input class="form-control" name="github" value="{{ Input::old('github') }}">
	</div>
	{{ $errors->first('github', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.files.index') }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('dev.Install') }}</button>
</div>

{{ Form::close() }}