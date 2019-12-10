<?php

//fonction pour les afficher dans lordre croissant, pour trier le tableau
function date_compare($a, $b){
    $t1 = strtotime($a['time']);
    $t2 = strtotime($b['time']);
    return $t2 - $t1;
}

function get_notif_bd(){
    require 'config/database.php';

    $get_likes_bd = get_likes_bd();
    $get_match_bd = get_match_bd();
    $get_visiteur_bd = get_visiteur_bd();

    $i = 0;
    foreach ($get_likes_bd as $line) {
        strtotime($line['time']);
        $line['user_id'] = $line['creator_id'];
        unset($line['creator_id']);
        $line['type'] = 'likes'; //on rajoute type dans le tableau
        $get_likes_bd[$i] = $line;
        $i++;
    }

    $i = 0;
    foreach ($get_match_bd as $line) {
        strtotime($line['time']);
        $line['user_id'] = $line['user_one'];
        unset($line['user_one']);
        $line['type'] = 'match';
        $get_match_bd[$i] = $line;
        $i++;
    }

    $i = 0;
    foreach ($get_visiteur_bd as $line) {
        strtotime($line['time']);
        $line['user_id'] = $line['id_user'];
        unset($line['id_user']);
        $line['type'] = 'visiteur';
        $get_visiteur_bd[$i] = $line;
        // print_r($get_visiteur_bd);
        $i++;
    }

   $res = array_merge($get_likes_bd, $get_match_bd, $get_visiteur_bd);
    usort($res, 'date_compare'); //utiliser sur res la fonction date_compare
    return $res;
}

function get_likes_bd(){
    require 'config/database.php';

    $img_id = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT creator_id, time FROM likes WHERE img_id = ?');
	$req->execute(array($img_id));
    $res = $req->fetchAll();
    
    if ($req->rowCount() == 1){
        return ($res);
    }
    if ($res == NULL){
        return Array();
    }
    return $res;
}

function get_match_bd(){
    require 'config/database.php';

    $user_id = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT user_one, time FROM matche WHERE user_two = ? UNION SELECT user_two, time FROM matche WHERE user_one = ?');
	$req->execute(array($user_id, $user_id));
    $res = $req->fetchAll();
    if ($req->rowCount() == 1){
        return ($res);
    }
    if ($res == NULL){
        return Array();
    }
    return $res;
}

function getUserlogin($id){
    require('config/database.php');
    $getdata = $bdd->prepare('SELECT login FROM user WHERE id = ?');
	$getdata->execute(array($id));
    $dataUser = $getdata->fetch();

    return $dataUser;
}

function get_visiteur_bd(){
    require 'config/database.php';
    $user_id = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT id_user, time FROM visiteur WHERE id_user_visite = ?');
	$req->execute(array($user_id));
    $res = $req->fetchAll();
    if ($req->rowCount() == 1){
        return ($res);
    }
    if ($res == NULL){
        return Array();
    }
    return $res;
}

?>