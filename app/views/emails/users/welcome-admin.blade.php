@extends('emails.layouts.base')

@section('content')

<p>
	<b>
		Welcome
	</b>
</p>

<p>
	{{ $user->name }}, welcome to
	@if (Dict::get('project_name'))
		{{ Dict::get('project_name') }}.
	@else
		CMS Panel.
	@endif
</p>

<p>
	Your password is <code>{{ $password }}</code>.
	To change it <a href="{{ URL::route('me.settings.edit') }}">click here</a>
</p>

@stop