<?php 
require('config/database.php');

$id = $_SESSION['profil']['id'];

// <> veux dire different
$login = $bdd->prepare('SELECT * FROM user WHERE id <> "' . $id . '" ORDER BY id DESC');

if (isset($_POST['q']) AND !empty($_POST['q']))
{
    $q = htmlspecialchars($_POST['q']);
    // MODIFIER LA REQUETE AU CAS OU ON VU UN CHAMPS PLUS LARGE CHOIX
    $login = $bdd->query('SELECT * FROM user WHERE login LIKE "' . $q . '%" ORDER BY id DESC');
}
?>

<?php
    require('header.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="V/css/searchUser.css">
    <title>Document</title>
</head>
<body>

<br/><br/>
<center>
    <h3 id="emble">Looking for a user ?</h3>
   <h5 id="slogan">Please enter his login.</h5>
    <br/>
    <form method="post" action="">
    <input type="search" name="q"  id="exampleInput" placeholder="Search...">
    <input type="submit" value="Validate the search" class="btn btn-primary btn-sm" style="  background-color:#E9467C;color:white;border-radius:6px;border-color:white;">
    
    </form>   
</center>
<br/><br/>
<?php 

if ($login->rowCount() > 0) { ?>
 
            <?php while ($l = $login->fetch()) { ?>
                <form action="index.php?controle=accueil&action=displayProfilUserSearch" method="post">
                    <center>
                        <div class="alert alert-primary searchRep" role="alert">
                            <h6> <?= $l['login']; ?></h6>
                            <a href="#" onclick="$(this).closest('form').submit()">View profil</a>
                            <input id="idUser" type="hidden" value="<?php echo $l['id'] ?>" name="idUser"> 
                        </div> 
                    </center>        
                </form>
            <?php } ?>
 
<?php }else { ?>

    <center>
        <div class="alert alert-warning searchRep" role="alert">
            Aucun résultat...
        </div>
    </center>
<?php } ?>

</body>
</html>