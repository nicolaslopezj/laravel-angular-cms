<table class="container">
	<tr>
		<td>

			<table class="row">
				<tr>
					<td class="wrapper last">

						<table class="twelve columns">
							<tr>
								<td>
									@include('emails.layouts.header')
								</td>
								<td class="expander"></td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
			<table class="row">
				<tr>
					<td class="wrapper last">

						<table class="twelve columns">
							<tr>
								<td>
									@yield('content')
								</td>
								<td class="expander"></td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
			<table class="row">
				<tr>
					<td class="wrapper last">

						<table class="twelve columns">
							<tr>
								<td>
									@include('emails.layouts.footer')
								</td>
								<td class="expander"></td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>





