<?php

$_error = [];

if (
	($_GET['action'] ?? '') == 'logout'
) {
	session_reset_user();
	core_redirect(FILE_INDEX);
}

if ($_POST) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * 
			FROM `users`
			WHERE `user_username` = '{$username}'
			LIMIT 1";
	$user = db_read($_db, $sql);

	if (
		$user
		&& $user['user_password'] == ($password)
	) {
		session_set_user($user['user_username'], $user['user_level']);
		core_redirect(FILE_INDEX);
		
	}
	else
		$_error[] = 'Uneti podaci nisu ispravni';
}

if (!isset($_SESSION['user_level']))
	session_set_user_level(USER_LEVEL_ANONYMOUS);


$_output['page-title'] = 'PRIJAVI SE';
$_output['_error'] = $_error;
$_output['_message'] = $_message;
$_output['_message'] = '';
$_output['model-name'] = 'login';
$_output['view-name'] = 'view-login.php';

?>