<?php
class bread {
	public static function blueprint($template = null) {		
		$Cache = new BlueprintReader\Cache();
		$Load = new BlueprintReader\Load();
		$Read = new BlueprintReader\Read();
		$array = array();

		if($Cache->getItem($template)) {
			$array = $Cache->getItem($template);
		} else {
			list($template, $filepath) = $Load->file($template);

			if($filepath) {
				$array = $Read->file($template, $filepath);
			}
		}
		return $array;
	}

	public static function fields($template = null) {
		return self::blueprint($template)['fields'];
	}

	public static function field($key, $template = null) {
		return self::fields($template)[$key];
	}

	public static function file($template = null) {
		$Load = new BlueprintReader\Load();
		$Cache = new BlueprintReader\Cache();
		$string = '';
		$cachekey = $template . '.filepath';

		if($Cache->getItem($cachekey)) {
			$string = $Cache->getItem($cachekey);
		} else {
			list($template, $filepath) = $Load->file($template);
			if($filepath) {
				$string = $filepath;
				$Cache->set($cachekey, $string);
			}
		}
		return $string;
	}

	public static function read($filepath = null, $cachekey = null) {
		$Read = new BlueprintReader\Read();
		$Cache = new BlueprintReader\Cache();
		$array = array();

		$cachekey = ($cachekey) ? $cachekey : $filepath;

		if($Cache->getItem($cachekey)) {
			$array = $Cache->getItem($cachekey);
		} else {
			if(f::exists($filepath)) {
				$array = $Read->file($cachekey, $filepath);
			}
		}
		return $array;
	}

	public static function parse($array = array()) {
		$Parse = new BlueprintReader\Parse();
		return $Parse->all($array);
	}
}