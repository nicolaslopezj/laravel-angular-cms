\Schema::table('site_{{ $entity->table_name }}', function($table)
{
	$table->string('{{ $attribute->name }}');
});