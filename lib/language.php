<?php
namespace BlueprintReader;

class Language {
	function parse($array, $language = null) {
		$this->array = $array;
		if(isset($language)) {
			global $kirby;
			$this->kirby = $kirby;
			$this->language = $language;

			$this->walkField();
		}
		return $this->array;
	}

	function walkField() {
		if(is_array($this->array) && array_key_exists('fields', $this->array)) {
			foreach($this->array['fields'] as $this->field_key => $field) {
				if(is_array($field)) {
					$this->depth = 'field';
					$this->setFields();
					$this->walkStructure($field, $this->field_key);
				}
			}
		}
	}

	function walkStructure($field) {
		if(array_key_exists('fields', $field)) {
			if(!empty($field['fields'])) {
				foreach($field['fields'] as $this->structure_key => $item) {
					if(is_array($item)) {
						$this->depth = 'structure';
						$this->setFields();
					}
				}
			}
		}
	}

	function setFields() {
		foreach(array('label', 'help', 'placeholder') as $key) {
			$this->singular($key);
		}
		$this->headlines();
		$this->options();
	}

	function singular($type) {
		$part = $this->getPart();

		if(isset($part[$type][$this->language])) {
			$part[$type] = $part[$type][$this->language];
		} elseif(isset($part[$type]) && is_array($part[$type])) {
			$part[$type] = null;
		}
		
		$this->setPart($part);
	}

	function getPart() {
		$part = $this->array['fields'][$this->field_key];
		if($this->depth == 'structure') {
			$part = $part['fields'][$this->structure_key];
		}
		return $part;
	}

	function setPart($part) {
		if($this->depth == 'field') {
			$this->array['fields'][$this->field_key] = $part;
		} elseif($this->depth == 'structure') {
			$this->array['fields'][$this->field_key]['fields'][$this->structure_key] = $part;
		}
	}

	function options() {
		$part = $this->getPart();
		if(isset($part['options']) && is_array($part['options'])) {
			if(!empty($part['options'])) {
				foreach($part['options'] as $key => $option) {
					if(array_key_exists($this->language, $option)) {
						$part['options'][$key] = $option[$this->language];
					} else {
						$part['options'][$key] = null;
					}
				}
			}
			$this->setPart($part);
		}
	}

	function headlines() {
		$part = $this->getPart();
		if(isset($part['type']) && $part['type'] == 'headline') {
			if(isset($part['text'][$this->language])) {
				$part['text'] = $part['text'][$this->language];
			} elseif(isset($part['text']) && is_array($part['text'])) {
				$part['text'] = null;
			}
			$this->setPart($part);
		}
	}
}