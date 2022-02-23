<?php
// avviamo come sempre il nostro friend aka la classe
use Brevetti\FileGo;
require "protected/autoload.php";

$b = new FileGo();



$do = filter_var($_POST["do"], FILTER_SANITIZE_STRING);
$id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);

if (empty($id)) {
  die("ERRORE: Non è stato fornito nessun'ID!");
}

if (empty($do)) {
  die("ERRORE: cosa faccio? [do]");
}

if ($do == "setPublic") {
  $b->serPatentToPublicDomain($id);
  header("Location /admin/brevetti");
} elseif ($do == "changeStatus") {
  $b->setPatentStatus($id, filter_var($_POST["status"], FILTER_SANITIZE_NUMBER_INT));
  header("Location /admin/brevetti");
} elseif ($do == "changeOwner") {
  $b->setPatentOwnerToASpecificUser($id, filter_var($_POST["autore"], FILTER_SANITIZE_STRING));
  header("Location: /admin/brevetti");
} else {
  die("Invalid operation: $do");
}
