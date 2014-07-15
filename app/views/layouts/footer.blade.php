<div class="container footer">
	<br>
	<hr>
	<div class="row">
		<div class="col-sm-8">
			<p>Created by Nicolás López</p>
		</div>
		<div class="col-sm-4">
			@if(Auth::check())
			<span class="pull-right">
				Connected as {{ Auth::user()->name }},
				<a href="{{ URL::route('logout') }}">log out</a>
			</span>
			@endif
		</div>
	</div>
	<br>
</div>