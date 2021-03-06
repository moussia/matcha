<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="V/css/profil.css">
    <title>Matcha</title>
</head>
<?php require('header.php'); ?>
<br/><br/><br/>
<div class="row">
    <div class="col-5">
        <center>
            <div class="container">
                <?php

                $directory = 'ImageUser/';
                $id = $dataUser['id'];

                $src = $directory . $id . "/";
                $s =scandir($src);
                require('M/filter_bd.php');
                $dataUser['tags'] = get_tags_bd($id);
                $images = glob($src . "/*.*");
                ?>
                    <img class="card-img" src="<?php echo $src; print_r($s[2]); ?>" alt="Card image" id="card">
                    <br/><br/>
                    <div class="info-base">
                        <p class="first-info">
                        <form method="post" action="index.php?controle=profil&action=likeprofil">
                            <input id="goToPage" type="hidden" value="<?php echo $dataUser['id'] ?>" name="idUser">
                            <input id="loveUser" type="hidden" value="<?php echo $dataUser['love'] ?>" name="love">
                            <?php
                                require_once 'M/accueil_bd.php';
                                display_like($dataUser['id']);
                            ?>
                            <input type="image" src="V/pictures/like.svg" name="img_id" alt="like" width="25" height="25">
                        </form>
                        <?php
                            echo $dataUser['name'] . " " .  $dataUser['last_name'];
                        ?>
                        </p>
                        <p class="first-info">
                        <?php
                            echo $dataUser['age'];
                        ?> ans
                        </p>
                      
                    </div>
                    <br/><br/>
                    <form method="post" action="index.php?controle=param&action=bloquer">
                        <input id="goToPage" type="hidden" value="<?php echo $dataUser['id'] ?>" name="idUser">
                        <!-- <input type="submit" class="btn btn-primary btn-sm" id="btn-account" value="Block">
                     -->
                     <input type="submit" value="Block this user" class="btn btn-primary" style="  background-color:#E9467C;color:white;border-radius:6px;border-color:white;">
                    </form>
                    <br/><br/>
            </div>
        </center>
    </div>


    <div class="col-7">
        <div class="container">
            <div class="row">
                <label for="" class="label">Sex: </label>&nbsp;&nbsp;
                <p class="info">
                <?php
                    echo $dataUser['genre'];
                ?>
                </p>
            </div>

            <div class="row">
                <label for="" class="label">Sexual orientation: </label>&nbsp;&nbsp;
                <p class="info">
                <?php
                    echo $dataUser['orientation'];
                ?>
                </p>
            </div>

            <div class="row">
                <label for="" class="label">Tags: </label>&nbsp;&nbsp;
                <p class="info"> 
                <?php
                    foreach ($dataUser['tags'] as $tag) {
                        echo '#' . $tag . ' ';
                    }
                ?>
                </p>
            </div>

            <div class="row">
                <label for="" class="label">Location: </label>&nbsp;&nbsp;
                <p class="info">
                <?php
                    echo $dataUser['adress'] . " " . $dataUser['city'];
                ?>
                </p>
            </div>

            <div class="row">
                <label for="" class="label">Biography:</label>&nbsp;&nbsp;
                <p class="info">
                <?php
                    echo $dataUser['biography'];
                ?>
                </p>
            </div>
        </div>
    </div>

</div>
<br/><br/>

<?php require('footer.php'); ?>