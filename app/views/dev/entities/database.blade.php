@foreach ($migrations['info'] as $table)
	<p><b>{{ $table['name'] }}</b></p>
	<table class="table table-hover well" style="font-family:Menlo,Monaco,Consolas,'Courier New',monospace; font-size: 14px">
		<tr>
			<th>Field</th>
			<th>Type</th>
			<th>Null</th>
			<th>Key</th>
			<th>Default</th>
			<th>Extra</th>
		</tr>
		@foreach($table['info'] as $info)
			<tr>
				<td>{{ $info->Field }}</td>
				<td>{{ $info->Type }}</td>
				<td>{{ $info->Null }}</td>
				<td>{{ $info->Key }}</td>
				<td>{{ $info->Default }}</td>
				<td>{{ $info->Extra }}</td>
			</tr>
		@endforeach
	</table>
@endforeach

<hr>

<h4>
	<a class="btn btn-primary btn-xs pull-right" 
	href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=refresh">Run</a>
	Refresh:
</h4>

<pre>{{ $migrations['refresh'] }}</pre>

<hr>

<h4>
	<a class="btn btn-primary btn-xs pull-right" 
	href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=delete">Run</a>
	Delete:
</h4>
<pre>{{ $migrations['delete'] }}</pre>


@foreach ($entity->attributes as $index => $attribute)
	<hr>
	<h4>
		<a class="btn btn-primary btn-xs pull-right" 
		href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=attributes.{{ $attribute->name }}.up">Run</a>
		{{ $attribute->name }} up:
	</h4>

	<pre>{{ $migrations['attributes'][$attribute->name]['up'] }}</pre>

	<hr>
	<h4>
		<a class="btn btn-primary btn-xs pull-right" 
		href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=attributes.{{ $attribute->name }}.down">Run</a>
		{{ $attribute->name }} down:
	</h4>
	<pre>{{ $migrations['attributes'][$attribute->name]['down'] }}</pre>

@endforeach

<hr>
<a href="{{ URL::route('dev.entities.show', $entity->id) }}" class="btn btn-default">Back</a>
