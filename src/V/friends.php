<head>
    <link type="text/css" rel="stylesheet" href="V/css/friends.css">
</head>
<?php
    require('header.php');

    $directory = 'ImageUser';
    $images = glob($directory . "/*/*.*");
?>

<?php
    require_once 'M/match_bd.php';
    $getFriend = getFriendsMatch();
    if ($getFriend == 0){
        echo '<h5 class="center" id="title">You havn\'t match.</h5>';
    }
    else {

?>

<center>
    <h5 id="title">Your matching.</h5>
</center>
<br/><br/>

<div class="row">
    <?php
    for ($i=0; $i < count($images); $i++){
        $num = $images[$i]; 
        $bla = str_replace('ImageUser/', '', $num); // ici on enleve ImageUser et on le remplace par rien.
        $arr = explode("/", $bla, 2);  //on recuper ce qui il y a apres le '/'
        require_once 'M/accueil_bd.php';
        $dataUser = getUserdata($arr[0]);
        
        if(in_array($arr[0], $getFriend) == TRUE && $arr[0] != $_SESSION['profil']['id']){
            ?>
           
                <div class="col-lg-3">
                <center>
                    <div class="container">
                    <?php                  
                        echo '<img class="card-img" id="card" src="'. $num .'" alt="random image">';
                    ?>
                            <div class="middle">
                                <div class="info-user">
                                <?php
                                    echo $dataUser['login'];
                                    echo ", ";
                                    echo " ". $dataUser['age'] . " years old";
                                ?>
                                </div>
                                <div class="text">
                                    <!-- changer ici, mettre le lien pour tchater avec la personne. -->
                                    <form action="index.php?controle=accueil&action=displayProfilUserMatch" method="post">
                                        <div class="text">
                                            <input id="goToPage" type="hidden" value="<?php echo $arr[0] ?>" name="idUser">
                                            <a href="#" style="color:#E9467C;text-decoration:none;font-family: 'Roboto', sans-serif;" onclick="$(this).closest('form').submit()">Click here to see the profil</a>
                                        </div>
                                    </form>
    
                                    <form action="index.php?controle=tchat&action=tchat" method="post">
                                        <div class="text">
                                            <input id="goToPage" type="hidden" value="<?php echo $arr[0] ?>" name="idUser">
                                            <input id="mail" type="hidden" value="<?php echo $dataUser['mail'] ?>" name="mail">
                                            <input id="login" type="hidden" value="<?php echo $dataUser['login'] ?>" name="login">
                                            <a href="#" onclick="$(this).closest('form').submit()"  style="color:#E9467C;text-decoration:none;font-family: 'Roboto', sans-serif;">Click here to tchat</a>
                                        </div>
                                    </form>
                                    
                                    <form action="index.php?controle=match&action=deletematch" method="post">
                                        <div class="text">
                                            <input id="userid" type="hidden" value="<?php echo $arr[0] ?>" name="userid">
                                            <input id="mail" type="hidden" value="<?php echo $dataUser['mail'] ?>" name="mail">
                                            <input id="login" type="hidden" value="<?php echo $dataUser['login'] ?>" name="login">
                                            <a href="#" onclick="$(this).closest('form').submit()"  style="color:#E9467C;text-decoration:none;font-family: 'Roboto', sans-serif;">Click here to delete this match</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>

                    <br/><br/>
                    </center>
                </div>
               
            <?php
              
            }
        }
    }
?>
</div>
<br/><br/>

<?php require('footer.php'); ?>