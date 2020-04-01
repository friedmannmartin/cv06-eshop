<?php
  session_start();

  require 'db.php';

  #region vytvoření session pole pro košík
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
  #endregion vytvoření session pole pro košík

  #region kontrola, jestli je zboží v DB
  $stmt = $db->prepare('SELECT * FROM goods WHERE id=?');
  $stmt->execute(array($_GET['id']));
  $goods = $stmt->fetch();

  if (!$goods){
    die('Unable to find goods!');//TODO místo ukočení skriptu by tu bylo hezké jen nějaké uložení chybové hlášky
  }
  #endregion kontrola, jestli je zboží v DB

  #region přidání zboží do košíku
    if(array_key_exists($goods['id'], $_SESSION['cart'])){
      $_SESSION['cart'][$goods['id']]++; //zvýšení množství zboží které už je v košíku
    }else {
      $_SESSION['cart'][$goods['id']] = 1; //přidání zboží které ještě není v košíku
    }
  #endregion přidání zboží do košíku

  header('Location: cart.php');//přesměrujeme uživatele na košík
