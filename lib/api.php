<?php
class b {
	public static $array;

	public static function blueprint($template, $steps_options = array(), $options = array()) {
		$Blueprint = new BlueprintReader\MethodBlueprint();
		$steps = array();

		if(is_string($steps_options)) {
			$steps = explode('/', $steps_options);
		} else {
			$options = $steps_options;
		}
		
		$options['template'] = $template;
		$data = $Blueprint->get($options, $steps_options, $steps);
		return $data;
	}

	public static function read($filepath, $steps_options = array(), $options = array()) {
		$Read = new BlueprintReader\MethodRead();
		$steps = array();

		if(is_string($steps_options)) {
			$steps = explode('/', $steps_options);
		} else {
			$options = $steps_options;
		}

		$options['filepath'] = $filepath;
		return $Read->get($options, $steps_options, $steps);
	}

	public static function file($template, $options = array()) {
		$options['format'] = 'filepath';
		return self::blueprint($template, $options);
	}

	public static function parse($data, $steps_options = array(), $options = array()) {
		$steps = array();

		if(is_string($steps_options)) {
			$steps = explode('/', $steps_options);
		} else {
			$options = $steps_options;
		}

		$options = BlueprintReader\fallbackOptions($options);
		$data = BlueprintReader\parse($data, $options);

		if(is_string($steps_options) && $format != 'filepath') {
			$data = steps($steps, $data);
		}

		return $data;
	}
}