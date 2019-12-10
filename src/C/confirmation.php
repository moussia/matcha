<?php

function confirmation(){
	require 'config/database.php';
	$var = isset($_GET['r'])?$_GET['r']:'';
	$req = $bdd->prepare('SELECT id FROM user WHERE id = ? AND validate = 0');
	$req->execute(array($_GET['r']));
	if($req->rowCount() == 1)
	{
		$req = $bdd->prepare('UPDATE user SET validate = 1 WHERE id = ?');
		$req->execute(array($_GET['r']));
?>
		<script type="text/javascript">
		alert('Your account is now confirmed, you may now sign in.');
		</script>
<?php
	}
	else
	{
?>
		<script type="text/javascript">
		alert('This account could not be confirmed.');
		</script>
<?php
		require 'V/connect.html';
	}
}

?>
