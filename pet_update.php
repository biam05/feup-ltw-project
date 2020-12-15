<?php
  /* Initialize Session and Database */
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  /* Database Managers Files */
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  include_once('database/users.php');
  
  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  $pet = getPet($_GET['idPet']);
  $posts = getPosts($_GET['idPet']);

  $photos = getAllPhotos($_GET['idPet']);
  
  /* HTML Code */
  include_once('templates/common/header.php');
  include_once('templates/pet/pet_update.php');
  include_once('templates/common/footer.php');
?>