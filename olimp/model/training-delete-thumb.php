<?php

if ($_SESSION['loggedin'] != 1) {
	header('location: ./index.php?model=404');
	exit;
}

unlink("./public/images/{$id}.jpg");

header("location: ./index.php?model=training&action=edit&id={$id}");
exit;

?>