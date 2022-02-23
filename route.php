<?php
$url = $_SERVER["REQUEST_URI"];

require_once("protected/config.php");

session_start();
if (empty($url)) {
  require_once("protected/pages/main.php");
} elseif ($url == "/login") {
  require_once("protected/components/header.php");
  require_once("protected/pages/login.php");
} elseif ($url == "/auth") {
  require_once("protected/components/header.php");
  require_once("protected/components/authMePls.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/info") {
  require_once("protected/components/header.php");
  require_once("protected/pages/info.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/dashboard/") {
  require_once("protected/components/header.php");
  require_once("protected/components/security.php");
  require_once("protected/pages/dahsboardMain.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/dashboard/nuovobrevetto") {
  require_once("protected/components/header.php");
  require_once("protected/components/security.php");
  require_once("protected/pages/newBrevetto.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/app/newBrevetto") {
  require_once("protected/components/header.php");
  require_once("protected/components/security.php");
  require_once("protected/components/nuovobrevettotuttoperte.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/app/editBrevetto") {
  require_once("protected/components/header.php");
  require_once("protected/components/adminsec.php");
  require_once("protected/components/modificabrevetto.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/dashboard/mep") {
  require_once("protected/components/header.php");
  require_once("protected/components/security.php");
  require_once("protected/pages/mieibrevetti.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/admin/") {
  require_once("protected/components/header.php");
  require_once("protected/components/adminsec.php");
  require_once("protected/pages/admin_MAIN.php");
  require_once("protected/components/footer.php");
} elseif ($url == "/admin/brevetti") {
  require_once("protected/components/header.php");
  require_once("protected/components/adminsec.php");
  require_once("protected/pages/admin_brevettilist.php");
  require_once("protected/components/footer.php");
} elseif (stripos($url, "/admin/modifica/") !== false) {
  $brevetto = filter_var(str_replace("/admin/modifica/", "", $url), FILTER_SANITIZE_NUMBER_INT);
  require_once("protected/components/header.php");
  require_once("protected/components/adminsec.php");
  require_once("protected/pages/admin_brevetti_change.php");
  require_once("protected/components/footer.php");
} elseif (stripos($url, "/brevetto/") {
  $brevetto = filter_var(str_replace("/brevetto/", "", $url), FILTER_SANITIZE_NUMBER_INT);
  require_once("protected/components/header.php");
  require_once("protected/components/build_brevetto.php");
  require_once("protected/components/footer.php");
} else {
  require_once("protected/components/header.php");
  require_once("protected/pages/404.php");
  require_once("protected/components/footer.php");
}
