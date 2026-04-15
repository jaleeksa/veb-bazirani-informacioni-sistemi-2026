<?php

$view_filename = './view/training.php';

$article = [];

$sql = "SELECT *
		FROM `training`
		WHERE `training_id`={$id}
		LIMIT 1";
$result = mysqli_query($db, $sql);
$article = mysqli_fetch_assoc($result);

/* 
	Reši formatiranje teksta upotrebom BB-koda
*/
$article['training_text'] = str_replace("\r", '', $article['training_text']);
/* Zameni prazne linije sa HTML tagom <br> */
$article['training_text'] = preg_replace("#[\r\n]#", '<br>', $article['training_text']);
/* Zameni BB kod za boldovana, podvučena i iskošena slova odgovarajućim HTML tagovima */
$article['training_text'] = str_replace("[b]", '<b>', $article['training_text']);
$article['training_text'] = str_replace("[/b]", '</b>', $article['training_text']);
$article['training_text'] = str_replace("[i]", '<i>', $article['training_text']);
$article['training_text'] = str_replace("[/i]", '</i>', $article['training_text']);
$article['training_text'] = str_replace("[u]", '<u>', $article['training_text']);
$article['training_text'] = str_replace("[/u]", '</u>', $article['training_text']);
/* Zameni BB kod [img] za sa odgovarajućim HTML tagom <img> */
$article['training_text'] = preg_replace("#\[img=(.*?\.jpg)\]#", '<img src="$1">', $article['training_text']);

$view_filename = './view/training-article.php';

?>