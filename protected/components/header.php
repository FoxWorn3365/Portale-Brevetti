<?php
if (!empty($_SESSION["user"])) {
  $text = "Dashboard";
} else {
  $text = "Accedi";
}
?>
<!DOCTYPE html>
<html> 
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Portale Brevetti permette di brevettare e gestire online tutti i brevetti di RGBCraft">
    <meta name="keywords" content="RGBCraft RGBCraftBrevetti brevetti">
    <meta name="author" content="Federico Cosma, Jacopo Cassinis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGBCraft - Portale Brevetti</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style="text-align: center">
     <div class="w3-bar w3-white w3-text-black">
        <a href="/" class="w3-bar-item w3-button">Home</a>
        <a href="/brevetti" class="w3-bar-item w3-button">Brevetti Validi</a>
        <a href="/brevetti-non-validi" class="w3-bar-item w3-button">Brevetti non Validi</a>
        <a href="/login" class="w3-bar-item w3-button"><?= $text; ?></a>
     </div>
     <br><br>
     <h1>RGBCraft - Portale Brevetti</h1>
     <hr>
     <br>
