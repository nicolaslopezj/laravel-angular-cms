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

		$content = '<?php ' . \View::make('coder.models.entity', compact('entity'));

		\FilesHelper::overwriteFile($path, $content);
	}

}