<?php
if (!in_array($_SESSION["user"], $allowes_users)) {
  die("ERROR: Unhautorized");
}
