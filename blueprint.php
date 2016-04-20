<?php
class blueprint {
	public static $template;

	// Return the yaml data
	public static function get( $template = null ) {
		self::setTemplate( $template );
		$array = self::loadParsed();
		return $array;
	}

	// Return field
	public static function field( $fieldname = null, $template = null ) {
		self::setTemplate( $template );
		$array = self::loadParsed();
		if(
			! empty( $fieldname ) &&
			array_key_exists($fieldname, $array['fields'] )
		) {
			return $array['fields'][$fieldname];
		}
		return array();
	}

	// Return field item
	public static function item( $fieldname = null, $item = null, $template = null ) {
		self::setTemplate( $template );
		$array = self::loadParsed();
		if(
			! empty( $fieldname ) &&
			! empty( $item ) &&
			array_key_exists( $fieldname, $array['fields'] ) &&
			array_key_exists( $item, $array['fields'][$fieldname] )
		) {
			return $array['fields'][$fieldname][$item];
		}
		return '';
	}

	// Set template as static variable
	public static function setTemplate( $template ) {
		if( ! empty( $template ) ) {
			self::$template = $template;
		}
	}

	// Load parsed yaml and return array
	public static function loadParsed() {
		$yaml = self::load();
		$array = self::parse( $yaml );
		unset( $array[0] );
		return $array;
	}

	// Get template from self with fallback to intendedtemplate
	public static function template() {
		if ( ! empty( self::$template ) ) {
			$template = self::$template;
		} else {
			$template = page()->intendedTemplate();
		}
		return $template;
	}

	// Return filepath
	public static function filepath() {
		$filepath = '';
		$template = self::template();
		$dirpath = kirby()->roots()->blueprints() . DS . $template;
		$fallback = kirby()->roots()->blueprints() . DS . 'default';

		if( file_exists( $dirpath . '.yml') ) $filepath = $dirpath . '.yml';
		elseif( file_exists( $dirpath . '.yaml' ) ) $filepath = $dirpath . '.yaml';
		elseif( file_exists( $dirpath . '.php' ) ) $filepath = $dirpath . '.php';
		elseif( file_exists( $fallback . '.yml' ) ) $filepath = $fallback . '.yml';
		elseif( file_exists( $fallback . '.yaml' ) ) $filepath = $fallback . '.yaml';
		elseif( file_exists( $fallback . '.php' ) ) $filepath = $fallback . '.php';

		return $filepath;
	}

	// Load blueprint
	public static function load() {
		$filepath = self::filepath();
		$yaml = yaml::read( $filepath );
		return $yaml;
	}

	// Parse with global field definitions
	public static function parse( $yaml ) {
		$fields_dirpath = kirby()->roots()->blueprints() . DS . 'fields';
		$yaml = ( ! empty( $yaml ) ) ? $yaml : array();
		if( ! empty( $yaml['fields'] ) ) {
			foreach( $yaml['fields'] as $key => $field ) {
				$fields_filepath = $fields_dirpath . DS . $key . '.yml';
				if( is_string( $field ) && file_exists( $fields_filepath ) ) {
					$field = yaml::read( $fields_filepath );
					$yaml['fields'][$key] = $field;
				}
			}
		}
		return $yaml;
	}
}