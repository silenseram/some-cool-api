<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$log = '[' . date("Y.m.d H:i:s") . ']' . '	->	' . $_SERVER['REQUEST_URI'];
file_put_contents('debug.log', $log . "\n", FILE_APPEND);
//var_dump($log);

$db = get_db();

$uri = $_SERVER['REQUEST_URI'];

$counter = $db[$uri] ?? 0;
$counter++;
var_dump($db);
$db[$uri] = $counter;

save_db($db);

function get_db() {
	if (! file_exists('db.json'))
		file_put_contents('db.json', '{}');

	return json_decode(file_get_contents('db.json'), true);
}

function save_db($json) {
	return file_put_contents('db.json', json_encode($json));
}
