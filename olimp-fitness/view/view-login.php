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
            <h1>PRIJAVI SE</h1>
        </div>  


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
