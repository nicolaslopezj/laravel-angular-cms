<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/') }}">
				@if (Dict::get('project_name'))
					{{ Dict::get('project_name') }} - Panel
				@else
					CMS Panel
				@endif
			</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					@if (Auth::user()->is_dev)
						<li class="{{ Helper::routeStartsWith('dev.') ? 'active' : '' }}">
							<a href="{{ route('dev.index') }}">Dev</a>
						</li>
					@endif
					@if (Auth::user()->is_admin || Auth::user()->is_dev)
						<li class="{{ Helper::routeStartsWith('admin.') ? 'active' : '' }}">
							<a href="{{ route('admin.index') }}">Admin</a>
						</li>
					@endif
					<li class="{{ Helper::routeStartsWith('me.') ? 'active' : '' }}">
						<a href="{{ route('me.index') }}">{{ Auth::user()->name }}</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>