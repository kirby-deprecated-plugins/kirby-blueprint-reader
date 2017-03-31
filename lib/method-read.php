<?php
namespace BlueprintReader;
use c;
use f;

class MethodRead {
	function __construct() {
		$this->Cache = new Cache();
		$this->Read = new Read();
	}
	function get($options, $steps_options, $steps) {
		$options = $this->setArgs($options);
		extract($options);

		$cache_key = 'blueprint.reader.data';
		$cache = $this->Cache->get($template, $cache_key);

		if($cache) {
			$data = $cache;
		} else {
			if(f::exists($filepath)) {
				$data = $this->Read->file($options);
				$this->Cache->set($template, $data, $cache_key);
			}
		}
		if(is_string($steps_options)) {
			$data = steps($steps, $data);
		}
		return $data;
	}

	function setArgs($options) {
		extract($options);
		$fallbacks = array(
			'template' => (isset($cache_key)) ? $cache_key : pathinfo($filepath, PATHINFO_FILENAME),
			'filepath' => $filepath,
		);
		return array_merge(fallbackOptions($options), $fallbacks);
	}
}