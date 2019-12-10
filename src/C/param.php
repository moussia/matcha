<?php

function search() {
	require 'V/search.php';
}

function modify_password(){
	require 'V/mdp.php';
}

function modif_psw(){
	require 'config/database.php';
	if (isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
   {
		$mdp1 = $_POST['newmdp1'];
		$mdp2 = $_POST['newmdp2'];
		if ($mdp1 === $mdp2)
       {
		   $mdp_hash = password_hash($mdp1, PASSWORD_DEFAULT);
           $insertmdp = $bdd->prepare('UPDATE user SET password = ? WHERE  id = ?');
		   $insertmdp->execute(array($mdp_hash, $_SESSION['profil']['id']));
		   ?>
				<script type="text/javascript">
					alert('Your password has been changed.');
				</script>
			<?php
		   require 'V/myprofil.php';	
	   }
	   else
	   {
			?>
			<script type="text/javascript">
				alert('Passwords do not match');
			</script>
			<?php
			require 'V/mdp.php';
	   }
   }
   else
   {
	   ?>
		<script type="text/javascript">
			alert('Fill in the fields please');
		</script>
		<?php
   }
}

function delete_account(){
	require 'V/delete_account.php';
}

function delete_compte()
{
	$password = isset($_POST['password'])?$_POST['password']:'';

	if (!isset($_SESSION['profil'])){
		require 'C/accueil.php';
		home();
		return ;
	}
	if (count($_POST) != 1)
		require 'V/delete_account.html';
	if (isset($password) && $password != ""){
		require 'M/delete_account.php';
		delete_account_bd($password);
	}
	return 1;
}


function bloquer(){
	$id_user_block = $_POST['idUser'];
	$id_user = $_SESSION['profil']['id'];

	require 'M/profil_bd.php';
	bloquer_bd($id_user, $id_user_block);
	?>
		<script type="text/javascript">
		alert('You blocked this user');
		</script>
	<?php
	require ('C/filter.php');
	get_filter();
}

?>
