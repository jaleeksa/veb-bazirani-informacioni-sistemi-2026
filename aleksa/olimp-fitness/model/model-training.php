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
/* Prikaz jednog treninga (detalji) */
	if ($_id > 0) {
		$sql = "SELECT * 
				FROM `trainings`
				WHERE `training_id` = ?
				AND `deleted_at` IS NULL
				LIMIT 1";

		$stmt = mysqli_prepare($_db, $sql);
		mysqli_stmt_bind_param($stmt, "i", $_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$training_article = mysqli_fetch_assoc($result);
		mysqli_stmt_close($stmt);

		if (!$training_article) {
			$_error[] = 'Traženi trening ne postoji ili je obrisan.';
			$training_model_name = 'error404';
			$training_view_name = 'view-error404.php';
		} else {
			$training_model_name = 'training-article';
			$training_view_name = 'view-training-article.php';
			$_output['page-title'] = $training_article['training_title'] ?? 'TRENINZI';
		}
	}
		/* Lista ponuđenih treninga */
	    /* Lista ponuđenih treninga */
    else {
        $show_deleted = ($_GET['show_deleted'] ?? 0) == 1 && auth_is_admin();

        if ($show_deleted) {
            // Prikazujemo samo obrisane treninge (za admina)
            $sql = "SELECT *
                    FROM `trainings`
                    WHERE `deleted_at` IS NOT NULL
                    ORDER BY `deleted_at` DESC, training_id DESC";
            
            $_output['page-title'] = 'OBRISANI TRENINZI';
            $_output['show_deleted_mode'] = true;
        } else {
            // Normalan prikaz - samo aktivni treninzi
            $sql = "SELECT *
                    FROM `trainings`
                    WHERE `deleted_at` IS NULL
                    ORDER BY training_id ASC";
            
            $_output['show_deleted_mode'] = false;
            $_output['page-title'] = 'TRENINZI';        // ← OVO JE BILO NEDOSTAJALO
        }

        $result = mysqli_query($_db, $sql);
        $training_article = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $training_article[] = $row;
        }

        // Broj obrisanih (za normalni prikaz)
        $deleted_count = 0;
        if (auth_is_admin() && !$show_deleted) {
            $sql_count = "SELECT COUNT(*) as total FROM `trainings` WHERE `deleted_at` IS NOT NULL";
            $res_count = mysqli_query($_db, $sql_count);
            $row_count = mysqli_fetch_assoc($res_count);
            $deleted_count = $row_count['total'] ?? 0;
        }

        if (empty($training_article)) {
            if ($show_deleted) {
                $_message[] = 'Trenutno nema obrisanih treninga.';
            } else {
                $_message[] = 'Trenutno nema dostupnih treninga.';
            }
        }

        $training_model_name = 'training';
        $training_view_name = 'view-training.php';
        $_output['deleted_count'] = $deleted_count;
    }

}


$_output['_error'] = $_error;
$_output['_message'] = $_message;
$_output['model-name'] = $training_model_name;
$_output['view-name'] = $training_view_name;

?>