<?php

  session_start();//spustíme session

  require 'db.php';//připojení k databázi

  #region nalezení zboží s daným ID a jeho odebrání z košíku
  $id = $_GET['id'];
  foreach ($_SESSION['cart'] as $key => $value) {
    if ($key == $id) {
      if($value == 1) {
        unset($_SESSION['cart'][$key]);
      } else {
        $_SESSION['cart'][$key]--;
      }
    }
  }
  //pro zjednodušení nekontrolujeme, jestli opravdu bylo dané zboží v košíku
  #region nalezení zboží s daným ID a jeho odebrání z košíku

  header('Location: cart.php');//přesměrujeme uživatele do košíku
