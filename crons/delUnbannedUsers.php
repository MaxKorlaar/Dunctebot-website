<?php
require('../includes/db.php');

$res = $db->query("DELETE FROM bans WHERE unban_date < NOW()")->fetchAll(PDO::FETCH_BOTH);
