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

			</ul>
		</div>
	</div>
</div>