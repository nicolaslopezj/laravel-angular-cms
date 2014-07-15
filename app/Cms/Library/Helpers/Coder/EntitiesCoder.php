<?php namespace Cms\Library\Helpers\Coder;

class EntitiesCoder {

	public function codeEntities() {
		$entities = \EntityDriver::all();

		$this->deleteFilesInFolder();
		
		foreach ($entities as $index => $entity) {
			$this->codeEntity($entity);
		}
	}

	public function deleteFilesInFolder() {
		$folder_path = app_path() . '/models/Site/';
		\FilesHelper::deleteFilesInFolder($folder_path);
	}

	public function codeEntity($entity) {
		$this->codeModelForEntity($entity);
	}

	public function migrateEntity($entity, $migration_id) {
		$migrations = array_dot(\EntityDriver::getMigrations($entity->id));
		$migration = $migrations[$migration_id];
		eval($migration);
	}

	public function deleteEntityFiles($entity) {
		$path = app_path() . '/models/Site/' . $entity->name . '.php';
		@unlink($path);
	}

	public function codeModelForEntity($entity) {
		$path = app_path() . '/models/Site/' . $entity->name . '.php';
		$content = "<?php namespace Site;" . PHP_EOL . PHP_EOL;
		$content.= "use Watson\Validating\ValidatingTrait;" . PHP_EOL . PHP_EOL;
		$content.= "class " . $entity->name . " extends \\Eloquent {" . PHP_EOL . PHP_EOL;
		$content.= "\tuse ValidatingTrait;" . PHP_EOL . PHP_EOL;
		$content.= "\tprotected \$table = 'site_" . $entity->table_name . "';" . PHP_EOL . PHP_EOL;
		$fillable = "['" . join("', '", array_pluck($entity->attributes, 'name')) . "']";
		$content.= "\tprotected \$fillable = " . $fillable . ";" . PHP_EOL . PHP_EOL;
		$content.= "\tprotected \$throwValidationExceptions = true;" . PHP_EOL . PHP_EOL;

		$content.= "\tprotected \$rules = [" . PHP_EOL;
		foreach($entity->attributes as $index => $attribute) {
			if ($attribute->validations) {
				$content.= "\t\t'" . $attribute->name . "' => '" . $attribute->validations . "'," . PHP_EOL;
			}
		}
		$content.= "\t];" . PHP_EOL . PHP_EOL;

		$content.= "\tpublic function getIdAttribute(\$attribute) {" . PHP_EOL;
		$content.= "\t\treturn (int) \$attribute;" . PHP_EOL;
		$content.= "\t}" . PHP_EOL . PHP_EOL;

		foreach($entity->attributes as $index => $attribute) {
			if ($attribute->type == 'integer' || $attribute->type == 'image') {
				$content.= "\tpublic function get" . studly_case($attribute->name) . "Attribute(\$attribute) {" . PHP_EOL;
				$content.= "\t\treturn (int) \$attribute;" . PHP_EOL;
				$content.= "\t}" . PHP_EOL . PHP_EOL;
			}
		}

		foreach($entity->attributes as $index => $attribute) {
			if ($attribute->type == 'image') {
				$content.= "\tpublic function image_" . $attribute->name . "() {" . PHP_EOL;
				$content.= "\t\treturn \$this->belongsTo('Image', '" . $attribute->name . "');" . PHP_EOL;
				$content.= "\t}" . PHP_EOL . PHP_EOL;
			}
		}

		$content.= "}";

		\FilesHelper::overwriteFile($path, $content);
	}

}