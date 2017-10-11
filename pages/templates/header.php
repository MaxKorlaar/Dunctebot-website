<?php
require('includes/db.php');
function addLink($links) {
    foreach ($links as $page2 => $title) {
        $class = "";
        if ($GLOBALS['page'] == $page2) {
            $class = ' active';
        }
        echo "<li class=\"nav-item$class\"><a href=\"./$page2\" class=\"nav-link\">$title</a></li>";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?php echo $page . " | "; ?>dunctebot website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-danger">
      <a class="navbar-brand" href="#">Dunctebot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
                addLink(array(
                    'home' => 'Home',
                    'kpop' => 'Kpop suggestions',
                    'quotes' => 'Footer quotes'
                ));
            ?>
          <li class="nav-item">
            <a href="https://bots.discord.pw/bots/210363111729790977" class="nav-link" target="_blank">Discordbots page</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/duncte123/SkyBot/" class="nav-link" target="_blank">GitHub repo</a>
          </li>
          <li class="nav-item">
            <a href="./javadoc/" class="nav-link" target="_blank">Javadoc</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://discordapp.com/oauth2/authorize?client_id=210363111729790977&scope=bot&permissions=2146958591" target="_blank">Invite</a>
          </li>
        </ul>
      </div>
    </nav>
