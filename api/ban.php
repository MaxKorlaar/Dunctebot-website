<?php
date_default_timezone_set("Europe/Amsterdam");
require('../includes/db.php');

$timestamp = strtotime($_POST['unbanDate']);
$unbanDate =  date("Y-m-d H:i:s", $timestamp);

$sta = $db->prepare(
  "INSERT INTO bans(modUserId, Username, discriminator, userId, ban_date, unban_date, guildId)
   VALUES(:modID , :username , :disc , :userID , NOW() , :unban, :guild)
");

$sta->execute([
  'modID' => $_POST['modId'],
  'username' => $_POST['username'],
  'disc' => $_POST['discriminator'],
  'userID' => $_POST['userId'],
  'unban' => $unbanDate,
  'guild' => $_POST['guildId']
]);
