<?php
if (!empty($_SESSION["user"])) {
  header("Location: /dashboard/");
  exit;
}
?>
     <h2>Accedi al Portale con nPay</h2>
     <form method="post" action="/auth">
       <b>Username:</b><br>
       <i class="fa fa-user-circle-o" aria-hidden="true"></i><input type="text" name="username"><br>
       <b>Password:</b><br>
       <i class="fa fa-key" aria-hidden="true"></i><input type="password" name="password"><br><br>
       <button class="w3-button w3-orange w3-text-white">Accedi</button>
     </form>
