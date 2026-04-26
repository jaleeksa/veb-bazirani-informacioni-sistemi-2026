<?php

function session_set_user($username, $user_level) {
	$_SESSION['username'] = $username;
	session_set_user_level($user_level);
}

function session_set_user_level($user_level) {
	$_SESSION['user_level'] = (int)$user_level;
}

function session_reset_user() {
	$_SESSION['user_level'] = USER_LEVEL_ANONYMOUS;
}

?>