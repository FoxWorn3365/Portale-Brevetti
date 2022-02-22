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
} elseif ($url = "/antifortnine/") {
  header("Location: https://pornhub.com/");
}
