<?php
namespace BlueprintReader;
use yaml;

class Read {
	function __construct() {
		global $kirby;
		$this->kirby = $kirby;
		$this->Cache = new Cache();
		$this->Language = new Language();
		$this->Definitions = new Definitions();
	}

	function file($options) {
		$array = $this->set($options);
		return $array;
	}

	function set($options) {
		$array = yaml::read($options['filepath']);
		
		$options['language'] = fallback($options, 'language', null);
		$options['definitions'] = fallback($options, 'definitions', true);

		$array = parse($array, $options);

		return $array;
	}
}