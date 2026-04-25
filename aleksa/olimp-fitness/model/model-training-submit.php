<?php

/* Nije admin? Zaustavi skriptu. */
if (!auth_is_admin()) exit;

/* Da li su podaci poslati? */
if ($_POST) {
	/* Očitaj poslate podatke */
	$training_title = $_POST['title'];
	$training_description = $_POST['description'];
	$training_file = $_FILES['training_file'];
    $training_price = $_POST['price'];

	/* Proveri da li je sve uneto kako treba */
	if ($training_title == '')
		$_error[] = 'Unesite naziv slike';
	if ($training_description == '')
		$_error[] = 'Unesite opis slike';
	if ($training_file['error'] <> 0)
		$_error[] = 'Došlo je do greške. Dokument nije učitan';

	/* Nema greške? Onda je sve u redu, nastavi */
	if (!$_error) {

		/* Upiši podatke u DB */
		$sql = "INSERT INTO `trainings`
				(`title`, `description`, `price`)
				VALUES
				('{$training_title}', '{$training_description}', '{$training_price}')";
		/* Podaci nisu uneti? Prijavi grešku i vrati se na obrazac */
		if (!db_query($_db, $sql))
			$_error[] = 'Došlo je do greške. Upis u DB nije izvršen.';
		/* Upit je izvršen? Prebaci uploadovanu sliku na finalno odredište */
		else {
			$training_id = db_get_last_id($_db);
			$training_file_name = "{$training_id}.webp";

			move_uploaded_file(
					$training_file['tmp_name'],
					DIR_IMAGES . $training_file_name
				);
			
			/* Poslednji korak - sve je prošlo po planu, prikaži poruku da je unos završen,
			   i nemoj ponovo da prikažeš obrazac za unos slike */
			$_message[] = 'Slika je uspešno ubačena u DB.';
		}
	}
}


$training_model_name = 'training-submit';
$training_view_name = 'view-training-submit.php';

?>