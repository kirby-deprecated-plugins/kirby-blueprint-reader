<?php
namespace BlueprintReader;
use f;
use yaml;

class Definitions {
	function parse($array) {
		global $kirby;
		$this->kirby = $kirby;
		$array = $this->walkField($array);
		return $array;
	}

	function walkField($array) {
		if(array_key_exists('fields', $array)) {
			foreach($array['fields'] as $key => $field) {
				if(is_string($field)) {
					$array['fields'][$key] = $this->setDefinition($field, $key);
				} elseif(is_array($field)) {
					if(!empty($field['extends'])) {
						$array['fields'][$key] = $this->setExtends($field, $key);
					}
					$array = $this->walkStructure($field, $key, $array);
				}
			}
		}
		return $array;
	}

	function walkStructure($field, $key, $array) {
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
		return $array;
	}

	function setExtends($part, $key) {
		$buffer = $part; unset($buffer['extends']);
		return array_merge($this->cache($part['extends']), $buffer);
	}

	function setDefinition($part, $key) {
		return $this->cache($part);
	}

	function cache($name) {
		$Cache = new Cache();
		$cache_key = 'blueprint.reader.definitions';

		if($Cache->get($name, $cache_key)) {
			$data = $Cache->get($name, $cache_key);

		} else {
			$data = $this->find($name);
			$Cache->set($name, $data, $cache_key);
		}
		return $data;
	}

	function find($field) {
		$definition = blueprint('fields/' . $field);
		if(isset($definition)) {
			return yaml::read($definition);
		}
	}
}