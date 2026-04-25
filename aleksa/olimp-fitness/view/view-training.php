<div id="treninzi">

	<div class="o-treninzima">
		Trening ima mnoge pozitivne efekte na fizičko i mentalno zdravlje. Redovan fizički trening poboljšava
		kardiovaskularno zdravlje, jača mišiće i kosti, pomaže u održavanju zdrave telesne mase i smanjuje rizik
		od mnogih bolesti. Osim toga, vežbanje može poboljšati raspoloženje, smanjiti stres i povećati opšti
		osećaj blagostanja.
	</div>
	<div class="razlika">
		Što se tiče razlike između personalnih i grupnih treninga, ovo su neki ključni faktori:
		<ol>
			<li>
				<b>Prilagođenost ciljevima:</b> Personalni trening omogućava treneru da se fokusira na
				individualne
				ciljeve i
				potrebe klijenta, pružajući personalizovan program vežbanja. Grupni treninzi su često opšti i
				usmereni
				ka većem broju ljudi.
			</li>
			<li>
				<b>Motivacija:</b> Personalni trening pruža visok nivo motivacije jer je trener direktno
				posvećen
				pojedincu. Sa
				druge strane, grupni treninzi često koriste dinamiku grupe kako bi podstakli međusobnu podršku i
				motivaciju.
			</li>
			<li>
				<b>Troškovi:</b> Personalni treninzi obično su skuplji jer pružaju individualizovanu pažnju.
				Grupni
				treninzi
				mogu biti ekonomska opcija jer se troškovi dele između više ljudi.
			</li>
			<li>
				<b>Društveni aspekt:</b> Grupni treninzi često nude društveni aspekt vežbanja, gde ljudi mogu
				zajedno raditi na
				svojim ciljevima, deliti iskustva i motivisati se međusobno. Personalni trening, s druge strane,
				može
				biti intimniji i fokusiran na pojedinca.
			</li>
			<li>
				<b>Struktura treninga:</b> Personalni trening pruža veću fleksibilnost u vezi sa strukturom
				treninga,
				prilagođavajući se individualnim potrebama. Grupni treninzi često slede unapred definisanu
				strukturu
				koja može biti manje prilagodljiva.
			</li>
		</ol>
	</div>
	<div class="zakljucak">
		U krajnjoj liniji, izbor između personalnog i grupnog treninga zavisi od ličnih ciljeva, preferencija i
		budžeta pojedinca.
	</div>



	<?php if (auth_is_admin() && isset($_output['deleted_count']) && $_output['deleted_count'] > 0): ?>
    <div style="background-color: #fff3cd; border: 1px solid #ffeaa7; padding: 12px; border-radius: 8px; text-align: center; margin: 20px auto; max-width: 600px;">
        <strong style="color: #856404;">
            Obrisano treninga: <?= $_output['deleted_count'] ?>
        </strong> 
        | <a href="?page=training&show_deleted=1" style="color: #856404;">Prikaži obrisane treninge</a>
    </div>
	<?php endif; ?>

	<div class="izbor">
		<div class="kartica">
			<?php if (auth_is_admin()): ?>
				<a href="<?= FILE_INDEX ?>?page=<?= $_page ?>&action=submit">DODAJ NOVI TRENING</a><br><br>
			<?php endif; ?>


			<?php foreach ($training_article AS $ta): ?>
				<training-listing>
					<training-item>
						<br>
						<hr>
						<br>
						<thumbnail href="<?= FILE_INDEX ?>?page=training&id=<?= $ta['training_id'] ?>">
							<img src="<?= DIR_IMAGES . $ta['training_id'] ?>.webp">
						</thumbnail>


						<div>
							<h2>
								<a href="<?= FILE_INDEX ?>?page=training&id=<?= $ta['training_id'] ?>">
									<?= $ta['title'] ?>
								</a>
							</h2>
							<p><?= $ta['price'] ?> RSD</p>

							<?php if (auth_is_admin()): ?>
								<div>
						
									<a href="<?= FILE_INDEX ?>?page=training&action=edit&id=<?= $ta['training_id'] ?>">IZMENI </a>
									
									<a href="<?= FILE_INDEX ?>?page=training&action=delete&id=<?= $ta['training_id'] ?>">| IZBRIŠI</a>
								
								</div>
							<?php endif; ?>
							<input type="hidden" name="page" value="training">
							<input type="hidden" name="action" value="delete">
						</div>
					</training-item>
				</training-listing>
			<?php endforeach; ?>
		</div>
	</div>

		

	<div id="bmi-kalkulator">
		<h3>IZRAČUNAJTE SVOJ BMI!</h3>
		<p>
			Indeks telesne mase (BMI) je vrednost koja se dobije kada težinu osobe u kilogramima podelimo sa
			kvadratom visine u metrima. BMI je jeftina i laka metoda skrininga za telesnu masu - podhranjenost,
			zdrava telesna masa, prekomerna težina i gojaznost.
		</p>

		<label for="visina">Visina (cm):</label>
		<input type="number" id="visina" placeholder="173">

		<label for="tezina">Težina (kg):</label>
		<input type="number" id="tezina" placeholder="83">

		<label for="pol">Pol:</label>
		<input type="text" id="pol" placeholder="M/Ž">

		<button id="izracunaj">IZRAČUNAJ</button>

		<div id="rezultat"></div>
	</div>
</div>

<script>
	/* -------------------- BMI KALKULATOR -------------------- */

	var dugme = document.getElementById("izracunaj");
	dugme.addEventListener("click", izracunajBMI);

	function izracunajBMI() {
		let visina = document.getElementById("visina").value;
		visina = visina / 100;
		let tezina = document.getElementById("tezina").value;
		let pol = document.getElementById("pol").value;
		pol = pol.toUpperCase();
		let rezultat = document.getElementById("rezultat");

		if (visina == 0 || isNaN(visina))
			rezultat.innerHTML = "Unesite ispravnu visinu!";
		else if (tezina == 0 || isNaN(tezina))
			rezultat.innerHTML = "Unesite ispravnu težinu!";
		else
			var bmi = (tezina / (visina * visina)).toFixed(2);

		if (pol == "M") {
			if (bmi < 20.7)
				rezultat.innerHTML = bmi.valueOf() + " - Neuhranjenost!";
			else if (20.7 <= bmi && bmi < 26.5)
				rezultat.innerHTML = bmi.valueOf() + " - Idealna masa!";
			else if (26.5 <= bmi && bmi < 27.9)
				rezultat.innerHTML = bmi.valueOf() + " - Prekomerna masa!";
			else if (27.9 <= bmi && bmi < 31.2)
				rezultat.innerHTML = bmi.valueOf() + " - Blaga gojaznost!";
			else if (31.2 <= bmi && bmi < 45.5)
				rezultat.innerHTML = bmi.valueOf() + " - Gojaznost!";
			else
				rezultat.innerHTML = bmi.valueOf() + " - Ekstremna gojaznost!";
		} else if (pol == "Z" || pol == "Ž") {
			if (bmi < 19.1)
				rezultat.innerHTML = bmi.valueOf() + " - Neuhranjenost!";
			else if (19.1 <= bmi && bmi < 25.9)
				rezultat.innerHTML = bmi.valueOf() + " - Idealna masa!";
			else if (25.9 <= bmi && bmi < 27.4)
				rezultat.innerHTML = bmi.valueOf() + " - Prekomerna masa!";
			else if (27.4 <= bmi && bmi < 32.3)
				rezultat.innerHTML = bmi.valueOf() + " - Blaga gojaznost!";
			else if (32.3 <= bmi && bmi < 44.8)
				rezultat.innerHTML = bmi.valueOf() + " - Gojaznost!";
			else
				rezultat.innerHTML = bmi.valueOf() + " - Ekstremna gojaznost!";
		} else
			rezultat.innerHTML = "Unesite ispravan pol!";
	}
</script>