<?php

function add_profil(){
    require 'V/myprofil.php';
}


function add_profil2(){
    $location2 = isset($_POST['address'])?$_POST['address']:'';
    $bio = isset($_POST['biography'])?$_POST['biography']:'';
	$genre = isset($_POST['genre'])?$_POST['genre']:'';
	$orientation = isset($_POST['orientation'])?$_POST['orientation']:'';
	$age = isset($_POST['age'])?$_POST['age']:'';
	$name = isset($_POST['name'])?$_POST['name']:'';
	$login = isset($_POST['login'])?$_POST['login']:'';
	$last_name = isset($_POST['last_name'])?$_POST['last_name']:'';
	$mail = isset($_POST['mail'])?$_POST['mail']:'';
	$tag = isset($_POST['interests'])?$_POST['interests']:'';

	$id = $_SESSION['profil']['id'] ;
	$city = isset($_POST['city'])?$_POST['city']:'';
	$zipcode = isset($_POST['zipcode'])?$_POST['zipcode']:'';
    $adress = isset($_POST['address'])?$_POST['address']:'';
    $adress_url = urlencode($adress); // pour mettre des plus dans les espaces, pour l'encoder.

	$biography = htmlspecialchars($bio);


	if (!is_numeric($zipcode)){
	?>	<script type="text/javascript">
		alert('Your postal code must contain numbers');
		</script>
	<?php	require 'V/myprofil.php';
		return ;
	}
	$ch = curl_init(); // Création d'une nouvelle ressource cURL

    // Configuration de l'URL et d'autres options
    curl_setopt($ch, CURLOPT_URL, "https://nominatim.openstreetmap.org/search?q=" . $adress_url . ",+" . $city . "&format=json&limit=1&email=jeanclaude@certifies.com");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($ch); // Récupération de l'URL et affichage sur le navigateur
    
    curl_close($ch); // Fermeture de la session cURL

	
	$donneee = json_decode($result, true);
	if (($donneee) == NULL){
		?>	<script type="text/javascript">
		alert('Your adress doesn\'t exist !');
		</script>
	<?php	require 'V/myprofil.php';
			return;
	}
    $lat = $donneee[0]['lat'];
	$lon = $donneee[0]['lon'];



	//for image profil
	$file_type = $_FILES['img']['type'];

	if ($file_type != NULL){
		$allowed = array("image/png");

		if(!in_array($file_type, $allowed)) {
			?>
				<script type="text/javascript">
					alert('Only png is allowed.');
				</script>
			<?php

			require 'V/myprofil.php';
			return;
		}
	}
	



	if ($_FILES['img']['size'] == 0 && $_FILES['img']['error'] == 0){
		?>
	<?php	require 'V/myprofil.php';
			return;
	}
	$structure = 'ImageUser/' . $id . '/';
	$extension = strrchr($_FILES['img']['name'], '.'); // recuperer l'extension de l'image uploader
	if (!file_exists($structure)) {
		mkdir($structure, 0777, true);
	}
	move_uploaded_file($_FILES["img"]["tmp_name"], $structure . $id . $extension);
	save_pic();
	//_______________



    require 'M/profil_bd.php';
    if (addProfil($genre, $adress, $zipcode, $city, $biography, $orientation, $age, $name, $login, $last_name, $mail, $tag, $lat, $lon) == 1){
		require 'V/myprofil.php';
	}

}

function save_pic(){
	require_once ('config/database.php');
    $creator_id = $_SESSION['profil']['id'];
    
    $RandomAccountNumber = uniqid(); //generer un nom aleatoirement
	$titre = $creator_id . '_' . $RandomAccountNumber;
    
	$req = $bdd->prepare('insert into images (titre, creator_id, date_creation) values (:titre, :creator_id, NOW())');
	$req->execute(array(
				'titre' => $titre,
				'creator_id' => $creator_id
				));
	$req->closeCursor();
	return 1;
}

// function add_pic(){
// 	require ('V/mypictures.php');
// }

function likeprofil(){
	$idUser = $_POST["idUser"];
	$love = $_POST["love"];
	
	// echo $idUser;
	require_once 'M/profil_bd.php';
	save_like2($idUser);
	likeprofilbd($idUser, $love);


	header('Location: ' . $_SERVER['PHP_SELF'] );


	// require ('M/accueil_bd.php');
	// getUserdata($idUser);
}

// page search_filter.php
function like(){
	$idUser = $_POST["idUser"];
	$love = $_POST["love"];
	
	// echo $idUser;
	require 'M/profil_bd.php';
	save_like2($idUser);
	likeprofilbd($idUser, $love);
	require 'V/search_filter.php';
}

?>