<?php namespace Cms\Library\Helpers\CMSLang;

class Engine {

	public function evaluateOne($text, $dependencies = []) {
		$parts = explode('>', $text);

		if (count($parts) < 2) {
			return '';
		}

		if ($parts[0] == 'Dict') {
			$default = '';
			$item = $this->getOneDict($parts[1], $default);
			if (count($parts) == 3) {
				$array = array_dot($item->toArray());
				if (!array_key_exists($parts[2], $array)) {
					return '';
				}
				return $array[$parts[2]];
			}

			return $item;
		} else {
			$identifier = $parts[1];
			if (starts_with($identifier, ':')) {
				$identifier = str_replace(':', '', $identifier);
				$identifier = $dependencies[$identifier];
			}
			$item = $this->getOneEntity($parts[0], $identifier);

			if (!$item) {
				return '';
			}

			$array = array_dot($item->toArray());
			
			if (!array_key_exists($parts[2], $array)) {
				return '';
			}

			return $array[$parts[2]];
		}
	}

	private function getOneEntity($entity, $identifier) {
		$driver = new \EntityCrudDriver($entity);
		return $driver->get($identifier);
	}

	private function getOneDict($identifier, $default) {
		return \Dict::get($identifier, $default);
	}


	public function evaluateQuery($text) {
		$parts = explode('<', $text);

		if ($parts < 2) {
			return [];
		}
		
		$model = $parts[0];
		$conditions = $parts[1];

		if ($conditions == '*') {
			$query = $this->getQueryForAll($model);
		} else {
			$conditions = explode(',', $conditions);
			$options = [];

			foreach ($conditions as $index => $condition) {
				$parts = explode(':', $condition);
				if (count($parts) == 3) {
					$options[$parts[0]] = $parts[1] . '|' . $parts[2];
				}
			}

			$query = $this->getQueryWithOptions($model, $options);
		}

		return $query;
	}

	private function getQueryWithOptions($model, $options) {
		$driver = new \EntityCrudDriver($model);
		$query = $driver->query();
		$query = $driver->filterQuery($options, $query);
		return $query;
	}

	private function getQueryForAll($model) {
		$driver = new \EntityCrudDriver($model);
		return $driver->query();
	}

}