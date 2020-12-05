<?php
    function getAllDogs() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Pet ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPet($id){
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet WHERE idPet = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
      }

      function getFavoritePets($user) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM Pet, FavoritePet WHERE idUser = ? and Pet.idPet = FavoritePet.idPet');
        
        $stmt->execute(array($user['idUser']));
        $petsID = $stmt->fetchAll();


        return $petsID;
    }

    function isFavorited($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            return TRUE;
        } 
        else {
            return FALSE;
        }
    }

    function updateFavoriteList($user, $idPet) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM FavoritePet WHERE idUser = ? and idPet = ?');
        
        $stmt->execute(array($user['idUser'], $idPet));
        $petsID = $stmt->fetchAll();
        if(empty($petsID)) {
            $stmt = $db->prepare('INSERT INTO FavoritePet VALUES (?, ?)');
            $stmt->execute(array($user['idUser'], $idPet));
            print('add');
        }
        else {
            $stmt = $db->prepare('DELETE FROM FavoritePet WHERE idUser = ? and idPet = ?');
            $stmt->execute(array($user['idUser'], $idPet));
            print('del');
        }
      }
?>