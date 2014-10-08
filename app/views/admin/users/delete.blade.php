{{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) }}

<p><b>{{ trans('admin.Delete_User') }}</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.show', $user->id) }}">{{ trans('admin.Cancel') }}</a>
	<button class="btn btn-danger">{{ trans('admin.Delete') }}</button>
</div>

{{ Form::close() }}