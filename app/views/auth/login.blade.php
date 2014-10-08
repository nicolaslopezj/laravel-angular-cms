{{ Form::open(['route' => 'auth.login.post']) }}
<h3>{{ trans('me.Login') }}</h3>
<hr><br>
@if (Session::get('url.intended'))
<div class="alert alert-warning">{{ trans('me.Login_Needed') }}</div>
@endif
@if (Session::get('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="form-group">
	<label>{{ trans('me.Email') }}</label>
	<input type="email" class="form-control" name="email">
</div>
<div class="form-group">
	<label>{{ trans('me.Password') }}</label>
	<input type="password" class="form-control" name="password">
</div>
<div class="clearfix">
	<div class="form-group pull-right">
		<label class="checkbox">
			<input type="checkbox" name="remember">
			{{ trans('me.Remember_Me') }}
		</label>
	</div>
	<a href="{{ URL::action('Cms\Auth\Controllers\RemindersController@getRemind') }}">
		{{ trans('me.Forgot') }}
	</a>
</div>
<style type="text/css">
.checkbox {
	margin: 0px;
}
</style>

<button class="btn btn-primary pull-right">{{ trans('me.Login') }}</button>
{{ Form::close() }}