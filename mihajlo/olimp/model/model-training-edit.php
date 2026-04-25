<?php

/* Nije admin? Zaustavi skriptu. */
if (!auth_is_admin()) exit;

$sql = "SELECT * 
		FROM `training` 
		WHERE `training_id`={$_id} 
		LIMIT 1";
$training_article = db_read($_db, $sql);
$training_title = $training_article['training_title'];
$training_description = $training_article['training_description'];
$training_price = $training_article['training_price'];

/* Da li su podaci poslati? */
if ($_POST) {
	/* Očitaj poslate podatke */
	$training_title = $_POST['training_title'];
	$training_description = $_POST['training_description'];
	$training_price = $_POST['training_price'];
    $training_file = $_FILES['training_file'];
     

	/* Proveri da li je sve uneto kako treba */
	if ($training_title == '')
		$_error[] = 'Unesite naziv slike';
	if ($training_description == '')
		$_error[] = 'Unesite opis slike';
    if ($training_price == '')
		$_error[] = 'Unesite cenu';

	/* Nema greške? Onda je sve u redu, nastavi */
	if (!$_error) {
		

		/* Upiši podatke u DB */
		$sql = "UPDATE `training`
				SET
					`training_title` = '{$training_title}', 
					`training_description` = '{$training_description}',
                    `training_price` = '{$training_price}'

				WHERE
					`training_id`={$_id}
				LIMIT 1";
		/* Podaci nisu uneti? Prijavi grešku i vrati se na obrazac */
		if (!db_query($_db, $sql))
			$_error[] = 'Došlo je do greške. Upis u DB nije izvršen.';
		/* Upit je izvršen? Prebaci uploadovanu sliku na finalno odredište */
		else {
			if ($training_file['error'] === 0) {
				$training_file_name = "{$_id}.webp";
				
				move_uploaded_file(
						$training_file['tmp_name'],
						DIR_IMAGES . $training_file_name
					);

				/* Poslednji korak - sve je prošlo po planu, prikaži poruku da je unos završen,
				   i nemoj ponovo da prikažeš obrazac za unos slike */
			}
			$_message[] = 'Podaci su uspešno izmenjeni.';
		}
	}
}


$training_model_name = 'training-edit';
$training_view_name = 'view-training-edit.php';


?>