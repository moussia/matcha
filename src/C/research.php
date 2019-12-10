<?php 

function barre_de_recherche(){
    $q = $_GET['q'];

	require 'M/barre_bd.php';
	barre($q);
}

?>