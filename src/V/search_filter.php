<head>
    <link type="text/css" rel="stylesheet" href="V/css/search.css">
    <title>Matcha</title>
</head>
<?php
    require('header.php');
    require('V/filter.php');
    $directory = 'ImageUser';
    $images = glob($directory . "/*/*.*");
?>
 
    <div class="container-fluid">
        <div class="row">
        <?php
            require 'M/accueil_bd.php';
            $idUser = accueil_bd();
            for ($i=0; $i < count($images); $i++){
                $num = $images[$i]; 
                $bla = str_replace('ImageUser/', '', $num);
                $arr = explode("/", $bla, 2);
                require_once 'M/accueil_bd.php';
                $dataUser = getUserdata($arr[0]);

                if(in_array($arr[0], $idUser) == TRUE && $arr[0] != $_SESSION['profil']['id']){  //pour orientation sex
                    if ($_SESSION['filter'] && (in_array($arr[0], $_SESSION['filter']) == TRUE)) { //pour filtre
            ?>
            <div class="col-lg-3">
                <div class="row overlay">
                    <div class="col-lg-12">
                        <div class="img-best-container">
                            <center>
                                <div class="hello">
                                <?php 
                                
                                    echo '<img class="card-img" id="card" src="'. $num .'" alt="random image">';
                                ?>
                                    <div class="middle">
                                        <div class="info-user">
                                            <?php
                                                echo $dataUser['login'];
                                                echo ", ";
                                                echo " ".$dataUser['age'] . " years old";
                                            ?>
                                        </div>
                                        <form action="index.php?controle=accueil&action=displayProfilUser" method="post">
                                            <div class="text">
                                                <input id="goToPage" type="hidden" value="<?php echo $arr[0] ?>" name="idUser">
                                                <a href="#" style="color:#E9467C;text-decoration:none;font-family: 'Roboto', sans-serif;" onclick="$(this).closest('form').submit()">Click here to see the profil</a>
                                            </div>
                                        </form>
                                        <form method="post" action="index.php?controle=profil&action=like">
                                            <input id="goToPage" type="hidden" value="<?php echo $dataUser['id'] ?>" name="idUser">
                                            <input id="loveUser" type="hidden" value="<?php echo $dataUser['love'] ?>" name="love">
                                            <input type="image" src="V/pictures/like.svg" name="img_id" alt="like" width="25" height="25">
                                        </form>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
           
            <?php
                }
            }
                }
            ?>
        </div>
    </div>

        <br/><br/><br/>
    
<?php require('footer.php'); ?>