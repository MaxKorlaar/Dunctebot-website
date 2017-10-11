<?php
require('config.php');

$db = new PDO("mysql:host={$config['db']['host']};port=3306;dbname={$config['db']['dbname']}"
                 , $config['db']['user'], $config['db']['pass'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
