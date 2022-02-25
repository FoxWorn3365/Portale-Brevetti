<?php
require_once("protected/components/searchBar.php");
use Brevetti\FileGo;
require_once("protected/autoload.php");

$b = new FileGo();
$do = filter_var($_POST["do"], FILTER_SANITIZE_STRING);
$input = filter_var($_POST["input"], FILTER_SANITIZE_STRING);

foreach(glob("protected/brevetti/*") as $file) {
  $filename = str_replace("protected/brevetti/", "", $filename);
  $get = $b->getPatent($file);
  $c = $b->loadStatusColor();
  $name = $b->loadNameFromStatus();
  if ($get !== 502) {
    if (empty($do)) {
    ?>
    <a style='text-decoration: none; color: black' href='/brevetto/<?= $file; ?>'>
    <span style='font-size: 30px'><b><?= $get[2]; ?></b></span><br>
    <span style='font-size: 18px'>Di: <?php if ($get[0] == "guest") { echo 'pubblico dominio'; } else { echo $get[0]; } ?>&nbsp;&nbsp;&nbsp; Stato: <span style='color: <?= $color[$get[4]]; ?>'><?= $name[$get[4]]; ?></span></span></a>
    <br><hr><br>
    <?php
    } elseif ($do == "author" && stripos($get[0], $input) !== false) {
    ?>
    <a style='text-decoration: none; color: black' href='/brevetto/<?= $file; ?>'>
    <span style='font-size: 30px'><b><?= $get[2]; ?></b></span><br>
    <span style='font-size: 18px'>Di: <?php if ($get[0] == "guest") { echo 'pubblico dominio'; } else { echo $get[0]; } ?>&nbsp;&nbsp;&nbsp; Stato: <span style='color: <?= $color[$get[4]]; ?>'><?= $name[$get[4]]; ?></span></span></a>
    <br><hr><br>
    <?php
    } elseif ($do == "title" && stripos($get[2], $input) !== false) {
    ?>
    <a style='text-decoration: none; color: black' href='/brevetto/<?= $file; ?>'>
    <span style='font-size: 30px'><b><?= $get[2]; ?></b></span><br>
    <span style='font-size: 18px'>Di: <?php if ($get[0] == "guest") { echo 'pubblico dominio'; } else { echo $get[0]; } ?>&nbsp;&nbsp;&nbsp; Stato: <span style='color: <?= $color[$get[4]]; ?>'><?= $name[$get[4]]; ?></span></span></a>
    <br><hr><br>
    <?php
  }
}
