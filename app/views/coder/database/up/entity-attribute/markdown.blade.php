\Schema::table('site_{{ $entity->table_name }}', function($table)
{
	$table->text('{{ $attribute->name }}');
});