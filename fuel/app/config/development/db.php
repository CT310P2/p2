<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=ct310',
			'username'   => 'ct310',
			'password'   => 'ct310class',
		),
	),
);

// a MySQL driver configuration
return array(
	'development' => array(
		'type'           => 'mysqli',
		'connection'     => array(
			'hostname'       => 'localhost',
			'port'           => '3306',
			'database'       => 'ct310',
			'username'       => 'ct310',
			'password'       => 'ct310class',
			'persistent'     => false,
			'compress'       => false,
		),
		'identifier'     => '`',
		'table_prefix'   => '',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => false,
	),
);
