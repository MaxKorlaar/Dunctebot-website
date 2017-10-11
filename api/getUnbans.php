<?php
date_default_timezone_set("Europe/Amsterdam");
require('../includes/db.php');

$res = $db->query("SELECT * FROM bans")->fetchAll(PDO::FETCH_BOTH);
$toUnban = array();

foreach ($res as $row) {

  $today = date('Y-m-d H:i:s');//Y-m-d H:i:s
  $expireDate = new DateTime($row['unban_date']);
  $now = new DateTime($today);
  $interval = $now->diff($expireDate);
  $diff = $interval->format('%R%i');

  if ($diff < 0)  {
    array_push($toUnban, [
      'userId' => $row["userId"],
      'guild' => $row["guildId"]
    ]);
  }

  if (isset($_POST['delete'])) {
    //$db->query("DELETE FROM bans WHERE id='{$row['id']}'");
  }
}
echo json_encode($toUnban);
