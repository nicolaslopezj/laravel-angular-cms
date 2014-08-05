@foreach ($comments as $index => $comment)
	@if ($index != 0)
		<hr>
	@endif

	<div class="row">
		<div class="col-xs-12">
			<div style="padding-left: 15px">
				<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('admin.comments.show', $comment->id) }}">View</a>
				<p >
					@if (!$comment->readed)
						<i class="fa fa-circle" style="margin-left: -20px; margin-right: 6px; color:#158cba"></i>
					@endif
					By:
					<b>{{ $comment->email }}</b>
				</p>
				<p>
					Reason:
					<b>{{ $comment->reason }}</b>
				</p>
				<p>
					On:
					<b>{{ $comment->created_at }}</b>
				</p>
			</div>
		</div>
	</div>
@endforeach
@if (!$comments->count())
	<p><i>No comments</i></p>
@endif

{{ $comments->links() }}

<hr>
<a class="btn btn-default" href="{{ URL::route('admin.comments.export_all') }}">Download All</a>
<a class="btn btn-default" href="{{ URL::route('admin.comments.export_nonreaded') }}">Download Unreaded</a>