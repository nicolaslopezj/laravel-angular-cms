<?php namespace Cms\Library\Helpers;

class Dict {

	public function get($identifier) {
		$definition = \DefinitionDriver::getByIdentifier($identifier);

		return $definition->{$definition->type};
	}

}