<div id="trening-detalji">
	<div class="banner">
		<h1>IZMENA</h1>
	</div>

	<div id="trening-detalji-info">

		<?php if ($_message): ?>
			<div>
				Trening je izmenjen,<br> 			
				vrati se na <a href="<?= FILE_INDEX ?>?page=training">treninge</a>.
			</div>
		<?php else: ?>
		</center>
		<form method="post" enctype="multipart/form-data">

			<label>Naslov</label>
			<input type="text" name="title" value="<?= $training_title ?? '' ?>">

			<label>Opis</label>
			<input type="text" name="description" value="<?= $training_description ?? '' ?>">

			<label>Cena</label>
			<input type="text" name="price" value="<?= $training_price ?? '' ?>">

			<label>Fajl</label>
			<label for="training_file" class="moje-dugme">
    			<i class="fa fa-folder-open"></i> Izaberi sliku...
			</label>
			<input type="file" id="training_file" name="training_file" style="display:none;">

			<button>Pošalji</button>

		</form>
		</center>
		<?php endif; ?>

	</div>
</div>