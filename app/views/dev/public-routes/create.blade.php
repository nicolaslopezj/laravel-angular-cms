{{ Form::open(['route' => 'dev.public-routes.store']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
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
					<input type="radio" name="function_type" value="view" checked>
					Show a view
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="function_type" value="entity">
					Show a entity
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="function_type" value="custom">
					Custom
				</label>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="form-group">
				<label>View</label>
				<select class="form-control" name="function_view">
					@foreach (PublicViewDriver::all() as $index => $view)
						<option>{{ $view->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Custom Function</label>
				<textarea name="function_custom" class="form-control">{{ Input::old('function_custom') }}</textarea>
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

{{ Form::close() }}