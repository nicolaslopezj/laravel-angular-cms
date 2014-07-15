{{ Form::open(['route' => ['dev.definitions.update', $definition->id], 'method' => 'put', 'files' => true]) }}

<div class="form-group">
	<label>Identifier</label>
	<input type="text" class="form-control" name="identifier" value="{{ $definition->identifier }}">
	{{ $errors->first('identifier', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Description</label>
	<input class="form-control" name="description" value="{{ $definition->description }}">
	{{ $errors->first('description', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="checkbox">
	<label>
		{{ Form::checkbox('editable', '1', $definition->editable); }}
		Editable
	</label>
</div>

<hr>
@if ($definition->type == 'string')


<div class="form-group">
	<label>Value</label>
	<input type="text" class="form-control" name="string" value="{{ $definition->string }}">
	{{ $errors->first('string', '<br><div class="alert alert-danger">:message</div>') }}
</div>


@elseif ($definition->type == 'text')

<div class="form-group">
	<label>Value</label>
	<textarea class="form-control" name="text">{{ $definition->text }}</textarea>
	{{ $errors->first('text', '<br><div class="alert alert-danger">:message</div>') }}
</div>

@elseif ($definition->type == 'integer')

<div class="form-group">
	<label>Value</label>
	<input type="text" class="form-control" name="integer" value="{{ $definition->integer }}">
	{{ $errors->first('integer', '<br><div class="alert alert-danger">:message</div>') }}
</div>

@elseif ($definition->type == 'image')

<div class="form-group">
	<label>Value</label>
	<div>
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
			<div>
				<span class="btn btn-default btn-file">
					<span class="fileinput-new">Select image</span>
					<span class="fileinput-exists">Change</span>
					<input type="file" name="file">
				</span>
				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			</div>
		</div>
	</div>
	{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
</div>

@endif

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.definitions.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}