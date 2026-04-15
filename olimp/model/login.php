<?php

if ($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // OVDE TREBA DB PROVERA (primer logike)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['loggedin'] = 1;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_level'] = $user['user_level'];

        header('location: ./index.php');
        exit;
    } else {
        echo "Pogrešan username ili password";
    }
}

$view_filename = './view/login.php';
?>