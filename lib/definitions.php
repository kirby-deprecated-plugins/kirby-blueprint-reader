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
		if(isset($array['fields'])) {
			foreach($array['fields'] as $key => $field ) {
				if(is_string($field)) {
					$array = $this->setDefinition($field, $key, $array);
				} elseif(!empty($field['extends'])) {
					$array = $this->setExtends($field, $key, $array);
				}
			}
		}
		return $array;
	}

	function setExtends($field, $key, $array) {
		$Cache = new Cache();
		$cachekey = $field['extends'] . '.definition';
		$buffer = $array['fields'][$key];
		unset($buffer['extends']);

		if(!empty($Cache->getItem($cachekey))) {
			$data = $Cache->getItem($cachekey);
		} else {
			$data = $this->find($field['extends']);
			$Cache->set($cachekey, $data);
		}
		$array['fields'][$key] = array_merge($data, $buffer);
		return $array;
	}

	function setDefinition($field, $key, $array) {
		$Cache = new Cache();
		$cachekey = $field . '.definition';

		if(!empty($Cache->getItem($cachekey))) {
			$data = $Cache->getItem($cachekey);
		} else {
			$data = $this->find($field);
			$Cache->set($cachekey, $data);
		}
		$array['fields'][$key] = $data;
		return $array;
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