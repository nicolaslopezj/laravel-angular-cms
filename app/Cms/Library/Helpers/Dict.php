<?php namespace Cms\Library\Helpers;

class Dict {

	public function get($identifier, $default = '') {
		$definition = \DefinitionDriver::getByIdentifier($identifier);

		if (!$definition) {
			return $default;
		}
		if (!$definition->{$definition->type}) {

			if ($definition->type == 'image') {
				if ($default) {
					$parts = explode('x', $default);
					return $this->getDefaultImage($parts[0], $parts[1]);
				}
			}

			return $default;
		}

		return $definition->{$definition->type};
	}

	protected function getDefaultImage($width, $height) {
		$image = new \stdClass;
		$image->path = 'http://lorempixel.com/' . $width . '/' . $height . '/';
		$image->thumbnail_xs = 'http://lorempixel.com/50/50/';
		$image->thumbnail_sm = 'http://lorempixel.com/100/100/';
		$image->thumbnail_md = 'http://lorempixel.com/200/200/';
		$image->thumbnail_lg = 'http://lorempixel.com/400/400/';
		return $image;
	}

}