<?php

if ($_POST) {
	$confirmation = $_POST['confirmation'];
	
	/* Akcija brisanja je potvrđena */
	if ($confirmation == 1) {
		
		$where_sql = "={$_id} LIMIT 1";

		$sql = "DELETE 
				FROM `trainings` 
				WHERE training_id {$where_sql}";
		if (db_query($_db, $sql)) {
			
			@unlink(DIR_IMAGES . "{$_id}.webp");

			
			core_redirect(FILE_INDEX . '?page=training');
		}
		else
			$_error[] = 'Došlo je do greške. Trening nije obrisan.';
	}
	/* U suprotnom, vrati korisnika na spisak slika */
	else {
		core_redirect(FILE_INDEX . '?page=training');
	}
}


$training_model_name = 'training-delete';
$training_view_name = 'view-training-delete.php';

?>