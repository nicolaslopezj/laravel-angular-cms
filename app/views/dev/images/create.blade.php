{{ Form::open(['route' => 'dev.images.store', 'files' => true]) }}

<div class="form-group">
	<label>{{ trans('dev.Choose_An_Image') }}</label>
	<div>
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new">{{ trans('dev.Select_Image') }}</span>
					<span class="fileinput-exists">{{ trans('dev.Change') }}</span>
					<input type="file" name="file">
				</span>
				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('dev.Delete') }}</a>
			</div>
		</div>
	</div>
	{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.images.index') }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('dev.Save') }}</button>
</div>

{{ Form::close() }}