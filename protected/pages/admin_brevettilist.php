<?php
// Implementazione del FilterBy->get
$filter = $_GET["filter"];
$query = $_GET["q"];

// Ora carichiamo lo script per generare la directory
foreach(glob("protected/brevetti/*") as $file) {
  $filename = str_replace("protected/brevetti/", "", $filename);
  $get = $b->getPatent($file);
  $c = $b->loadStatusColor();
  $name = $b->loadNameFromStatus();
  if ($get !== 502) {
    ?>
    <a style='text-decoration: none; color: black' href='/brevetto/<?= $file; ?>'>
    <span style='font-size: 30px'><b><?= $get[2]; ?></b></span><br>
    <span style='font-size: 18px'>Di: <?php if ($get[0] == "guest") { echo 'pubblico dominio'; } else { echo $get[0]; } ?>&nbsp;&nbsp;&nbsp; Stato: <span style='color: <?= $color[$get[4]]; ?>'><?= $name[$get[4]]; ?></span></span></a>  <a href='/admin/modifica/<?= $file; ?>'><button clss='w3-button w3-orange w3-text-white' style='border-raidus: 50px'>Modifica</button></a>
    <br><hr><br>
    <?php
  }
}
