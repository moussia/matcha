<?php

function addProfil($genre, $adress, $zipcode, $city, $biography, $orientation, $age, $name, $login, $last_name, $mail, $tags, $lat, $lon){
    require ('config/database.php');
    $id = $_SESSION['profil']['id'];

    $sql = $bdd->prepare('UPDATE user SET adress = :adress, zipcode = :zipcode, city = :city, orientation = :orientation,
                            name = :name, last_name = :last_name, mail = :mail, login = :login,
                            genre = :genre, biography = :biography, age = :age, latitude = :latitude, longitude = :longitude WHERE id= :id');
	$res = $sql->execute(array(
				'adress' => $adress,
				'zipcode' => $zipcode,
				'city' => $city,
                'genre' => $genre,
                'age' => $age,
                'orientation' => $orientation,
                'biography' => $biography,    
                'last_name' => $last_name, 
                'name' => $name,
                'mail' => $mail,
                'login' => $login,
                'latitude' => $lat,
                'longitude' => $lon,
				'id' => $id
                ));
    remove_tag($id);
    foreach ($tags as $tag) {
        save_tags_db($tag, $id);
    }
    require ('M/connect_bd.php');
    getUser($id);
	return 1;
}

function remove_tag($id){
    require ('config/database.php');

    $req = $bdd->prepare('delete from tags WHERE id_user = :id');
    $req->execute(array(
            'id' => $id
            ));
    return ;
}

function save_tags_db($tag, $id){
    require ('config/database.php');

    $req = $bdd->prepare('SELECT id from tags WHERE id_user = :id AND name = :tag');
	$req->execute(array(
				'id' => $id,
				'tag' => $tag
				));
    $num_rows = $req->rowCount();
    
    if ($num_rows > 0) {
        return 0;
    }
    if (count_nbtags($id) >= 3){
        return ;
    }
    $req = $bdd->prepare('insert into tags (name, id_user) values (:tag, :id_user)');
	$req->execute(array(
            'tag' => $tag,
            'id_user' => $id
            ));
}

function count_nbtags($id){
    require ('config/database.php');

    $req = $bdd->prepare('SELECT id from tags WHERE id_user = :id');
	$req->execute(array(
				'id' => $id,
				));
    $num_rows = $req->rowCount();
    
    return $num_rows;
}

function save_like2($img_id){
	require 'config/database.php';
	$creator_id = $_SESSION['profil']['id'];
	$req = $bdd->prepare('select id from likes where img_id = :img_id and creator_id = :creator_id ');
	$req->execute(array(
				'img_id' => $img_id,
				'creator_id' => $creator_id
				));
    $num_rows = $req->rowCount();
    $time = date("Y-m-d H:i:s");
    
	if ($num_rows == 0) {
		$req = $bdd->prepare('insert into likes(creator_id, img_id, time) values (:creator_id, :img_id, :times)');
		$req->execute(array(
					'img_id' => $img_id,
                    'creator_id' => $creator_id,
					'times' => $time
                    ));
        require_once 'C/notif.php';
        mail_like($img_id);
	}
	else {
		$req = $bdd->prepare('delete from likes WHERE img_id = :img_id  and creator_id = :creator_id');
		$req->execute(array(
					'img_id' => $img_id,
					'creator_id' => $creator_id
                    ));
        require_once 'C/notif.php';
        mail_deleteLike($img_id);
	}
	$req->closeCursor();
    return 1;
}


function likeprofilbd($idUser, $love){
    require ('config/database.php');
	$creator_id = $_SESSION['profil']['id'];

    $lover = $love + 1;
    $req = $bdd->prepare('SELECT love FROM user WHERE id = ?');
	$req->execute(array($idUser));
    $resultat = $req->fetch();
    
    $sql = $bdd->prepare('UPDATE user SET love = :love WHERE id = :id');
    $res = $sql->execute(array(
        'love' => $lover,
        'id' => $idUser
        ));
    require ('M/match_bd.php');
    if (checkmatch($creator_id, $idUser) == 1 && matchExist($creator_id, $idUser) == 0){
        saveMatch($creator_id, $idUser);
        saveMatch($idUser, $creator_id);
        // sendNotif();
    }
    return 1;
}

function bloquer_bd($id_user, $id_user_block){
	require('config/database.php');

	$req = $bdd->prepare('insert into bloque(id_user, id_user_block) values (:id_user, :id_user_block)');
	$req->execute(array(
            'id_user' => $id_user,
            'id_user_block' => $id_user_block
            ));

    $req = $bdd->prepare('delete from likes WHERE img_id = :img_id  and creator_id = :creator_id');
    $req->execute(array(
            'img_id' =>$id_user_block,
            'creator_id' => $id_user
            ));
}




?>