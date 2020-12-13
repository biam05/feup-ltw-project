<div id="petInformation">
  <aside id="informationSidebar">
      <section id="nameAndPhoto">
          <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200">
          <h1><a href=dog_profile.php?idPet=<?=$pet['idPet']?>><?=$pet['petName']?></a></h1>
      </section>

      <section id="information">
        <h2>Information</h2>
          <p>Species: <?=$pet['specie']?></p>
          <p>Gender: <?=$pet['gender']?></p>
          <p>Size: <?=$pet['size']?></p>
          <p>Color: <?=$pet['color']?></p>
          <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=empty($owner['username']) ? 'Deleted User' : $owner['username']?></a></p>
          <?php if(!empty($adopted)) { ?>
              <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?= empty($adopted['username']) ? 'Deleted User' : $adopted['username'] ?></a></p>
          <?php } else { ?>
              <p>Not adopted yet!</p>
          <?php } ?>
      </section>
    </aside>

    <section id="content">
      
      <section id="top-content">
        <section id="biography"> 
            <h2>Biography</h2>
            <p><?=$pet['bio']?></p>   
        </section>

        <section id="photos">
          <h2>Photos</h2>
          <div class="slideshow-container">
          <?php foreach($photos as $photo) {?>
            <div class="MyPhotos">
              <img src="../../images/pet-profile/pet-<?=$pet['idPet']?>/photo-<?=$photo['idPhoto']?>.jpg" alt="Failed displaying dog image" width="400" height="400">
            </div>
          <?php } ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
        </section>
      </section>

      <section id="posts">
        <h2>Posts</h2>
        <?php if (isLogged() && isOwner($_SESSION['user'], $pet['idPet'])) { ?>
        <form class="postsform" action="../../action/action_add_post.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
          <input type="text" name="post">
          <input type="submit" value="Post">
        </form>
        <?php } ?>
        <?php foreach($posts as $post) {?>
          <section id="uniquepost"/>
            <p><?=$post['POST']?></p>
          </section>
        <?php } ?>
      </section>
    </section>
</div>

    
