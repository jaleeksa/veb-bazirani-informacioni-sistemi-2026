<div id="prijava">

    <?php if (($_SESSION['user_level'] ?? '') >= 1): ?>
        <div class="banner">
            <h1>VEĆ STE PRIJAVLJENI</h1>
        </div> 
        <br>
        <div class="redirect">
            Vrati se na <a href="<?= FILE_INDEX ?>">početnu stranu</a>.
        </div>

    <?php else: ?>
        <div class="banner">
            <h1>PRIJAVA</h1>
        </div>  


        <div id="prijava-info">
            <form method="post">
                <label>Korisničko ime</label><br>
                <input type="text" name="username">
                <br>
                <label>Lozinka</label><br>
                <input type="password" name="password">
                <br><br>
                <button>PRIJAVITE SE</button>
            </form>
        </div>

    <?php endif; ?>

</div>
