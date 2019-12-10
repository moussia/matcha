<?php

function filter($age, $tag, $location, $popularity){
    $id_tags = get_id_tags($tag);
    $id_age = get_id_age($age);
    $id_location = get_id_city($location);
    $id_popularity = get_id_popularity($popularity);
    $id_non_bloque = get_id_non_bloque();
    return array_intersect($id_tags, $id_popularity, $id_age, $id_location, $id_non_bloque);
    // print_r($id_filter);
}

function get_id_non_bloque(){
	require('config/database.php');
	$id_user = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT id from user WHERE id not in (select id_user_block from bloque WHERE id_user = ?)');
    $req->execute(array($id_user));
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;
}

function get_id_age($age){
    require('config/database.php');
    if ($age == NULL){
        $req = $bdd->prepare('SELECT id FROM user');
        $req->execute(array());
    }
    else {
        $req = $bdd->prepare('SELECT id FROM user WHERE age = :age');
        $req->execute(array(
            'age' => $age
        ));
    }
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);

    return $resultat;
}

function get_id_city($location){
    require('config/database.php');
    if ($location == NULL){
        $req = $bdd->prepare('SELECT id FROM user');
        $req->execute(array());
    }
    else{
        $req = $bdd->prepare('SELECT id FROM user WHERE city = :city');
        $req->execute(array(
            'city' => $location
        ));
    }
   
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);

    return $resultat;
}

function filtre_location(){
    require('config/database.php');
    $req = $bdd->prepare('SELECT DISTINCT city FROM user');
    $req->execute(array());
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;
}


function get_id_popularity($popularity){
    require('config/database.php');
    if ($popularity == NULL){
        $req = $bdd->prepare('SELECT id FROM user');
        $req->execute(array());
        $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
        return $resultat;
    }

    if ($popularity == "1"){
        $req = $bdd->prepare('SELECT id from user WHERE id in (SELECT img_id from likes group by img_id HAVING COUNT(img_id) <= 100) ');
    }
    else if ($popularity == "2"){
        $req = $bdd->prepare('SELECT id from user WHERE id in (SELECT img_id from likes group by img_id HAVING COUNT(img_id) > 100 AND COUNT(img_id) <= 250) ');
    }
    else if ($popularity == "3"){
        $req = $bdd->prepare('SELECT id from user WHERE id in (SELECT img_id from likes group by img_id HAVING COUNT(img_id) > 250 AND COUNT(img_id) <= 500) ');
    }
    else if ($popularity == "4")
        $req = $bdd->prepare('SELECT id from user WHERE id in (SELECT img_id from likes group by img_id HAVING COUNT(img_id) > 500) ');
   
    $req->execute(array());
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;
}

function filtre_age(){
    require('config/database.php');
    $req = $bdd->prepare('SELECT DISTINCT age FROM user ORDER BY age ASC');
    $req->execute(array());
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;
}

function get_id_tags($tag){
    require('config/database.php');
    if ($tag == NULL){
        $req = $bdd->prepare('SELECT id FROM user');
        $req->execute(array());
        $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
        return $resultat;
    }
    $req = $bdd->prepare('SELECT id_user FROM tags WHERE name = :name');
    $req->execute(array(
        'name' => $tag
    ));
    $res = $req->fetchAll(PDO::FETCH_COLUMN, 0); /* Récupération de toutes les valeurs de la première colonne */
   
    return $res;
}

function get_tags_bd($id){
    require('config/database.php');
    $req = $bdd->prepare('SELECT name FROM tags where id_user = :id');
    $req->execute(array(
        'id' => $id
    ));
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;
}

?>