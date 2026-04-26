<?php

function auth_is_admin() {
	if (!isset($_SESSION['user_level']))
		return false;
	return
		$_SESSION['user_level'] === USER_LEVEL_ADMIN
			? true
			: false;
}

function auth_is_user() {
	if (!isset($_SESSION['user_level']))
		return false;

	return
		$_SESSION['user_level'] > USER_LEVEL_ANONYMOUS
			? true
			: false;
}

?>