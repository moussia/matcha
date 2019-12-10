<?php

function deconnect(){
	if (isset($_SESSION['profil'])){
		require ('config/database.php');
		$req = $bdd->prepare('UPDATE connexion SET connexion = 2, time = NOW() WHERE creator_mail = ?');
		$req->execute(array($_SESSION['profil']['mail']));

		$_SESSION['profil']['mail'] = NULL;
		session_destroy();
	}
	require 'V/accueil.php';
}

?>
