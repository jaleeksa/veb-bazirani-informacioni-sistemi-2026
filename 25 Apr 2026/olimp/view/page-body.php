    <!-- BANER -->
	<?php
        $_bannerClass = $_output['model-name'] ?: ($_page ?: 'naslovna');

        if ($_bannerClass === 'home' || $_bannerClass === '') {
            $_bannerClass = 'naslovna';
        }

        if (in_array($_bannerClass, ['training-article', 'training-edit', 'training-submit', 'training-delete'], true)) {
            $_bannerClass = 'training';
        }
    ?>

    <?php if ($_page != 'stats'): ?>
        <div class="banner <?= htmlspecialchars($_bannerClass) ?>">
            <h1>
                <?= $_output['page-title'] ?: ($_page ? strtoupper(str_replace('_', ' ', $_page)) : 'NASLOVNA') ?>
            </h1>
        </div>
    <?php endif; ?>

	
	<!--ISPISUJEMO GREŠKE I PORUKE, AKO IH IMA, KAO I SADRŽAJ STRANE KOJI JE ODREDIO KONTROLER -->


	<!-- ISPISUJEMO GREŠKE -->
	<?php if ($_output['_error']): ?>
		<error>
			<h2>Greška</h2>
			<ul>
				<?php foreach($_output['_error'] AS $e): ?>
					<li><?= $e ?></li>
				<?php endforeach; ?>
			</ul>
		</error>
	<?php endif; ?>


	<!-- ISPISUJEMO PORUKE -->

	<?php if ($_output['_message']): ?>
		<message>
			<ul>
				<?php foreach($_output['_message'] AS $m): ?>
					<li><?= $m ?></li>
				<?php endforeach; ?>
			</ul>
		</message>
	<?php endif; ?>

	<!-- SADRŽAJ STRANE -->
    <page>
        <?php include_once(DIR_VIEW . $_output['view-name']); ?>
    </page>