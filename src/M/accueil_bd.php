<?php

//afficher tout les photos de profil & ne pas afficher les match
function accueil_bd(){
    require('config/database.php');

    $orientation = $_SESSION['profil']['orientation'];
    $genre = $_SESSION['profil']['genre'];
    $id = $_SESSION['profil']['id'];

    $req = $bdd->prepare('SELECT id FROM user WHERE orientation = :orientation and genre = :genre and id NOT IN (
                            SELECT user_two FROM matche WHERE user_one = :user_one)');
    $req->execute(array(
        'orientation' => $genre,
        'genre' => $orientation,
        'user_one' => $id
        )
    );
    $resultat = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    return $resultat;

}

function getUserdata($id){
    require('config/database.php');
    $getdata = $bdd->prepare('SELECT * FROM user WHERE id = ?');
	$getdata->execute(array($id));
    $dataUser = $getdata->fetch();

    return $dataUser;
}

function display_like($img_id){
	require('config/database.php');
	$req = $bdd->prepare('SELECT img_id FROM likes WHERE img_id = ?');
	$req->execute(array($img_id));
    $res = $req->fetchAll();
    
	$num_rows = $req->rowCount();
	echo $num_rows;
	return $num_rows;
}

?>