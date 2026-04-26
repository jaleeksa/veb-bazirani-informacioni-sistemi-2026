<?php

function db_connect() {
    // Ako config nije učitan, učitaj ga
    if (!isset($_config)) {
        $config_path = dirname(__DIR__) . '/config.php';   // ide jedan nivo gore
        if (file_exists($config_path)) {
            include_once($config_path);
        } else {
            // Fallback za AJAX pozive
            include_once('../config.php');
        }
    }

    global $_config;

    $db = mysqli_connect(
        $_config['hostname'] ?? 'localhost',
        $_config['username'] ?? 'root',
        $_config['password'] ?? '',
        $_config['database'] ?? 'olimp-fitness'
    );

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $db;
}

function db_close($_db) {
	mysqli_close($_db);
}

function db_read($_db, $sql) {
	$data = [];
	$result = mysqli_query($_db, $sql);
	while ($row = mysqli_fetch_assoc($result))
		$data[] = $row;

	if (empty($data))
		return false;

	return 
		count($data) > 1
		? $data
		: $data[0];
}

function db_query($_db, $sql) {
	return mysqli_query($_db, $sql);
}

function db_get_last_id($_db) {
	return mysqli_insert_id($_db);
}

?>