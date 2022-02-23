<?php
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();
// Recupero tutto sul brevetto
$brevInfo = $b->getPatent($brevetto);
?>
     <h2>Portale Brevetti - zona Admin</h2>
     <hr><br><br>
     <h3>Stai modificando il brevetto: <?= $brevetto; ?></h3>
     <form method="post" action="/app/editBrevetto">
       <input type="hidden" name="id" value="<?= $brevetto; ?>">
       Titolo del brevetto:<br>
       <input type="text" name="nome" value="<?= $brevInfo[2]; ?>"><br>
       Descrizione del Brevetto:<br>
       <textarea name="descrizione"><?= $brevInfo[3]; ?></textarea><br>
       Autore del brevetto:<br>
       <input type="text" name="author" value="<?= $brevInfo[0]; ?>">
       <br><br>
       <button class='w3-button w3-red w3-text-white' style='border-radius: 50px'>Modifica</button>
     </form>
