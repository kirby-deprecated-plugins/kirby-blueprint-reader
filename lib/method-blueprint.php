<?php
namespace BlueprintReader;
use c;

class MethodBlueprint {
	function __construct() {
		$this->Cache = new Cache();
		$this->Read = new Read();
	}
	function get($options, $steps_options, $steps) {
		$options = $this->setArgs($options);
		extract($options);

		$cache_key = 'blueprint.reader.' . $format . 's';

		$cache = $this->Cache->get($template, $cache_key);

		if($cache) {
			return $cache;
		} else {
			$filepath = blueprint($template);

			if($filepath) {
				if($format == 'filepath') {
					$this->Cache->set($template, $filepath, $cache_key);
					return $filepath;
				} else {
					$options['filepath'] = $filepath;
					$data = $this->Read->file($options);
					if(is_string($steps_options)) {
						$data = steps($steps, $data);
					}
					$this->Cache->set($template, $data, $cache_key);
					return $data;
				}
			}
		}
	}

	function setArgs($options) {
		extract($options);
		$fallbacks = array(
			'template' => $template,
			'format' => fallback($options, 'format', 'data')
		);
		return array_merge(fallbackOptions($options), $fallbacks);
	}
}