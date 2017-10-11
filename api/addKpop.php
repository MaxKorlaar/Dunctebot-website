<?php

if( !empty($_POST['name']) && !empty($_POST['band']) && !empty($_POST['img']) ) {

    require('../includes/db.php');

    $curl = curl_init();
     curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => [
            'secret' => $config['chapta']['secret'],
            'response' => $_POST['token'],
        ],
    ]);

    $chapRes = json_decode(curl_exec($curl));
    curl_close($curl);

    if($chapRes->success != true){
          header("location: /kpop?error=Captcha failed to verify this site<br />please try again later.");
          die();
    }

    $img = $_POST['img'];
    $name = $_POST['name'];
    $band = $_POST['band'];

    //$db->exec("SET CHARACTER SET utf8");
    $sta = $db->prepare("INSERT INTO kpop VALUES(default, :img , :name , :band )");
    $sta->execute([
        'img' => $img,
        'name' => $name,
        'band' => $band
    ]);

    if($sta) {
        header("location: /kpop?success=1");
        die();
    } else {
        header("location: /kpop?error=Whoops something broke, try again later");
        die();
    }

} else {
    header("location: /kpop?error=Some fields where empty");
    die();
}
