<?php

function get_user($mail){
    require 'config/database.php';
    $getdata = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
	$getdata->execute(array($mail));
    $dataUser = $getdata->fetch();

    return $dataUser;
}

function tchat(){
	require 'config/database.php';

    $mail = $_POST['mail'];
    $login = $_POST['login'];

    get_user($mail);
    require 'V/tchat.php';
}


?>