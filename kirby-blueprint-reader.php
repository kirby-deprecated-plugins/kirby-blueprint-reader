<?php
namespace BlueprintReader;

include __DIR__ . DS . 'lib' . DS . 'load.php';
include __DIR__ . DS . 'lib' . DS . 'read.php';
include __DIR__ . DS . 'lib' . DS . 'parse.php';
include __DIR__ . DS . 'lib' . DS . 'cache.php';
include __DIR__ . DS . 'lib' . DS . 'definitions.php';
include __DIR__ . DS . 'lib' . DS . 'language.php';
include __DIR__ . DS . 'lib' . DS . 'api.php';

$kirby->set('blueprint', 'projecta', kirby()->roots()->site() . DS . 'blueprints' . DS . 'project.yml');
$kirby->set('blueprint', 'fields/test', kirby()->roots()->site() . DS . 'test.yml');