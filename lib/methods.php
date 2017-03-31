<?php
namespace BlueprintReader;
use c;

function fallback($options, $option_key, $option_fallback) {
	if(isset($options[$option_key])) {
		$value = $options[$option_key];
	} else {
		$value = c::get('blueprint.reader.' . $option_key, $option_fallback);
	}
	return $value;
}

function blueprint($name) {
	$blueprint = kirby()->get('blueprint', $name);
	$filepath = (is_string($blueprint)) ? $blueprint : null;
	return $filepath;
}

function parse($data, $options) {
	$Language = new Language();
	$Definitions = new Definitions();

	extract($options);

	if($definitions) {
		$data = $Definitions->parse($data);
	}
	$data = $Language->parse($data, $language);
	return $data;
}

function fallbackOptions($options) {
	return array(
		'language' => fallback($options, 'language', null),
		'definitions' => fallback($options, 'definitions', true),
	);
}

function steps($steps, $data) {
	foreach($steps as $step) {
		if(!isset($data[$step])) {
			$data = null;
			break;
		}
		$data = $data[$step];
	}
	return $data;
}