<div class="container footer">
	<br>
	<hr>
	<div class="row">
		<div class="col-sm-8">
			<a href="https://github.com/nicolaslopezj/cms" target="_BLANK" style="top: 1px; position:relative; margin-right: 6px">
				<i class="fa fa-github" style="color:#959595; font-size: 20px;"></i>
			</a>
			<span>
				Nicolás López
			</span>
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