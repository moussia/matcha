<?php

function ident(){
	$mail = isset($_POST['mail'])?$_POST['mail']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';

	if (count($_POST) != 2){
		require 'V/connect.html';
	}
	else
	{
		require 'M/confirmation.php';
		if (valid_bd($mail) == 1){
			require 'M/connect_bd.php';
			if (verif_ident($mail, $password) == 1)
			{
				sleep(1); // Une pause de 1 sec
				require 'C/accueil.php';
				home();
			}
			else
			{
?>
				<script type="text/javascript">
				alert('Bad password or login');
				</script>
<?php
				require 'V/accueil.php';
			}
		}
	}
}


function forget(){
	require 'config/database.php';
	require 'fonctions.php';
	if (isset($_POST['submit'], $_POST['mail']))
	{
		if (!empty($_POST['mail']))
    	{
			$recup_mail = htmlspecialchars($_POST['mail']);
			// echo $recup_mail;
			if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL))
			{
				$mailexist = $bdd->prepare('SELECT id, login FROM user WHERE mail = ?');
            	$mailexist->execute(array($recup_mail));
				$mailexist_count = $mailexist->rowCount();
				if ($mailexist_count == 1)
				{
					$pseudo = $mailexist->fetch();
					$pseudo = $pseudo['login'];  //le login de l'utilisateur
					$_SESSION['mail'] = $recup_mail; //le mail de l'utilisateur
					$recup_code = ""; //le code de verification

					for ($i=0; $i < 8 ; $i++)
                	{ 
                    	$recup_code .= mt_rand(0, 9);
					}
					
					$mail_recup_exist = $bdd->prepare("SELECT id FROM recuperation WHERE mail = ?");
                	$mail_recup_exist->execute(array($recup_mail));
					$mail_recup_exist = $mail_recup_exist->rowCount();
					
					if ($mail_recup_exist == 1)
                	{
                    	$recup_insert = $bdd->prepare("UPDATE recuperation SET code = ? WHERE mail = ?");
                    	$recup_insert->execute(array($recup_code, $recup_mail));
                	}
                	else
                	{
                    	$recup_insert = $bdd->prepare("INSERT INTO recuperation(mail, code, confirme) VALUES (?, ?, ?)");
                    	$recup_insert->execute(array($recup_mail, $recup_code, 0));
					}
					
					/////MODIFIER ICI POUR LE LIEN DE RECUPERATION DE MDP

					$subject = 'Password Recovery-Matcha-!';
                	$exp = $recup_mail;
					$message = '
					<html>
						<body>
							<div align="center">
							Hello <b>'.$pseudo.'</b><br/>
							Here is your recovery code : <b>'.$recup_code.'</b><br/><br/>
							Then click <a href="http://localhost:8888/matcha/src/index.php?controle=connect&action=check_code">on</a>
							</div>
						</body>
					</html>
					';

					sendmail($subject , $message, $exp);
					?>
						<script type="text/javascript">
 							alert('Your password reset email has been sent.');
 						</script>
					<?php
					require 'V/forget_password.php';
					}
				else
				{
					?>
						<script type="text/javascript">
 							alert('This email address is not registered !');
 						</script>
					<?php
					require 'V/forget_password.php';
				}
			}
			else
			{
				?>
					<script type="text/javascript">
 							alert('Invalid email address !');
 					</script>
				<?php
				require 'V/forget_password.php';
			}
		}
		else
		{
			?>
				<script type="text/javascript">
 							alert('Please enter your email address.');
 				</script>
			<?php
			require 'V/forget_password.php';
		}
	}
}

function check(){
	require 'config/database.php';
	if (isset($_POST['verif_submit'], $_POST['verif_code']))
	{
		if (!empty($_POST['verif_code']))
		{
			$verif_code = htmlspecialchars($_POST['verif_code']);
        	$verif_req = $bdd->prepare("SELECT id FROM recuperation WHERE mail = ? AND code = ?");
        	$verif_req->execute(array( $_SESSION['mail'], $verif_code));
        	$verif_req = $verif_req->rowCount();
	
			if ($verif_req == 1)
        	{
				$up_req = $bdd->prepare("UPDATE recuperation SET confirme = 1 WHERE mail = ?");
				$up_req->execute(array( $_SESSION['mail']));

				?>
					<script type="text/javascript">
								alert('Your code is confirmed, you will be redirected to the password change');
					</script>
				<?php
				require 'V/change_password.php';
			}
			else
			{
				?>
				<script type="text/javascript">
 							alert('Invalid code or email');
 				</script>
			<?php
			require 'V/check_code.php';
			}
		}
		else
		{
			?>
				<script type="text/javascript">
 							alert('Please fill in the fields.');
 				</script>
			<?php
			require 'V/check_code.php';
		}
	}
}

function change_psw(){
	require 'config/database.php';
	if (isset($_POST['change_submit']))
	{
		if (isset($_POST['change_mdp'], $_POST['change_mdpc']))
    	{
			$verif_confirme = $bdd->prepare("SELECT confirme FROM recuperation WHERE mail = ?");
        	$verif_confirme->execute(array($_SESSION['mail']));
        	$verif_confirme = $verif_confirme->fetch();
			$verif_confirme = $verif_confirme['confirme'];
			
			if ($verif_confirme == 1)
			{
				$mdp = htmlspecialchars($_POST['change_mdp']);
				$mdpc = htmlspecialchars($_POST['change_mdpc']);
				
				if (!empty($mdp) AND !empty($mdpc))
            	{
					if ($mdp == $mdpc)
                	{
						$mdp = password_hash($mdp, PASSWORD_DEFAULT);
					
						$ins_mdp = $bdd->prepare("UPDATE user SET password = ? WHERE mail = ?");
						$ins_mdp->execute(array($mdp, $_SESSION['mail']));
						$del_req = $bdd->prepare("DELETE FROM recuperation WHERE mail = ?");
						$del_req->execute(array($_SESSION['mail']));
						require 'V/accueil.php';
					}
					else
					{
						?>
							<script type="text/javascript">
								alert('Your passwords do not match.');
							</script>
						<?php
						require 'V/change_password.php';
					}
				}
				else
				{
					?>
						<script type="text/javascript">
							alert('Please fill in the fields.');
						</script>
					<?php
					require 'V/change_password.php';
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert('Please validate your verification code sent to you by email.');
					</script>
				<?php
				check_code();
			}
		}
		else
		{
			?>
				<script type="text/javascript">
 					alert('Please fill in the fields.');
 				</script>
			<?php
			require 'V/change_password.php';
		}
	}

}

function forget_psw(){
	require 'V/forget_password.php';
}

function check_code()
{
	require 'V/check_code.php';
}

?>
