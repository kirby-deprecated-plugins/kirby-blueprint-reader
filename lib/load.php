<?php
namespace BlueprintReader;
use f;

class Load {
	function __construct() {
		$this->kirby = kirby();
	}
	function file($template = null) {
		$template = $this->setTemplate($template);
		return $this->find($template);
	}

	function setTemplate($template) {
		if(!$template) {
			return page()->intendedTemplate();
		}
		return $template;
	}

	function find($template) {
		$match = $this->findByRoot($template);
		if($match) return $match;
		return $this->findByRegistry($template);
	}

	function findByRegistry($template) {
		$blueprints = kirby()->get('blueprint');
		if(isset($blueprints[$template])) {
			if(f::exists($blueprints[$template])) {
				return array($template, $blueprints[$template]);
			} elseif(f::exists($blueprints['default'])) {
				return array($template, $blueprints['default']);
			}
		}
	}

	function findByRoot($template) {
		$filepath = $this->kirby->roots->blueprints . DS . $template . '.yml';
		$defaultpath = $this->kirby->roots->blueprints . DS . 'default.yml';
		$array = array($template => $filepath);

		if(f::exists($filepath)) {
			return array($template, $filepath);
		} elseif(f::exists($defaultpath)) {
			return array($template, $defaultpath);
		}
	}
}