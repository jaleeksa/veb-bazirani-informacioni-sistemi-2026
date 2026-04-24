<?php

/*
index.php?page=gallery	- spisak najnovijih slika
index.php?page=gallery&id=3	- pogledaj sliku ciji ID=3
index.php?page=gallery&action=submit - ubaci novu sliku
index.php?page=gallery&action=edit&id=3	- izmeni podatke o slici
index.php?page=gallery&action=delete&id=3 - obrisi sliku
*/




$training_model_name = '';
$training_view_name = '';

/* Ukoliko je deklarisan url parametar akction, ovde će biti 
   preusmeren poziv na odgovarajući segment koda */
if ($_action != '') {
	if (auth_is_admin()) {
		switch($_action) {
			case 'submit' :
				include_once(DIR_MODEL . 'model-training-submit.php');
				break;
			case 'edit' :
				include_once(DIR_MODEL . 'model-training-edit.php');
				break;
			case 'delete' :
				include_once(DIR_MODEL . 'model-training-delete.php');
				break;
		}
	}
	else {
		core_redirect(FILE_ERROR404);
	}
}
/* Ukoliko url parametar action nije deklarisan */
else {
	/* Prikaz artikla na novoj strani */
   if ($_id > 0) {
		$sql = "SELECT * 
				FROM `trainings`
				WHERE `training_id`={$_id}
				LIMIT 1";
		$training_article = db_read($_db, $sql);
		if (!$training_article)
			$_error[] = 'Traženi trening ne postoji';
		$training_model_name = 'training-article';
		$training_view_name = 'view-training-article.php';

		
	}
	/* Lista ponudjenih clanarina */
	else {
		$sql = "SELECT * 
				FROM `trainings`
				ORDER BY training_id ASC";
		$training_article = db_read($_db, $sql);
		if (!$training_article)
			$_message[] = 'U galeriji trenutno nema slika';
		$training_model_name = 'training';
		$training_view_name = 'view-training.php';

	}

}


$_output['_error'] = $_error;
$_output['_message'] = $_message;
$_output['model-name'] = $training_model_name;
$_output['view-name'] = $training_view_name;

?>