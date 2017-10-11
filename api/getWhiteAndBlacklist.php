<?php
require("../includes/db.php");

$output = array();

$whitelistDB = $db->query("SELECT * FROM whiteList")->fetchAll(PDO::FETCH_BOTH);

$whitelist = array();

foreach($whitelistDB as $row) {
  array_push($whitelist, [
    "guildID" => $row['guildId']
  ]);
}

$blacklistDB = $db->query("SELECT * FROM blackList")->fetchAll(PDO::FETCH_BOTH);

$blacklist = array();

foreach($blacklistDB as $row) {
  array_push($blacklist, [
    "guildID" => $row['guildId']
  ]);
}

array_push($output, ["whitelist" => $whitelist, "blacklist" => $blacklist]);

echo substr(json_encode($output), 1, -1);
