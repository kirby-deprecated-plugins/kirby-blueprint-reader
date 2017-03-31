<?php
namespace BlueprintReader;

class Cache {
	function __construct() {
		global $kirby;
		$this->kirby = $kirby;
	}

	function getOption($option) {
		return $this->kirby->get('option', $option);
	}

	function get($template, $option) {
		$cache = $this->getOption($option);
		if(isset($cache[$template])) {
			return $cache[$template];
		}
	}

	function set($template, $data, $option) {
		$cache = $this->getOption($option);
		$cache[$template] = $data;
		$this->kirby->set('option', $option, $cache);
		return $data;
	}
}