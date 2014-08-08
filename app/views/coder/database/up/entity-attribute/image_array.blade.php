\Schema::dropIfExists('site_{{ $entity->table_name }}_{{ $attribute->name }}_images');
\Schema::create('site_{{ $entity->table_name }}_{{ $attribute->name }}_images', function($table)
{
	$table->integer('site_{{ $entity->table_name }}_id')->unsigned();
	$table->foreign('site_{{ $entity->table_name }}_id')
		->references('id')->on('site_{{ $entity->table_name }}')
		->onDelete('cascade');

	$table->integer('image_id')->unsigned();
	$table->foreign('image_id')
		->references('id')->on('images')
		->onDelete('cascade');
});