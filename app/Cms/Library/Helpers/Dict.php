<?php namespace Cms\Library\Helpers;

class Dict {

	public function get($identifier, $default = '') {
		$definition = \DefinitionDriver::getByIdentifier($identifier);
		
		if (!$definition) {
			return $default;
		}
		if (!$definition->{$definition->type}) {
			return $default;
		}

		return $definition->{$definition->type};
	}

}