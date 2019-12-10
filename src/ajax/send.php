<?php
session_start();
require('../config/database.php');

$membre = $_SESSION['profil']['mail'];
$user = $_SESSION['user'];
$message = htmlspecialchars(trim($_POST['message']));
 
$inserer = $bdd->prepare('INSERT INTO messages (sender, receiver, message, date)
    VALUES (:sender, :receiver, :message, NOW() )');

$inserer->execute(array(
'sender' => $membre,
'receiver' => $user,
'message' => $message
));
return 1;
?>