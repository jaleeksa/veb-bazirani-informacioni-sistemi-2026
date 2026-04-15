<html>

<head>
    <title>Olimp - Gym & Fitness</title>
    <link rel="shortcut icon" href="./public/images/olimp-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./public/js/script.js"></script>
    <script src="https://kit.fontawesome.com/0432b7c5fe.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <a href="./index.php"><img src="./public/images/olimp-logo.png" alt="Olimp - Gym & Fitness"></a>
        <h1>OLIMP - Gym & Fitness</h1>
    </header>

    <nav>
        <a href="./index.php">Naslovna</a>
        <a href="./index.php?model=training">Treninzi</a>
        <a href="./index.php?model=about_us">O Nama</a>
        <a href="./index.php?model=contact">Kontakt</a>

        <?php if ($_SESSION['loggedin'] == 1): ?>
            <a href="./index.php?model=logout">Odjava</a>
        <?php else: ?>
            <a href="./index.php?model=login">Prijava</a>
        <?php endif; ?>
    </nav>

    <wrapper>