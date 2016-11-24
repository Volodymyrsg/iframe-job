<?php
session_start();

$settings = [
	'database' => [
		'driver' => 'MySQL',
		'host' => 'softgroup:3307',
		'dbname' => 'softgroup',
		'user' => 'root',
		'password' => ''
	],
	'router' => [
		'defaultController' => 'Coments',
		'defaultAction' => 'index',
		'defaultErrorAction' => 'error'
	],
];

spl_autoload_register(function($file) {
	$paths = [
			'app/core/',
			'app/models/',
			'app/controllers/'
	];

	foreach ($paths as $path)
	{
		if(file_exists($path . $file . '.php')) {
			require_once($path . $file . '.php');
		}
	}
});

Config::set($settings);

