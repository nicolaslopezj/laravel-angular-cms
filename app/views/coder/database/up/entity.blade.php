\Schema::dropIfExists('site_{{ $entity->table_name }}');
\Schema::create('site_{{ $entity->table_name }}', function($table)
{
	$table->increments('id');
@if ($entity->has_slug)
	$table->string('slug')->unique()->index();
@endif
	$table->timestamps();
});