<div class="navbar navbar-default">
	<div class="navbar-header">
		<div class="navbar-header">
			<a href="#menu-toggle" class="navbar-brand" id="menu-toggle">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</div>
	<div class="navbar-collapse collapse navbar-responsive-collapse">
		<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
				@if (Auth::user()->is_dev)
					<li class="{{ Helper::routeStartsWith('dev.') ? 'active' : '' }}">
						<a href="{{ route('dev.index') }}">{{ trans('dev.Dev') }}</a>
					</li>
				@endif
				@if (Auth::user()->is_admin || Auth::user()->is_dev)
					<li class="{{ Helper::routeStartsWith('admin.') ? 'active' : '' }}">
						<a href="{{ route('admin.index') }}">{{ trans('dev.Admin') }}</a>
					</li>
				@endif
				<li class="{{ Helper::routeStartsWith('me.') ? 'active' : '' }}">
					<a href="{{ route('me.index') }}">{{ Auth::user()->name }}</a>
				</li>
			@endif
		</ul>
	</div>
</div>