<?php
namespace BlueprintReader;
use yaml;

class Parse {
	function __construct() {
		$this->Definitions = new Definitions();
	}

	function all($array = array()) {
		$array = $this->definitions($array);
		return $array;
	}

	function definitions($array) {
		$array = $this->Definitions->parse($array);
		return $array;
	}
}