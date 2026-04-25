<div id="prijava">

    <?php if (($_SESSION['user_level'] ?? '') >= 1): ?>

        <br>
        <div class="redirect">
            <h1>VEĆ STE PRIJAVLJENI</h1>
            Vrati se na <a href="<?= FILE_INDEX ?>">početnu stranu</a>.
        </div>

    <?php else: ?>
        


        <div id="prijava-info">
            <form method="post">
                <input type="text" name="username" placeholder="Korisničko ime">
                <br><br>
                <input type="password" name="password" placeholder="Lozinka">
                <br><br>
                <button>Pošalji</button>
            </form>
        </div>

    <?php endif; ?>

</div>
