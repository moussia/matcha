<?php

function home(){
	require 'V/myprofil.php';
}

function displayProfil(){
    require 'V/search_filter.php';
	return ;
}

function displayProfilUser(){
	$idUser = $_POST["idUser"];

	require 'M/visite_bd.php';
	insert_visite_bd($idUser);

	require 'M/accueil_bd.php';
	$dataUser = getUserdata($idUser);

    require 'V/profil.php';
}


function displayProfilUserMatch(){
	$idUser = $_POST["idUser"];

	require 'M/visite_bd.php';
	insert_visite_bd($idUser);

	require 'M/accueil_bd.php';
	$dataUser = getUserdata($idUser);

    require 'V/profil_match.php';
}

function displayProfilUserSearch(){
	$idUser = $_POST["idUser"];

	require 'M/visite_bd.php';
	insert_visite_bd($idUser);

	require 'M/accueil_bd.php';
	$dataUser = getUserdata($idUser);

    require 'V/profil_search.php';
}

?>