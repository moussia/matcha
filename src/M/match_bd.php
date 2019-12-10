<?php

function checkmatch($id_send, $id_rec){
    require ('config/database.php');
    $req = $bdd->prepare('SELECT * FROM likes WHERE creator_id = :creator_id AND img_id = :img_id');
    $req->execute(array(
        'creator_id' => $id_send,
        'img_id' => $id_rec
        ));

	if($req->rowCount() < 1){
        return 0;
    }
    $req = $bdd->prepare('SELECT * FROM likes WHERE creator_id = :creator_id AND img_id = :img_id');
    $req->execute(array(
        'creator_id' => $id_rec,
        'img_id' => $id_send
        ));
    if ($req->rowCount() > 0){
        return 1;
    }
    return 0;
}

function saveMatch($creator_id, $idUser){
    require ('config/database.php');
    $id = $_SESSION['profil']['id'];

    $time = date("Y-m-d H:i:s");

    $req = $bdd->prepare('insert into matche(user_one, user_two, time) values (:user_one, :user_two, :time)');
    $res = $req->execute(array(
            'user_one' => $creator_id,
            'user_two' => $idUser,
            'time' => $time
            ));
    require_once('C/notif.php');
    // mail_likeBack($idUser);
    return 1;
}

function matchExist($creator_id, $idUser){
    require ('config/database.php');

    $req = $bdd->prepare('SELECT * FROM matche WHERE user_one = :user_one AND user_two = :user_two');
    $req->execute(array(
        'user_one' => $creator_id,
        'user_two' => $idUser
        ));
    if ($req->rowCount() > 0){
        return 1;
    }
    return 0;
}

function getFriendsMatch(){
    require ('config/database.php');
    $id = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT user_two FROM matche WHERE user_one = ?');
    $req->execute(array($id));
    $users_id = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    //renvoi tout les user_two matcher
    return $users_id;
}

//function pour supprimer le match que je veux.
function deleteMatch_bd($user_two){
    require ('config/database.php');
    $id = $_SESSION['profil']['id'];

    $reqb = $bdd->prepare('DELETE FROM matche WHERE user_one = :user_one AND user_two = :user_two');
    $reqb->execute(array(
        'user_one' => $id,
        'user_two' => $user_two,
    ));

    return 1;
}

function deleteLike_bd($user_two){
    require ('config/database.php');
    $id = $_SESSION['profil']['id'];

    $reqb = $bdd->prepare('DELETE FROM likes WHERE creator_id = :user_one AND img_id = :user_two');
    $reqb->execute(array(
        'user_one' => $id,
        'user_two' => $user_two,
    ));

    return 1;
}

?>