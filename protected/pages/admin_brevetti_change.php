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
     <br><br>
     <h4>Rendi di Pubblico dominio</h4>
     <form method="post" action="/app/editBrevetto">
       <input type="hidden" name="id" value="<?= $brevetto; ?>">
       <input type="hidden" name="do" value="setPublic"><br><br>
       <button class='w3-button w3-red w3-text-white' style='border-radius: 50px'>Modifica</button>
     </form>
     <br>
     <h4>Cambia lo stato del Brevetto</h4>
     <form method="post" action="/app/editBrevetto">
       <input type="hidden" name="id" value="<?= $brevetto; ?>">
       <input type="hidden" name="do" value="changeStatus">
       <select name='status'>
            <option value='0'>0 - In approvazione</otpion>
            <option value='1'>1 - Approvato</option>
            <option value='2'>2 - Rifiutato</option>
            <option value='3'>3 - Scaduto (Pubblico dominio)</option>
       </select><br><br>
       <button class='w3-button w3-red w3-text-white' style='border-radius: 50px'>Modifica</button>
     </form>
     <h4>Cambia l'owner del dominio</h4>
     <form method="post" action="/app/editBrevetto">
       <input type="hidden" name="id" value="<?= $brevetto; ?>">
       <input type="hidden" name="do" value="changeOwner">
       <inotu type="text" name="autore"><br><br>
       <button class='w3-button w3-red w3-text-white' style='border-radius: 50px'>Modifica</button>
     </form>
