<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/dogs.php');

  //$articles = getAllDogs();
  

  $nameSearch = isset($_POST["nameSearch"]) ? $_POST["nameSearch"] : '';

  $genderSearch = isset($_POST["genderSearch"]) ? $_POST["genderSearch"] : '';

  $speciesSearch = isset($_POST["speciesSearch"]) ? $_POST["speciesSearch"] : '';

  $sizeSearch = isset($_POST["sizeSearch"]) ? $_POST["sizeSearch"] : '';

  $colorSearch = isset($_POST["colorSearch"]) ? $_POST["colorSearch"] : '';



  $articles = getDogsByAll($nameSearch,$speciesSearch,$genderSearch,$sizeSearch,$colorSearch);
  


  include_once('templates/common/header.php');
  include_once('search_advanced.php');
  include_once('display_pets.php');
  include_once('templates/common/footer.php');
?>