<div id="trening-detalji">
	<div class="banner">
		<h1>DODAVANJE</h1>
	</div>

	

	<div id="trening-detalji-info">
		
		<?php if ($_message): ?>
			<div>
				Trening je dodat,<br> 			
				vrati se na <a href="<?= FILE_INDEX ?>?page=training">treninge</a>.
			</div>
		<?php else: ?>
		</center>
		<form method="post" enctype="multipart/form-data">

			<label>Naslov</label><br>
			<input type="text" name="title" value="<?= $training_title ?? '' ?>">
			<br>
			<label>Opis</label><br>
			<input type="text" name="description" value="<?= $training_description ?? '' ?>">
			<br>
			<label>Cena</label><br>
			<input type="text" name="price" value="<?= $training_price ?? '' ?>">
			<br>
			<label>Slika</label><br>
			<label for="training_file" class="moje-dugme">
    			<i class="fa fa-folder-open"></i> Izaberite sliku...
			</label>
			<input type="file" id="training_file" name="training_file" style="display:none;">
			<br><br><br>
			<button>DODAJTE</button>

		</form>
		</center>
		<?php endif; ?>
		
	</div>
</div>


