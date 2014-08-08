\Schema::dropIfExists('site_{{ $entity->table_name }}');
\Schema::create('site_{{ $entity->table_name }}', function($table)
{
	$table->increments('id');
	$table->timestamps();
});