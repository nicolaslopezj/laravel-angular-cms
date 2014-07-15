<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class EntityDriver extends ModelDriver {

	protected $model = '\\Entity';
	protected $events_name = 'entities';

	public function get($id) {
		$entity = \Entity::where('id', $id)
		->with('attributes')
		->first();
		return $entity;
	}

	public function delete($id) {
		$entity = $this->get($id);
		foreach ($entity->attributes as $index => $attribute) {
			$this->deleteAttribute($attribute);
		}
		parent::delete($id);
	}

	public function findByName($name) {
		$entity = \Entity::where('name', $name)
		->with('attributes')
		->first();
		return $entity;
	}

	public function getAttribute($entity_id, $attribute_id) {
		$attribute = \EntityAttribute::where('entity_id', $entity_id)
		->where('id', $attribute_id)
		->first();
		return $attribute;
	}

	public function addAttribute($id, $data) {
		$attribute = new \EntityAttribute;

		$data['entity_id'] = $id;
		$attribute->fill($data);
		$attribute->isValid();
		$attribute->save();

		\Event::fire('entity_attributes.created', $attribute);

		return $attribute;
	}

	public function deleteAttribute($attribute) {
		\Event::fire('entity_attributes.deleted', $attribute);
		$attribute->delete();
	}

	public function getMigrations($id) {
		$entity = $this->get($id);

		$migrations = [];

		try {
			$migrations['info'] = \DB::select(\DB::raw('describe site_' . $entity->table_name));
		} catch (\Exception $e) {
			$migrations['info'] = [];
		}
		

		$migrations['refresh'] = "";
		$migrations['refresh'] .= "\Schema::dropIfExists('site_" . $entity->table_name . "');" . "\n";
		$migrations['refresh'] .= "\Schema::create('site_" . $entity->table_name . "', function(\$table)" . "\n";
		$migrations['refresh'] .= "{" . "\n";
		$migrations['refresh'] .= "\t" . "\$table->increments('id');" . "\n";

		foreach ($entity->attributes as $index => $attribute) {
			if ($attribute->type == 'string') {
				$migrations['refresh'] .= "\t" . "\$table->string('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'text') {
				$migrations['refresh'] .= "\t" . "\$table->text('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'integer') {
				$migrations['refresh'] .= "\t" . "\$table->integer('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'image') {
				$migrations['refresh'] .= "\t" . "\$table->integer('" . $attribute->name . "')->unsigned()->nullable();" . "\n";
				$migrations['refresh'] .= "\t" . "\$table->foreign('" . $attribute->name . "')->references('id')->on('images');" . "\n";
			}
		}

		$migrations['refresh'] .= "\t" . "\$table->timestamps();" . "\n";
		$migrations['refresh'] .= "});";

		$migrations['delete'] = "\Schema::dropIfExists('site_" . $entity->table_name . "');";

		$migrations['attributes'] = [];
		foreach ($entity->attributes as $index => $attribute) {
			$migration = "";
			$migration .= "\Schema::table('site_" . $entity->table_name . "', function(\$table)" . "\n";
			$migration .= "{" . "\n";
			if ($attribute->type == 'string') {
				$migration .= "\t" . "\$table->string('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'text') {
				$migration .= "\t" . "\$table->text('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'integer') {
				$migration .= "\t" . "\$table->integer('" . $attribute->name . "');" . "\n";
			}
			if ($attribute->type == 'image') {
				$migration .= "\t" . "\$table->integer('" . $attribute->name . "')->unsigned()->nullable();" . "\n";
				$migration .= "\t" . "\$table->foreign('" . $attribute->name . "')->references('id')->on('images');" . "\n";
			}
			$migration .= "});";

			$migrations['attributes'][$attribute->name]['up'] = $migration;

			$migration = "";
			$migration .= "\Schema::table('site_" . $entity->table_name . "', function(\$table)" . "\n";
			$migration .= "{" . "\n";
			if ($attribute->type != 'image') {
				$migration .= "\t" . "\$table->dropColumn('" . $attribute->name . "');" . "\n";
			} else {
				$migration .= "\t" . "\$table->dropForeign('site_" . $entity->table_name . "_" . $attribute->name . "_foreign');" . "\n";
				$migration .= "\t" . "\$table->dropColumn('" . $attribute->name . "');" . "\n";
			}
			$migration .= "});";

			$migrations['attributes'][$attribute->name]['down'] = $migration;
		}

		return $migrations;
	}


}