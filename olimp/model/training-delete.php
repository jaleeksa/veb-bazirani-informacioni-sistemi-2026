<?php

if ($_SESSION['loggedin'] != 1) {
	header('location: ./index.php?model=404');
	exit;
}

if ($_POST) {
	$confirm_delete = $_POST['confirm_delete'] ?? '';
	if ($confirm_delete == 1) {
		$sql = "DELETE FROM `training` WHERE `training_id`={$id} LIMIT 1";
		mysqli_query($db, $sql);
	}

	@unlink("./public/images/{$id}.jpg");

	header('location: index.php?model=training');
	exit;
}

$view_filename = './view/training-delete.php';

?>