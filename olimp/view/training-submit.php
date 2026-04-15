<div id="trening-detalji">
	<div class="banner">
		<h1>DODAVANJE</h1>
	</div>

	<div id="trening-detalji-info">
		<center>
			<form method="post" enctype="multipart/form-data">
				<br><br><label>Naslov</label><br>
				<input name="training_title" type="text" value="<?= $training_title ?? '' ?>">
				<br><label>Tekst</label><br>
				<textarea name="training_text"><?= $training_text ?? '' ?></textarea><br>
				<br><label>Cena (RSD)</label><br>
				<input name="training_price" type="number" step="0.01" value="<?= $training_price ?? '' ?>">
				<br><label>Slika</label><br>
				<input type="file" name="image">
				<br>
				<button>Dodaj</button>
				<button onclick="history.back()">Odustani</button>
			</form>
		</center>
	</div>
</div>