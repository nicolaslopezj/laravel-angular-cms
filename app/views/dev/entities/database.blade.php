@foreach ($migrations['info'] as $table)
	<p><b>{{ $table['name'] }}</b></p>
	<table class="table table-hover well" style="font-family:Menlo,Monaco,Consolas,'Courier New',monospace; font-size: 14px">
		<tr>
			<th>{{ trans('dev.Field') }}</th>
			<th>{{ trans('dev.Type') }}</th>
			<th>{{ trans('dev.Null') }}</th>
			<th>{{ trans('dev.Key') }}</th>
			<th>{{ trans('dev.Default') }}</th>
			<th>{{ trans('dev.Extra') }}</th>
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
	href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=refresh">{{ trans('dev.Run')}} </a>
	{{ trans('dev.Refresh')}}:
</h4>

<pre>{{ $migrations['refresh'] }}</pre>

<hr>

<h4>
	<a class="btn btn-primary btn-xs pull-right"
	href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=delete">{{ trans('dev.Run')}}</a>
	{{ trans('dev.Delete') }}:
</h4>
<pre>{{ $migrations['delete'] }}</pre>


@foreach ($entity->attributes as $index => $attribute)
	<hr>
	<h4>
		<a class="btn btn-primary btn-xs pull-right"
		href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=attributes.{{ $attribute->name }}.up">{{ trans('dev.Run')}}</a>
		{{ $attribute->name }} {{ trans('dev.Up') }}:
	</h4>

	<pre>{{ $migrations['attributes'][$attribute->name]['up'] }}</pre>

	<hr>
	<h4>
		<a class="btn btn-primary btn-xs pull-right"
		href="{{ URL::route('dev.entities.migrate', $entity->id) }}?migration=attributes.{{ $attribute->name }}.down">{{ trans('dev.Run')}}</a>
		{{ $attribute->name }} {{ trans('dev.Down') }}:
	</h4>
	<pre>{{ $migrations['attributes'][$attribute->name]['down'] }}</pre>

@endforeach

<hr>
<a href="{{ URL::route('dev.entities.show', $entity->id) }}" class="btn btn-default">{{ trans('dev.Back')}}</a>
