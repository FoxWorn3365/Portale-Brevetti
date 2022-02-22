<?php
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();
?>
     <h2>Portale Brevetti - Nuovo brevetto!</h2>
     <br>
<?php
$count = $b->getUserPatentCount($_SESSION["user"]);
if ($count >= 5) {
?>
     <span style="font-size: 20px; color: red">Hai già 5 brevetti!</span>
     Puoi avere al massimo <b>5</b> brevetti attivi contemporaneamente<br>Per brevettare nuove cose, <a href='/dashboard/mep'>rendine pubblico qualcuno</a>!
<?php
     die();
}

// Ok, ha ancora meno di 5 brevetti
?>
     <form method="post" action="/app/newBrevetto">
       Titolo (massimo 40 caratteri):<br>
       <i class="fa fa-pencil" aria-hidden="true"></i><input type="text" name="titolo" maxlength="40"><br>
       Descrizione: (massimo 500 caratteri):<br>
       <textarea name="descrizione"></textarea><br><br>
       <button class="w3-button w3-green w3-text-white">Crea!</button>
     </form>
