<html>

<head>
    <meta charset="utf8">
    <title>Olimp - Gym & Fitness</title>
    <link rel="shortcut icon" href="./public/images/olimp-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= DIR_CSS ?>style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./public/js/script.js"></script>
    <script src="https://kit.fontawesome.com/0432b7c5fe.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <a href="./index.php"><img src="./public/images/olimp-logo.png" alt="Olimp - Gym & Fitness"></a>
        <h1>OLIMP - Gym & Fitness</h1>
        <div>
            <?php if (auth_is_admin()): ?>
                <a href="<?= FILE_INDEX ?>?page=stats">Statistika </a>|
            <?php endif; ?>         

            <?php if (auth_is_user() || auth_is_admin()): ?>
                <a href="<?= FILE_INDEX ?>?page=login&action=logout">Odjavite se</a> (<?= $_SESSION['username'] ?>)
            <?php else: ?>
                <a href="<?= FILE_INDEX ?>?page=login">Prijavite se</a>
                <?php $_SESSION['username'] = '' ?> 
                                
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <a href="<?= FILE_INDEX ?>">Naslovna</a>
        <a href="<?= FILE_INDEX ?>?page=training">Treninzi</a>
        <a href="<?= FILE_INDEX ?>?page=about_us">O Nama</a>
        <a href="<?= FILE_INDEX ?>?page=contact">Kontakt</a>

      
    </nav>

     
    <page-<?= $_output['model-name'] ?>>
		<?php include_once(DIR_VIEW . $_output['view-name']); ?>			
	</page-<?= $_output['model-name'] ?>>

    


