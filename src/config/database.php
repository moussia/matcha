<?php

$DB_USER = "root";
$DB_PASSWORD = "root";


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=matcha;charset=utf8', $DB_USER, $DB_PASSWORD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // generates fatal error
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  // remain silent 
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$bdd->exec("SET NAMES 'UTF8'");
}
catch (Exception $error)
{
	print "Error while connecting to the new database !: " . $error->getMessage() . "<br/>";
	die();
}

?>