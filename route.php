<?php
$url = $_SERVER["REQUEST_URI"];

require_once("protected/config.php");

session_start();
switch ($url) {
  case '/':
    require_once("protected/pages/main.php");
    break;
  case '/login':
    require_once("protected/components/header.php");
    require_once("protected/pages/login.php");
    require_once("protected/components/footer.php");
    break;
  case '/auth':
    require_once("protected/components/header.php");
    require_once("protected/components/authMePls.php");
    require_once("protected/components/footer.php");
    break;
  case '/info':
    require_once("protected/components/header.php");
    require_once("protected/pages/info.php");
    require_once("protected/components/footer.php");
    break;
  case '/dashboard':
    require_once("protected/components/header.php");
    require_once("protected/components/security.php");
    require_once("protected/pages/dahsboardMain.php");
    require_once("protected/components/footer.php");
    break;
  case '/dashboard/':
    require_once("protected/components/header.php");
    require_once("protected/components/security.php");
    require_once("protected/pages/dahsboardMain.php");
    require_once("protected/components/footer.php");
    break;
  case '/dashboard/nuovobrevetto':
    require_once("protected/components/header.php");
    require_once("protected/components/security.php");
    require_once("protected/pages/newBrevetto.php");
    require_once("protected/components/footer.php");
    break;
  case '/app/newBrevetto':
    require_once("protected/components/header.php");
    require_once("protected/components/security.php");
    require_once("protected/components/nuovobrevettotuttoperte.php");
    require_once("protected/components/footer.php");
    break;
  case '/app/editBrevetto':
    require_once("protected/components/header.php");
    require_once("protected/components/adminsec.php");
    require_once("protected/components/modificabrevetto.php");
    require_once("protected/components/footer.php");
    break;
  case '/dashboard/mep':
    require_once("protected/components/header.php");
    require_once("protected/components/security.php");
    require_once("protected/pages/mieibrevetti.php");
    require_once("protected/components/footer.php");
    break;
  case '/admin':
    require_once("protected/components/header.php");
    require_once("protected/components/adminsec.php");
    require_once("protected/pages/admin_MAIN.php");
    require_once("protected/components/footer.php");
    break;
  case '/admin/':
    require_once("protected/components/header.php");
    require_once("protected/components/adminsec.php");
    require_once("protected/pages/admin_MAIN.php");
    require_once("protected/components/footer.php");
    break;
  case '/admin/brevetti':
    require_once("protected/components/header.php");
    require_once("protected/components/adminsec.php");
    require_once("protected/pages/admin_brevettilist.php");
    require_once("protected/components/footer.php");
    break;
  default;
    if (stripos($url, "/admin/modifica/")) {
      $brevetto = filter_var(str_replace("/admin/modifica/", "", $url), FILTER_SANITIZE_NUMBER_INT);
      require_once("protected/components/header.php");
      require_once("protected/components/adminsec.php");
      require_once("protected/pages/admin_brevetti_change.php");
      require_once("protected/components/footer.php");
    } elseif (stripos($url, "/brevetto/")) {
      $brevetto = filter_var(str_replace("/brevetto/", "", $url), FILTER_SANITIZE_NUMBER_INT);
      require_once("protected/components/header.php");
      require_once("protected/components/build_brevetto.php");
      require_once("protected/components/footer.php");
    } else {
      require_once("protected/components/header.php");
      require_once("protected/pages/404.php");
      require_once("protected/components/footer.php");
    }
    break;
}
