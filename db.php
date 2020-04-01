<?php
  //pripojeni do db na serveru eso.vse.cz
  //TODO v následujícím řádku uveďte vlastní jméno a heslo k DB
  $db = new PDO('mysql:host=127.0.0.1;dbname=frim00;charset=utf8', 'frim00', 'Yee7eigh4thoiNg3ai');

  //vyhazuje vyjimky v pripade neplatneho SQL vyrazu
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
