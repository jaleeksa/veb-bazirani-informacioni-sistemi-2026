<?php



/* Inicijalizacija aplikacije */
define('DIR_ROOT', './');
define('DIR_CORE', DIR_ROOT . 'core/');
define('DIR_MODEL', DIR_ROOT . 'model/');
define('DIR_PUBLIC', DIR_ROOT . 'public/');
define('DIR_IMAGES', DIR_PUBLIC . 'images/');
define('DIR_CSS', DIR_PUBLIC . 'css/');
define('DIR_JS', DIR_PUBLIC . 'js/');
define('DIR_VIEW', DIR_ROOT . 'view/');
define('FILE_INDEX', DIR_ROOT . 'index.php');
define('FILE_ERROR404', FILE_INDEX . '?page=error404');
define('USER_LEVEL_ANONYMOUS', 0);
define('USER_LEVEL_USER', 1);
define('USER_LEVEL_ADMIN', 2);

$_error = [];
$_message = [];
$_output = [
	'page-title' => '',
	'_error' => [],
	'_message' => [],
	'model-name' => '',
	'view-name' => '',
];

/* Incijalizacija aplikacije */
session_start();
include_once(DIR_CORE . 'functions.php');
include_once(DIR_CORE . 'functions-auth.php');
include_once(DIR_CORE . 'functions-db.php');
include_once(DIR_CORE . 'functions-session.php');
$_db = db_connect();

/* Očitaj ulazne parametre */
$_id = (int)($_GET['id'] ?? '');
$_action = $_GET['action'] ?? '';
$_page = $_GET['page'] ?? '';

/* Kontroler */
$module_filename = 
	$_page == ''
		? DIR_MODEL . 'model-home.php' 
		: DIR_MODEL . "model-{$_page}.php";

if (!file_exists($module_filename))
	$module_filename = DIR_MODEL . 'model-error404.php';

include_once($module_filename);


if (empty($_output['model-name'])) {
	$_output['model-name'] = $_page ?: 'home';
}

if (empty($_output['view-name'])) {
	$defaultView = 'view-' . ($_output['model-name'] ?: ($_page ?: 'home')) . '.php';
	if (file_exists(DIR_VIEW . $defaultView)) {
		$_output['view-name'] = $defaultView;
	} else {
		$_output['model-name'] = 'error404';
		$_output['view-name'] = 'view-error404.php';
		
	}
}

/* Kraj kontrolera */

db_close($_db);

/* Pogled */
include_once(DIR_VIEW . 'page-header.php');
include_once(DIR_VIEW . 'page-body.php');
include_once(DIR_VIEW . 'page-footer.php');

	
?>




