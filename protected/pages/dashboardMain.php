<?php
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();
?>
     <h2>Benvenuto, <?= $_SESSION["user"]; ?></h2>
     <br><br>
     Da questo pannello potrai creare e gestire i tuoi brevetti
     <br><br><br>
     <a href='/dashboard/mep'><button class="w3-button w3-green w3-text-white">I tuoi Brevetti</button></a><a href='/dashboard/nuovobrevetto'><button class="w3-button w3-green w3-text-white">Nuovo Brevetto</button></a><a href='/logout'><button class="w3-button w3-red w3-text-white">Esci</button></a>
