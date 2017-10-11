<?php
include("../includes/db.php");

//$db->exec("SET CHARACTER SET utf8");

$row = null;
if( isset($_GET['search']) && !empty($_GET['search']) ) {
    $sta = $db->prepare("SELECT * FROM kpop WHERE name LIKE :search2 OR id=:search1 LIMIT 1");
    $sta->execute([
        'search1' => $_GET['search'],
        'search2' => '%'.$_GET['search'].'%'
    ]);

    if($sta) {
        $row = $sta->fetchAll(PDO::FETCH_BOTH)[0];
        /*echo "<id>{$row['id']}</id>\n";
        echo "<name>{$row['name']}</name>\n";
        echo "<band>{$row['band']}</band>\n";
        echo "<picture>{$row['img']}</picture>\n";
        die();*/
    }

} else {
    $row = $db->query("SELECT * FROM kpop ORDER BY RAND() LIMIT 1")->fetchAll(PDO::FETCH_BOTH)[0];
}

if(isset($_GET['json'])) {
    $id = $row['id'];
    $name = $row['name'];
    $band = $row['band'];
    $img = $row['img'];
    $jsonStr = array(
        'id' => $id,
        'name' => $name,
        'band' => $band,
        'img' => $img,
    );
    die(json_encode($jsonStr));
}

echo "<id>{$row['id']}</id>\n";
echo "<name>{$row['name']}</name>\n";
echo "<band>{$row['band']}</band>\n";
echo "<picture>{$row['img']}</picture>\n";
die();
