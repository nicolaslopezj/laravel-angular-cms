\Schema::table('site_{{ $entity->table_name }}', function($table)
{
	$table->integer('{{ $attribute->name }}')->unsigned()->nullable();
	$table->foreign('{{ $attribute->name }}')->references('id')->on('images');
});