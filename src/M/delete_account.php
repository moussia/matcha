<?php

function delete_account_bd($password){
    require('config/database.php');

    $id = $_SESSION['profil']['id'];
    $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $req->execute(array($id));
    $resultat = $req->fetch();
    //  Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($password, $resultat['password']);
    if ($resultat){
        if ($isPasswordCorrect){
			$reqb = $bdd->prepare('DELETE FROM likes WHERE creator_id = ?');
			$reqb->execute(array($id));
			$reqb = $bdd->prepare('DELETE FROM images WHERE creator_id = ?');
            $reqb->execute(array($id));
            $reqb = $bdd->prepare('DELETE FROM matche WHERE user_one = ?');
            $reqb->execute(array($id));
            $reqb = $bdd->prepare('DELETE FROM matche WHERE user_two = ?');
            $reqb->execute(array($id));

            $reqb = $bdd->prepare('DELETE FROM tags WHERE id_user = ?');
            $reqb->execute(array($id));
            $reqb = $bdd->prepare('DELETE FROM visiteur WHERE id_user = ?');
            $reqb->execute(array($id));
            $reqb = $bdd->prepare('DELETE FROM visiteur WHERE id_user_visite = ?');
            $reqb->execute(array($id));


			$reqb = $bdd->prepare('DELETE FROM user WHERE id = ?');
			$reqb->execute(array($id));
			require 'C/logout.php';
			deconnect();
			?>
			<script type="text/javascript">
				alert('Your account has been deleted.');
			</script>
			<?php
        }
        else{
    ?>
            <script type="text/javascript"> 
                alert('The password is not correct.'); 
            </script> 
            <?php
            	require 'C/accueil.php';
	            home();
        }
    }
}

?>
