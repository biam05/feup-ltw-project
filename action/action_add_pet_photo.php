<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');

  /* Database Managers Files */ 
  include_once('../database/regex.php'); 
  include_once('../database/users.php');  
  include_once('../database/pets.php');  
  include_once('../database/pets_adoption.php');  
  include_once('../database/pets_profile.php');  

  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  $idUser = $_SESSION['user']['idUser'];
  $idPet = $_GET['idPet'];

  if(validNumber($idPet)) {
    addPetPhoto($idUser, $idPet);
    
    header('Location: ../index.php');
  }
  else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>