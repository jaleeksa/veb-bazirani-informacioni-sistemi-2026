<?php

session_start();
$_SESSION['loggedin'] = $_SESSION['loggedin'] ?? 0;

include('./config.php');
$db = mysqli_connect($config['hostname'], $config['username'], $config['password'], $config['db_name']);

$model = $_GET['model'] ?? '';
$action = $_GET['action'] ?? '';
$id = (int) ($_GET['id'] ?? 0);

switch ($model) {
    case '':
        include('./model/home.php');
        break;
    case 'training':
    case 'gallery':
        switch ($action) {
            case '':
                if ($id > 0)
                    include("./model/{$model}-article.php");
                else
                    include("./model/{$model}.php");
                break;
            case 'edit':
            case 'delete':
            case 'delete-thumb':
            case 'submit':
                include("./model/{$model}-{$action}.php");
                break;
        }
        break;
    case 'login':
    case 'logout':
    case 'contact':
        include("./model/{$model}.php");
        break;
    default:
        include("./model/404.php");
        break;
}

mysqli_close($db);

include('./view/page-header.php');
include($view_filename);
include('./view/page-footer.php');

?>