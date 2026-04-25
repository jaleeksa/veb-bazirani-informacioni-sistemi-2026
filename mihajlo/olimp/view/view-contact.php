<div id="kontakt">
    

    <div id="kontakt-info">

        <h4>Ukoliko imate nekih pitanja, budite slobodni da nam se obratite:</h4>
        <ul>
            <li><i class="fa-solid fa-envelope"></i> <a href="mailto:nis@singidunum.ac.rs">nis@singidunum.ac.rs</a></li>
            <li><i class="fa-solid fa-map-location-dot"></i> Nikole Pašića 28, prizemlje, 18000 Niš</li>
            <li><i class="fa-solid fa-phone-volume"></i> <a href="tel:+38118208300">018/208 300</a></li>
            <li><i class="fa-solid fa-fax"></i> <a href="tel:+38118208301">018/208 301</a></li>
        </ul>
    </div>

    <div id="kontakt-forma">
        <h4>KONTAKTIRAJTE NAS</h4>
            <?php if ($mail_sent): ?>
                Vrati se na <a href="<?= FILE_INDEX ?>">početnu stranu.</a>
            <?php else: ?>
            <form method="post">
                <label>Ime:</label>
                <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
                <label>Email:</label>
                <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>">
                <label>Poruka:</label>
                <textarea name="message"><?= $_POST['message'] ?? '' ?></textarea>
                <button id="posalji-formu">Pošalji</button>
            </form>
            <?php endif; ?>
    </div>

    <div id="mapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d863.0082271350738!2d21.895721004327168!3d43.31840459805632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b16f291241%3A0x5d4587d453cb8630!2z0KPQvdC40LLQtdGA0LfQuNGC0LXRgiDQodC40L3Qs9C40LTRg9C90YPQvA!5e0!3m2!1sen!2srs!4v1703878514924!5m2!1sen!2srs"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

