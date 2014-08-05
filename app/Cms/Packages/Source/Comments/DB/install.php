<?php

\Schema::create('comments', function($table)
{
	$table->increments('id');
	$table->string('name');
	$table->string('email');
	$table->string('reason');
	$table->text('message');
	
	$table->datetime('readed_at')->nullable();
	$table->timestamps();
});


$route = [
	'name' => 'comments_create',
	'path' => 'comments/create',
	'function' => "
	\$data = \\Input::all();

	\$comment = new \\Cms\\Packages\\Source\\Comments\\DB\\Comment;
	\$comment->name = \$data['name'];
	\$comment->email = \$data['email'];
	\$comment->reason = \$data['reason'];
	\$comment->message = \$data['message'];

	\$comment->save();

	\$recipent = 'pablo@rabbitbtl.cl';
	if (\$comment->reason == 'proveedor' || \$comment->reason == 'trabaja con nosotros') {
		\$recipent = 'david@rabbitbtl.cl';
	}

	\\Mail::send('comments::mail.mail', compact('comment'), function(\$message) use (\$recipent)
	{
		\$message->to(\$recipent)
		->subject('Nuevo Mensaje');
	});

	return \$comment;",
];

try {
	\PublicRouteDriver::store($route);
} catch (\Exception $e) {
	
}
