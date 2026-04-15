<?php

$config = [
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'db_name' => 'olimp-gnf'
];

$conn = mysqli_connect(
    $config['hostname'],
    $config['username'],
    $config['password'],
    $config['db_name']
);

if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}

?>