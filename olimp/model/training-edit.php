<?php

if ($_SESSION['loggedin'] != 1) {
    header('location: ./index.php?model=404');
    exit;
}

if ($_POST) {
    $training_title = $_POST['training_title'];
    $training_text = $_POST['training_text'];
    $training_price = trim(strip_tags($_POST['training_price']));

    $training_title = trim(strip_tags($training_title));
    $training_text = trim(strip_tags($training_text));
    $training_price = trim(strip_tags($training_price));

    $sql = "UPDATE `training`
			SET
				`training_title` = '{$training_title}',
				`training_text` = '{$training_text}',
				`training_price` = '{$training_price}'
			WHERE
				`training_id` = {$id}
			LIMIT 1";
    mysqli_query($db, $sql);

    header('location: ./index.php?model=training');
    exit;
}

$article = [];

$sql = "SELECT *
		FROM `training`
		WHERE `training_id`={$id}
		LIMIT 1";
$result = mysqli_query($db, $sql);
$article = mysqli_fetch_assoc($result);

$view_filename = './view/training-edit.php';

?>