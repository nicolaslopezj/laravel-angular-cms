{{ Form::open(['route' => ['admin.' . $entity->route_name . '.update', $item->id], 'files' => true, 'method' => 'put']) }}

@foreach ($entity->attributes as $index => $attribute)
	@if ($attribute->type == 'string')
		<div class="form-group">
			<label>{{ ucfirst($attribute->name) }}</label>
			<p class="help-block">{{ $attribute->description }}</p>
			<input class="form-control" name="{{ $attribute->name }}" value="{{ $item->{$attribute->name} }}">
			{{ $errors->first($attribute->name, '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	@endif
	@if ($attribute->type == 'slug')
		<div class="form-group">
			<label>{{ ucfirst($attribute->name) }}</label>
			<p class="help-block">{{ $attribute->description }}</p>
			<input class="form-control" name="{{ $attribute->name }}" value="{{ $item->{$attribute->name} }}">
			{{ $errors->first($attribute->name, '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	@endif
	@if ($attribute->type == 'text')
		<div class="form-group">
			<label>{{ ucfirst($attribute->name) }}</label>
			<p class="help-block">{{ $attribute->description }}</p>
			<textarea class="form-control" name="{{ $attribute->name }}">{{ $item->{$attribute->name} }}</textarea>
			{{ $errors->first($attribute->name, '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	@endif
	@if ($attribute->type == 'integer')
		<div class="form-group">
			<label>{{ ucfirst($attribute->name) }}</label>
			<p class="help-block">{{ $attribute->description }}</p>
			<textarea class="form-control" name="{{ $attribute->name }}">{{ $item->{$attribute->name} }}</textarea>
			{{ $errors->first($attribute->name, '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	@endif
	@if ($attribute->type == 'image')
		<div class="form-group">
			<label>{{ ucfirst($attribute->name) }}</label>
			<p class="help-block">{{ $attribute->description }}</p>
			<p class="help-block">To change the current image upload a new one</p>
			<div class="row">
				<div class="col-sm-6">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
						<div>
							<span class="btn btn-default btn-file">
								<span class="fileinput-new">Select image</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="{{ $attribute->name }}">
							</span>
							<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					@if ($item->{'image_' . $attribute->name})
						<img class="img-circle pull-right" src="{{ asset($item->{'image_' . $attribute->name}->thumbnail_sm) }}">
					@endif
				</div>
			</div>
			{{ $errors->first('file', '<br><div class="alert alert-danger">:message</div>') }}
			{{ $errors->first($attribute->name, '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	@endif
@endforeach

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.' . $entity->route_name . '.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}