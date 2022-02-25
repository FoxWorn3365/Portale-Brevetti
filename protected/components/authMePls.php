<?php
$u = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$p = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

if (empty($u)) {
  header("Location: /login");
}

if (empty($p)) {
  header("Location: /login");
}

// Ok, ora accedo a nPay
$response = json_decode(file_get_contents("https://sunfire.a-centauri.com/npayapi/?richiesta=estratto&utente=$u&auth=$p"));

if ($response->status == 200) {
  $_SESSION["user"] = $u;
  header("Location: /dashboard/");
} else {
  header("Location /login");
  die("Credenziali errate");
}
