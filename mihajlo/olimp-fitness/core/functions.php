<?php

function core_redirect($url) {
	header("Location: {$url}");
	exit;
}

?>