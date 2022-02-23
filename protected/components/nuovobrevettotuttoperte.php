<?php
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();

$author = $_SESSION["user"];
$titolo = filter_var($_POST["titolo"], FILTER_SANITIZE_STRING);
$descrizione = filter_var($_POST["descrizione"], FILTER_SANITIZE_STRING);

// Verifico che non siano troppo lunghi
$lt = explode("", $titolo);
$ld = explode("", $titolo);

if (count($lt) < 41 && count($ld) < 501) {
  // creiamo tutto lol
  $success = $b->newPatent($author, $descrizione, $titolo);
  if ($success == 500 || $success == 501) {
?>
    <h2 style='color: red'>Errore!</h2>
    Il server ha riscontrato questo errore: <b><code>Il brevetto non è stato creato con successo!</code></b>
<?php
  } else {
?>
    <h2 style='color: green'>Brevetto creato con successo!</h2>
    Il tuo brevetto (<i><?= $titolo; ?></i>) è stato appena inviato in approvazione!<br>
    Verrà approvato entro 48h dal Big Bro oppure dai suoi aiutanti!<br><br><br>
    <a href='/brevetto/<?= $success; ?>'><button class='w3-button w3-green w3-text-white'>Vai alla pagina del Brevetto</button></a>    <a href='/dashboard/mep'><button class='w3-button w3-green w3-text-white'>Vai ai tuoi Brevetti</button></a>
<?php
  }
} else {
?>
    <h2 style='color: red'>Errore!</h2>
    Il server ha riscontrato questo errore: <b><code>Il titolo o la descrizione superano i caratteri ammessi</code></b>
<?php
}
?>
