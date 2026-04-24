
<div id="trening-detalji">
	<div class="banner">
		<h1><?= $training_article['title'] ?></h1>
	</div>


	<div id="trening-detalji-info">
		
			<training-article>
                <img src="<?= DIR_IMAGES . $training_article['training_id'] ?>.webp">
                <br><br><br>
                <div><?= $training_article['price'] ?> RSD</div>
                <br>
				<div><?= $training_article['description'] ?></div>
			</training-article>
		
	</div>
</div>