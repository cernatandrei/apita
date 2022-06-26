<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "includes/autoloader.php";
$db = Db::getInstance();

require_once "includes/header.php";
require_once "includes/navigation.php";
$action = 'home';
if (!empty($_GET['page'])) {
    $action = $_GET['page'];
}
$whitelist = ['home', 'contact'];
if (!in_array($action, $whitelist)) {
    $action = 'home';
}

require_once "includes/templates/{$action}.php";

require_once "includes/footer.php";
?>

