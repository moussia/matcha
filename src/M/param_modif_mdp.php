<?php

function verif_psw($mail, $psw)
{
	require('config/database.php');
	$req = $bdd->prepare('SELECT * FROM user WHERE mail= :mail');
	$req->execute(array(
				'mail' => $mail));
	$resultat = $req->fetch();
	// Comparaison du pass envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($psw, $resultat['password']);
	if ($resultat)
	{
		if ($isPasswordCorrect)
			return 1;
	}
	else
		return 0;
}

function modif_mdp($psw, $mail)
{
	require('config/database.php');
	$pass_hach = password_hash($psw, PASSWORD_DEFAULT);
	$req = $bdd->prepare('UPDATE user SET password= :psw WHERE mail= :mail');
	$res = $req->execute(array(
				'psw' => $pass_hach,
				'mail' => $mail
				));
	if ($res)
	{
	?>
		<script type="text/javascript">
			alert('The change has been successfully made') ;
		</script>
	<?php
		return 1;
	}
	else{
	?>
		<script type="text/javascript">
			alert('Sorry, we can not update your password. Try Again.');
		</script>
	<?php
		return 0;
	}
}

?>
