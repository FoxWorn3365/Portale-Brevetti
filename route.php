<?php
$url = $_SERVER["REQUEST_URI"];

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
} else {
  require_once("protected/components/header.php");
  require_once("protected/pages/404.php");
  require_once("protected/components/footer.php");
}
