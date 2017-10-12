<?php
$page = empty($_GET['page']) ? "home" : filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
require("pages/templates/header.php");

$allowedPages = ['home', 'kpop', 'quotes'];

if(in_array($page, $allowedPages)) {
    require("pages/{$page}.php");
} else {
    require('pages/404.php');
}
require("pages/templates/footer.php");
