<?php
$page = empty($_GET['page']) ? "home" : $_GET['page'];
require("pages/templates/header.php");

if(file_exists("pages/{$page}.php")) {
    require("pages/{$page}.php");
} else {
    require('pages/404.php');
}
require("pages/templates/footer.php");