<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');

  $articles = getAllDogs();

  include_once('templates/common/header.php');
  include_once('templates/home/homepage.php');
  include_once('templates/common/footer.php');
?>
