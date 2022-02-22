<?php
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();

$get = $b->getPatent($brevetto);
$color = $b->loadStatusColor();
$name = $b->loadNameFromStatus();
?>
     <h2><?= $get[2]; ?> - ID: <?= $brevetto; ?></h2>
     <hr>
     <span style='font-size: 20px'><b>Autore:</b> <?= $get[0]; ?><img src="https://minotar.net/helm/<?= $get[0]; ?>/100.png"> | Creato in data: <?= date("d/m/Y - H:i:s", $get[1]); ?> | Stato: <span style='color: <?= $color[$get[4]]; ?>'><?= $name[$get[4]]; ?></span></span><br><hr><br>
     <pre><?= $get[3]; ?></pre>
     
