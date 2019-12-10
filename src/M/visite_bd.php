
<?php
function insert_visite_bd($id_user_visite){
    require('config/database.php');

    $id_user = $_SESSION['profil']['id'];
    $time = date("Y-m-d H:i:s");

    $req = $bdd->prepare('insert into visiteur (id_user, id_user_visite, time) values (:id_user, :id_user_visite, :time)');
    $req->execute(array(
            'id_user' => $id_user,
            'id_user_visite' => $id_user_visite,
            'time' => $time,
            ));
}

?>