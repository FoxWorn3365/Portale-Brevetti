<?php
use Brevetti\FileGo;
require_once("protected/autoload.php");

$b = new FileGo();

foreach(glob("protected/brevetti/*") as $file) {
  $filename = str_replace("protected/brevetti/", "", $filename);
  $get = $b->getPatent($file);
  $c = $b->loadStatusColor();
  if ($get !== 502 && stripos($get[1], $title) !== false) {
    ?>
    <a style='text-decoration: none; color: black' href='/brevetto/<?= $file; ?>'>
    <span style='font-size: 30px'><b><?= $get[2]; ?></b></span><br>
    <span style='font-size: 18px'>Di: <?php if ($get[0] == "guest") { echo 'pubblico dominio'; } else { echo $get[0]; } ?>&nbsp;&nbsp;&nbsp; Stato: <span style='color: <?= $c[$get[4]]; ?>'><?= $get[4]; ?></span></span>
    </a>
    <br><hr><br>
    <?php
  }
}
