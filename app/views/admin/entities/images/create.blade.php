{{ Form::open(['route' => ['admin.' . $entity->route_name . '.' . $attribute . '.store', $item->id], 'files' => true]) }}


<br>
<div class="form-group">
	<div>
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new">Select Files</span>
					<span class="fileinput-exists">Choose Again</span>
					<input type="file" name="{{ $attribute }}[]" multiple>
				</span>
				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove Files</a>
			</div>
		</div>
	</div>
	{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
	{{ $errors->first($attribute, '<br><div class="alert alert-danger">:message</div>') }}
</div>
<br>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.' . $attribute . '.index', $item->id) }}">
		Cancel
	</a>
	<button class="btn btn-primary">Upload</button>
</div>

{{ Form::close() }}