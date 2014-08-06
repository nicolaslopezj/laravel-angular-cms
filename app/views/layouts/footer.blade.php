<div class="container footer">
	<br>
	<hr>
	<div class="row">
		<div class="col-sm-8">
			<a href="http://lopezjullian.com" target="_BLANK" style="top: 1px; position:relative; margin-right: 6px; color:#959595;">
				<i class="fa fa-code" style="font-size:16px; margin-right: 5px;"></i>
				<span>
					Nicolás López
				</span>
			</a>
			
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