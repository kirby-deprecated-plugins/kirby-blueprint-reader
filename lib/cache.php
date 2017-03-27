<?php
namespace BlueprintReader;

class Cache {
	function __construct() {
		global $kirby;
		$this->kirby = $kirby;
	}

	function get() {
		return $this->kirby->get('option', 'bpr');
	}

	function getItem($template) {
		$cache = $this->get();
		if(isset($cache[$template])) {
			return $cache[$template];
		}
	}

	function set($template, $data) {
		$cache = $this->get();
		$cache[$template] = $data;
		$this->kirby->set('option', 'bpr', $cache);
	}
}