<div id="trening-detalji">
	<div class="banner">
		<h1>IZMENA</h1>
	</div>

	<div id="trening-detalji-info">
		<center>
			<training-edit>
				<form method="post" enctype="multipart/form-data">
					<br><br><label>Naslov</label><br>
					<input name="training_title" type="text" value="<?= $article['training_title'] ?>">
					<br><label>Tekst</label><br>
					<textarea name="training_text"><?= $article['training_text'] ?></textarea><br>
					<br><label>Cena (RSD)</label><br>
					<input name="training_price" type="number" value="<?= $article['training_price'] ?>">
					<br>
					<button>Izmeni</button>
					<button onclick="history.back()">Odustani</button>
				</form>
			</training-edit>
		</center>
	</div>
</div>