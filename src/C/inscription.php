<?php

require_once('config/database.php');

function ident(){
	$login = isset($_POST['login'])?$_POST['login']:'';
	$name = isset($_POST['name'])?$_POST['name']:'';
	$last_name = isset($_POST['last_name'])?$_POST['last_name']:'';
	$mail = isset($_POST['mail'])?$_POST['mail']:'';
	$password1 = isset($_POST['password'])?$_POST['password']:'';
	$password2 = isset($_POST['validate'])?$_POST['validate']:'';

	if (count($_POST) != 6){
		require 'V/accueil.php';
	}
	else if ( (strlen($login) < 3) || (strlen($name) < 3) || (strlen($last_name) < 3) ){
		?>
			<script type="text/javascript">
			alert('Please your login, your name and your last name must be superior at 3 characters.');
		</script>
			<?php
			require 'V/accueil.php';
	}
	else if ( (strlen($login) > 13) || (strlen($name) > 13) || (strlen($last_name) > 13) ){
		?>
			<script type="text/javascript">
			alert('Please your login, your name and your last name are too long,  must be inferior at 13 characters.');
		</script>
			<?php
			require 'V/accueil.php';
	}
	else if (ctype_alpha($name) === false || ctype_alpha($last_name) === false) {
		?>
			<script type="text/javascript">
			alert('Please your name and your last name must contain letters only.');
		</script>
			<?php
			require 'V/accueil.php';
	}

	else if ($password1 != $password2){
		?>
			<script type="text/javascript">
			alert('Passwords are not the same');
		</script>
			<?php
			require 'V/accueil.php';
	}
	else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) || (!preg_match("/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/", $mail))){
		?>
			<script type="text/javascript">
			alert('The email is not valid');
		</script>
			<?php
			require 'V/accueil.php';
	}
	else if ((strlen($password1) < 8) || (!preg_match("#[0-9]+#", $password1) || (!preg_match("#[a-zA-Z]+#", $password1)))){
		?>
			<script type="text/javascript">
			alert('Your password must be at least 8 characters long and include a number');
		</script>
			<?php
			require 'V/accueil.php';
	}
	else{
		require 'M/inscription_bd.php';
		if (inscription($login, $last_name, $name, $mail, $password1) == 1){
			connexion($mail);
			send_mail($login, $mail);
		}
		else{
			?>
				<script type="text/javascript">
				alert('This e-mail address or login is already assigned to another client');
			</script>
				<?php
				require 'V/accueil.php';
			return (1);
		}
	}
}

function print_insc(){
	require('V/accueil.php');
}

///MODIFIER ICI POUR LE LIEN DE CONFIRMATION DE COMPTE
function send_mail($login, $mail){
	require 'fonctions.php';
	require 'config/database.php';
	$req = $bdd->prepare('select id from user where login = ?');
	$req->execute(array($_POST['login']));
	$data = $req->fetch();
	$subject = 'Confirmation of the account -Matcha	-!';
	// $headers = 'From:' . $sender;
	$headers = 'From:';
	$message = 'Hello, ' . $login  . '.<br/> To validate your account,
	please click on the link below : http://localhost:8888/matcha/src/index.php?r='.$data['id']. 
	'&controle=accueil&action=home';
	
	sendmail($subject, $message, $mail);

	require 'V/Confirmation.php';
}

?>
