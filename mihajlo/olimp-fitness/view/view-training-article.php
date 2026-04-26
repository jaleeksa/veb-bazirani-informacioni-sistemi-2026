<div id="trening-detalji">
	<div class="banner">
		<h1><?= $training_article['title'] ?></h1>
	</div>

	<div id="trening-detalji-info">
		<training-article>
			<img src="<?= DIR_IMAGES . $training_article['training_id'] ?>.webp">
			<br><br><br>

			<div style="width: 50%; margin-inline: auto;"><?= $training_article['description'] ?></div>
			<br>

			<hr style="width: 5%;">
			<br>
			
			<div>
				Cena: <br><?= $training_article['price'] ?> RSD
			</div>
			<br>
		</training-article>
	</div>
</div>