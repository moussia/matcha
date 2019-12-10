<?php

function getMail($idUser){
	require 'config/database.php';

	$req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
	$req->execute(array($idUser));
    $resultat = $req->fetch();
    
    return $resultat;
}

function mail_like($idUser){
	require 'fonctions.php';
	require_once 'config/database.php';

    $dataUser1 = getMail($idUser);
    $user =  $_SESSION['profil']['login'];

	$subject = 'A person like your profil -Matcha-!';
	$message = ' Hello, ' . $dataUser1['login'] . '! ' . $user . ' liked your profile.';
	
	sendmail($subject, $message, $dataUser1['mail']);
}

//A MODIFIER SA///////////////////////////////////////////////////////////////
function mail_likeBack($idUser){
	require 'fonctions.php';
	require_once 'config/database.php';

    $dataUser = getMail($idUser);
    $user =  $_SESSION['profil']['login'];

	$subject = 'A person like your profil -Matcha-!';
	$message = ' Hello, ' . $dataUser['login'] . '! ' . $user . ' like you back.';
	// echo $dataUser['mail'];
	
	// mail($dataUser['mail'], $subject, $message);
	// sendmail($subject, $message, $dataUser['mail']);
}

function mail_deleteLike($idUser){
	require 'fonctions.php';
	require_once 'config/database.php';

    $dataUser2 = getMail($idUser);
    $user =  $_SESSION['profil']['login'];

	$subject = 'A person like your profil -Matcha-!';
	$message = ' Hello, ' . $dataUser2['login'] . '! ' . $user . ' do not like you anymore.';
	
	sendmail($subject, $message, $dataUser2['mail']);
}

function page_notif(){
	$user =  $_SESSION['profil']['login'];

	require_once 'M/notif_bd.php';	
	$res = get_notif_bd();
	require_once 'V/notif.php';
	// print_r($res);
	if($res == NULL){
		require_once 'V/no_notif.html';
	}
	return $res;
}

?>