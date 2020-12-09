<section id="dog">
  <div class="profileHeader">
    <div class="header">
    </div>
    <div class="image">
    <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200">
    </div>
    

    <div class="name_and_favorite">
      <h1><?=$pet['petName']?></h1>
      <?php
      if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
      ?>
      <section id="favorite">
        <form id="favoriteForm" action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
          <button id="favoriteFormButton" title="Favorite Pet" type="submit"class="fa fa-star-o" value="<?=$pet['idPet']?>"></button>
        </form>
      </section>
      <?php } ?>
    </div>
  </div>
  <div class="infoGrid">

    <section id="information_pet">
      <section id="information_and_update">
        <h2>Information</h2>
        <?php 
        if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
          if(isOwner($_SESSION['user'], $pet['idPet'])) {
        ?>
        <form action="dog_update.php?idPet=<?=$pet['idPet']?>" method="post">
          <button type="submit"><i class="fa fa-pencil"></i></button>
        </form>
        <?php } } ?>
        <section id="moreinfo">
          <form action="dog_info.php?idPet=<?=$pet['idPet']?>" method="post">
            <button type="submit"><i class="fa fa-plus"></i></button>
          </form>
        </section>
      </section>
        <p>Species: <?=$pet['specie']?></p>
        <p>Gender: <?=$pet['gender']?></p>
        <p>Size: <?=$pet['size']?></p>
        <p>Color: <?=$pet['color']?></p>
        <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=$owner['username']?></a></p>
      <?php if(!empty($adopted)) { ?>
        <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?=$adopted['username']?></a></p>
      <?php } else { ?>
        <p>Not adopted yet!</p>
      <?php } ?>
    </section>

    <section id="question">
      <h2>Ask a Question</h2>
      <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { ?>
      <form class="questionform" action="../../action/action_add_question.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="text" name="question">
        <input type="submit" value="Ask">
      </form>
      <?php } ?>
      <?php foreach($questions as $qst) {?>
        <section id="uniquequestion">
          <p><?=$qst['info']?></p>
        </section>
      <?php } ?>
    </section>

    <section id="proposals">
    <h2>Adoption Proposals</h2>
        <?php foreach($proposals as $prop) {?>
          <section id="uniqueproposal">
            <p><?=$prop['idUser']?></p>
            <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { 
            if(isOwner($_SESSION['user'], $pet['idPet'])) { ?>
            <form action="../../action/action_adopt.php?idPet=<?=$pet['idPet']?>" method="post">
              <button type="submit"><i class="fa fa-check"></i> Accept Proposal</button>
            </form>
          </section>
        <?php } } } ?>
        <?php  
        if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
          if(!isAdopted($pet['idPet']) && !isOwner($_SESSION['user'], $pet['idPet']) && !isProposed($_SESSION['user']['idUser'], $pet['idPet'])) {?>
        <section id="adoption-propose">
          <form action="../../action/action_adopt_proposal.php?idPet=<?=$pet['idPet']?>" method="post">
            <input type="submit" value="Propose to adopt this pet!">
          </form>
        </section>
        <?php } } ?>
    </section>
  </div>  
</section>