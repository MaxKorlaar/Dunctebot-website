<?php

if( !empty($_POST['name']) && !empty($_POST['quote']) ) {

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
          header("location: /quotes?error=Captcha failed to verify this site<br />please try again later.");
          die();
    }

    $name = $_POST['name'];
    $band = $_POST['quote'];

    //$db->exec("SET CHARACTER SET utf8");
    $sta = $db->prepare("INSERT INTO footerQuotes VALUES(default, :name , :quote )");
    $sta->execute([
        'name' => $name,
        'quote' => $band
    ]);

    if($sta) {
        header("location: /quotes?success=1");
        die();
    } else {
        header("location: /quotes?error=Whoops something broke, try again later");
        die();
    }

} else {
    header("location: /quotes?error=Some fields where empty");
    die();
}
