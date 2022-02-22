<?php
$url = $_SERVER["REQUEST_URI"];

if (empty($url)) {
  require_once("protected/pages/main.php");
}
