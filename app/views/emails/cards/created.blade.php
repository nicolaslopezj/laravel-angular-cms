@extends('emails.layouts.base')

@section('content')

<p>
	<b>
		Card deleted linked to account:
	</b>
</p>

<p>
	The <b>{{ $card->brand }}</b> card, ending in <b>{{ $card->last4 }}</b>, alias <b>{{ $card->alias }}</b>,
	has been added to your account.
</p>

@stop