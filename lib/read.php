<?php
namespace BlueprintReader;
use yaml;

class Read {
	function __construct() {
		global $kirby;
		$this->kirby = $kirby;
		$this->Parse = new Parse();
		$this->Cache = new Cache();
	}

	function file($template, $filepath) {
		$array = $this->set($filepath);
		$this->Cache->set($template, $array);
		return $array;
	}

	function set($filepath) {
		$array = yaml::read($filepath);
		$array = $this->Parse->all($array);
		return $array;
	}
}