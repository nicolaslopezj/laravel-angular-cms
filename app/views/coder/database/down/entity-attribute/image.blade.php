\Schema::table('site_{{ $entity->table_name }}', function($table)
{
	$table->dropForeign('site_{{ $entity->table_name }}_{{ $attribute->name }}_foreign');
	$table->dropColumn('{{ $attribute->name }}');
});