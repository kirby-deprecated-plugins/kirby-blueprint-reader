<?php
namespace BlueprintReader;
use f;
use yaml;

class Definitions {
	function parse($array) {
		global $kirby;
		$this->kirby = $kirby;
		$array = $this->definitions($array);
		return $array;
	}

	function definitions($array) {
		if(array_key_exists('fields', $array)) {
			foreach($array['fields'] as $key => $field) {
				if(is_string($field)) {
					$array['fields'][$key] = $this->setDefinition($field, $key);
				} elseif(is_array($field)) {
					if(!empty($field['extends'])) {
						$array['fields'][$key] = $this->setExtends($field, $key);
					}
					// Structure field
					if(array_key_exists('fields', $field)) {
						foreach($field['fields'] as $key2 => $item) {
							if(is_string($item)) {
								$array['fields'][$key]['fields'][$key2] = $this->setDefinition($item, $key2);
							} elseif(is_array($item)) {
								if(!empty($item['extends'])) {
									$array['fields'][$key]['fields'][$key2] = $this->setExtends($item, $key2);
								}
							}
						}
					}
				}
			}
		}
		return $array;
	}

	function setExtends($part, $key) {
		$Cache = new Cache();
		$name = $part['extends'];
		$cachekey = $name . '.definition';
		$buffer = $part;
		unset($buffer['extends']);

		if(!empty($Cache->getItem($cachekey))) {
			$data = $Cache->getItem($cachekey);
		} else {
			$data = $this->find($name);
			$Cache->set($cachekey, $data);
		}
		$part = array_merge($data, $buffer);
		return $part;
	}

	function setDefinition($part, $key) {
		$Cache = new Cache();
		$cachekey = $part . '.definition';

		if(!empty($Cache->getItem($cachekey))) {
			$data = $Cache->getItem($cachekey);
		} else {
			$data = $this->find($part);
			$Cache->set($cachekey, $data);
		}
		return $data;
	}

	function find($field) {
		$match = $this->findByRoot($field);
		if($match) return $match;
		return $this->findByRegistry($field);
	}

	function findByRoot($field) {
		$filepath = $this->kirby->roots->blueprints . DS . 'fields' . DS . $field . '.yml';

		if(f::exists($filepath)) {
			return yaml::read($filepath);
		}
	}

	function findByRegistry($field) {
		$blueprints = kirby()->get('blueprint');
		$definition_key = 'fields/' . $field;
		if(isset($blueprints[$definition_key]) && f::exists($blueprints[$definition_key])) {
			return yaml::read($blueprints[$definition_key]);
		}
	}
}